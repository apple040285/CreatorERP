<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $permissions = Permission::all();

        $data = toTree($permissions->toArray());

        return $this->success($data);
    }

    public function tree(Request $request)
    {
        // $processedData = Permission::query()
        //     ->oldest('name')
        //     ->get()
        //     ->map(function ($permission) {
        //         return explode('.', $permission['name']);
        //     });

        $processedData = collect(array_column(\App\Enum\PermissionNames::cases(), 'value'))
            ->map(function ($permission) {
                return explode('.', $permission);
            });

        $data = convertPathsToTree($processedData, '.', null, \App\Enum\PermissionNames::class, 'id');

        return $this->success($data);
    }
}
