<?php

namespace App\Concerns;

use Illuminate\Database\Eloquent\Relations\Relation;

trait ModelRelationWith
{
    public function proccesRelationWithRequest(Relation $relation, array $items)
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
