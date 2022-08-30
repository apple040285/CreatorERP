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
