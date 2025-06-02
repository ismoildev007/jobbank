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
            $user->status = $request->input('status') ? 1 : 0;
            $user->save();

            return response()->json([
                'success' => true,
                'status' => $user->status,
                'message' => 'Status muvaffaqiyatli o‘zgartirildi.'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Faqat providerlarning statusini o‘zgartirish mumkin.'
        ], 403);
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
}
