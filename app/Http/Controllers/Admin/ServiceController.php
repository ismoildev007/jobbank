<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role == '2') {
            $services = Service::orderBy('created_at', 'desc')->get();
        } else {
            // Agar provider bo'lsa, faqat o'z service'lari
            $services = Service::where('provider_id', $user->id)->get();
        }

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        $categories = Category::all();

        $user = Auth::user();
        if ($user->role == '2') { // Admin
            $providers = User::where('role', '1')->get();
        } else {
            $subscriptions = Subscription::where('status', 'active')
                ->where('end_date', '>', now())
                ->whereHas('provider', function ($query) {
                    $query->where('role', '1');
                })
                ->with('provider')
                ->get();
            $providers = $subscriptions->pluck('provider')->unique('id');
        }

        return view('admin.services.create', compact('categories', 'providers'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if ($user->role != '2') {
            $subscription = Subscription::where('provider_id', $request->provider_id)
                ->where('status', 'active')
                ->where('end_date', '>', now())
                ->first();

            if (!$subscription) {
                return redirect()->back()->with('error', 'Xizmat qo‘shish uchun faol obuna talab qilinadi!');
            }
        }

        $request->validate([
            'provider_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'nullable|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'type_price' => 'required|in:m2,soat,belgilangan',
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_uz' => 'required|string|max:255',
            'description_ru' => 'required|string',
            'description_en' => 'required|string',
            'description_uz' => 'required|string',
            'image' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'is_active' => 'required|in:0,1',
        ]);

        $data = $request->only([
            'title_uz', 'title_ru', 'title_en', 'provider_id', 'category_id', 'sub_category_id', // Sub-kategoriya qo‘shildi
            'price', 'type_price', 'is_active', 'description_uz', 'description_ru', 'description_en'
        ]);
        $data['slug'] = Str::uuid();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/services', $fileName, 'public');
            $data['image'] = $filePath;
        }

        Service::create($data);
        return redirect()->route('services.index')->with('success', 'Xizmat muvaffaqiyatli qo‘shildi!');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $categories = Category::all();

        $user = Auth::user();
        if ($user->role == '2') {
            $providers = User::where('role', '1')->get();
        } else {
            $subscriptions = Subscription::where('status', 'active')
                ->where('end_date', '>', now())
                ->whereHas('provider', function ($query) {
                    $query->where('role', '1');
                })
                ->with('provider')
                ->get();
            $providers = $subscriptions->pluck('provider')->unique('id');
        }

        return view('admin.services.edit', compact('service', 'categories', 'providers'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $user = Auth::user();
        if ($user->role != '2') {
            $subscription = Subscription::where('provider_id', $request->provider_id)
                ->where('status', 'active')
                ->where('end_date', '>', now())
                ->first();

            if (!$subscription) {
                return redirect()->back()->with('error', 'Xizmatni yangilash uchun faol obuna talab qilinadi!');
            }
        }

        $request->validate([
            'provider_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'nullable|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'type_price' => 'required|in:m2,soat,belgilangan',
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_uz' => 'required|string|max:255',
            'description_ru' => 'required|string',
            'description_en' => 'required|string',
            'description_uz' => 'required|string',
            'image' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'is_active' => 'required|in:0,1',
        ]);

        $data = $request->only([
            'title_uz', 'title_ru', 'title_en', 'provider_id', 'category_id', 'sub_category_id', // Sub-kategoriya qo‘shildi
            'price', 'type_price', 'is_active', 'description_uz', 'description_ru', 'description_en'
        ]);

        if ($request->hasFile('image')) {
            if ($service->image && Storage::disk('public')->exists($service->image)) {
                Storage::disk('public')->delete($service->image);
            }

            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/services', $fileName, 'public');
            $data['image'] = $filePath;
        }

        $service->update($data);

        return redirect()->route('services.index')->with('success', 'Xizmat muvaffaqiyatli yangilandi.');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        if ($service->image && Storage::disk('public')->exists($service->image)) {
            Storage::disk('public')->delete($service->image);
        }

        $service->delete();

        return redirect()->route('services.index')->with('success', 'Xizmat muvaffaqiyatli o\'chirildi.');
    }
}
