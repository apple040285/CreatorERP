<?php

namespace App\Models;

use App\Enum\PermissionNames;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Permission extends \Spatie\Permission\Models\Permission
{
    protected $appends = ['display_name'];

    protected function displayName(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => PermissionNames::tryFrom($attributes['name'])?->name ?? $attributes['name'],
        );
    }
}
