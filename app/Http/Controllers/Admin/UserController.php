<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('admin.users.index', compact('users', 'roles'));
    }

    public function assignRole(Request $request, User $user)
    {
        $request->validate(['role' => 'required']);

        $role = Role::findOrFail($request->role);
        $user->roles()->syncWithoutDetaching([$role->id]);

        return redirect()->route('users.index')->with('success', 'Foydalanuvchiga rol berildi!');
    }
}
