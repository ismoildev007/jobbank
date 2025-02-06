<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;

class RolePermissionController extends Controller
{
    public function assignPermissions()
    {
        $adminRole = Role::where('name', 'admin')->firstOrFail();
        $createPostPermission = Permission::firstOrCreate(['name' => 'create_post']);

        $adminRole->permissions()->syncWithoutDetaching([$createPostPermission->id]);

        return response()->json(['message' => 'Permission assigned successfully!']);
    }
}

