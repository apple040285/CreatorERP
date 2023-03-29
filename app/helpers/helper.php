<?php

use Illuminate\Database\Eloquent\Relations\Relation;

if (!function_exists('isAdmin')) {
    function isAdmin($user)
    {
        return in_array($user->email, explode(',', env('USER_ADMIN_EMAILS')));
    }
}

if (!function_exists('toTree')) {
    function toTree(array $data, string $primary = 'id', string $parent = 'parent_id', string $children = 'children')
    {
        $items = array();
        foreach ($data as $v) {
            $items[$v[$primary]] = $v;
        }

        $tree = array();
        foreach ($items as $item) {
            if (isset($items[$item[$parent]])) {
                $items[$item[$parent]][$children][] = &$items[$item[$primary]];
            } else {
                $tree[] = &$items[$item[$primary]];
            }
        }
        return $tree;
    }
}

if (!function_exists('toArray')) {
    function toArray($tree = [], $children = 'children')
    {
        if (empty($tree) || !is_array($tree)) {
            return $tree;
        }
        $arrRes = [];
        foreach ($tree as $k => $v) {
            $arrTmp = $v;
            unset($arrTmp[$children]);
            $arrRes[] = $arrTmp;
            if (!empty($v[$children])) {
                $arrTmp = toArray($v[$children]);
                $arrRes = array_merge($arrRes, $arrTmp);
            }
        }
        return $arrRes;
    }
}

if (!function_exists('convertPathsToTree')) {
    /**
     * convertPathsToTree
     *
     * @param  mixed $paths
     * @param  mixed $separator
     * @param  mixed $parent
     * @return mixed
     *
     * *範例*
     * $data = collect([
     *     'test',
     *     'files',
     *     'files/2',
     *     'files/2/Blocks',
     *     'files/2/Blocks/thumbs',
     *     'files/shares',
     * ]);
     *
     * $processedData = $data->map(function ($item) {
     *     return explode('/', $item);
     * });
     *
     * convertPathsToTree($processedData);
     */
    function convertPathsToTree($paths, $separator = '/', $prefix = null, $options = null, string $primary = 'path', string $label = 'label', string $children = 'children')
    {
        return $paths
            ->groupBy(function ($parts) {
                return $parts[0];
            })
            ->map(function ($parts, $key) use ($separator, $prefix, $options, $primary, $label, $children) {
                $childrenPaths = $parts->map(function ($parts) {
                    return array_slice($parts, 1);
                })->filter();

                if (is_string($options) && function_exists('enum_exists') && enum_exists($options)) {
                    $options = collect($options::cases())->mapWithKeys(static fn ($case) => [($case?->value ?? $case->name) => $case->name]);
                }

                if ($options instanceof Illuminate\Contracts\Support\Arrayable) {
                    $options = $options->toArray();
                }

                $processedData = convertPathsToTree(
                    $childrenPaths,
                    $separator,
                    $prefix . $key . $separator,
                    $options,
                    $primary,
                    $label,
                    $children,
                );

                $processedArray = [
                    $primary    => $prefix . $key,
                    $label      => (string) ($options[$prefix . $key] ?? $key),
                ];

                if (count($processedData) > 0) $processedArray[$children] = $processedData;

                return $processedArray;
            })
            ->values();
    }
}

if (!function_exists('proccesRelationWithRequest')) {
    /**
    處理與請求的關係
    一次性判斷
     */
    function proccesRelationWithRequest(Relation $relation, array $items)
    {
        $relation->getResults()->each(function ($model) use ($items) {
            foreach ($items as $item) {
                if ($model->id === ($item['id'] ?? null)) {
                    $model->fill(($item))->save();
                    return;
                }
            }

            return $model->delete();
        });

        foreach ($items as $item) {
            if (!isset($item['id'])) {
                $relation->create(($item));
            }
        };
    }
}


if (!function_exists('timeCheck')) {
    /**
     * 判斷是否為日期
     *
     * @param  mixed $timeStr
     * @return void
     */
    function timeCheck($timeStr)
    {
        return date('Y-m-d', strtotime($timeStr)) == $timeStr;
    }
}

if (!function_exists('numberTo')) {
    function numberTo($num)
    {
        return \banqhsia\ChineseNumber\ChineseNumber::number($num)->upper()->currency();
    }
}
