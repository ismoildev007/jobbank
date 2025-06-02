<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller{
    public function admin(){
        return view('admin.auth.login');
    }
    public function dashboard(Request $request)
    {
        $sortBy = $request->query('sort_by', 'full_name');
        $sortOrder = $request->query('sort_order', 'asc');
        $roleFilter = $request->query('role');
        $statusFilter = $request->query('status');
        $verifiedFilter = $request->query('is_verified');

        $allowedSorts = ['full_name', 'phone', 'role', 'status', 'is_verified'];
        $sortBy = in_array($sortBy, $allowedSorts) ? $sortBy : 'full_name';

        $query = User::query();

        if (!is_null($roleFilter)) {
            $query->where('role', $roleFilter);
        }
        if (!is_null($statusFilter)) {
            $query->where('status', $statusFilter);
        }
        if (!is_null($verifiedFilter)) {
            $query->where('is_verified', $verifiedFilter);
        }

        $users = $query->orderBy($sortBy, $sortOrder)->get();

        return view('admin.dashboard', compact('users', 'sortBy', 'sortOrder', 'roleFilter', 'statusFilter', 'verifiedFilter'));
    }

    public function toggleStatus(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($user->role == User::ROLE_PROVIDER) {
            $user->status = $user->status === 'Aktiv' ? 'Bloklangan' : 'Aktiv';
            $user->save();
            return redirect()->route('admin.dashboard')->with('success', 'Status muvaffaqiyatli o‘zgartirildi.');
        }
        return redirect()->route('admin.dashboard')->with('error', 'Faqat providerlarning statusini o‘zgartirish mumkin.');
    }

    public function toggleVerification(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($user->role == User::ROLE_PROVIDER) {
            $user->is_verified = $user->is_verified ? 0 : 1; // Tasdiqlash holatini teskari holatga o‘zgartirish
            $user->save();
            return redirect()->route('admin.dashboard')->with('success', 'Tasdiqlash holati muvaffaqiyatli o‘zgartirildi.');
        }
        return redirect()->route('admin.dashboard')->with('error', 'Faqat providerlarning tasdiqlash holatini o‘zgartirish mumkin.');
    }


    public function approveUser($id)
    {
        $user = User::findOrFail($id);
        if ($user->role == User::ROLE_PROVIDER) {
            $user->status = 1; // Faol holat
            $user->save();
        }
        return redirect()->route('admin.dashboard')->with('success', 'Provider tasdiqlandi.');
    }

    public function deactivateUser($id)
    {
        $user = User::findOrFail($id);
        if ($user->role == User::ROLE_PROVIDER) {
            $user->status = 0; // Faol emas holat
            $user->save();
        }
        return redirect()->route('admin.dashboard')->with('success', 'Provider o‘chirildi.');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete(); // Foydalanuvchini o‘chirish
        return redirect()->route('admin.dashboard')->with('success', 'Foydalanuvchi muvaffaqiyatli o‘chirildi.');
    }
}
