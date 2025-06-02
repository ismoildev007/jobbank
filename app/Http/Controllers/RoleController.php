<?php

namespace App\Http\Controllers;

use App\Models\RolePermission;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'superAdmin');
        })->get();

        return view('admin.roles.create', compact('permissions', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name',
            'user_id' => 'nullable|exists:users,id',
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,id',
        ]);


        $role = Role::create([
            'name' => $request->name,
            'role' => 0
        ]);

        if ($request->user_id) {
            UserRole::create([
                'user_id' => $request->user_id,
                'role_id' => $role->id,
            ]);
        }

        if ($request->has('permissions')) {
            $rolePermissions = [];
            foreach ($request->permissions as $permissionId) {
                $permission = Permission::find($permissionId);
                if ($permission) {
                    $rolePermissions[] = [
                        'role_id' => $role->id,
                        'permission_id' => $permission->id,
                        'route_name' => $permission->route_name,
                        'status' => true,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }
            RolePermission::insert($rolePermissions);
        }

        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        return view('roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->update(['name' => $request->name]);

        $role->permissions()->sync($request->permissions);

        return redirect()->route('roles.index')->with('success', 'Role yangilandi!');
    }

    public function destroy($id)
    {
        Role::findOrFail($id)->delete();
        return redirect()->route('roles.index')->with('success', 'Role o‘chirildi!');
    }
}

