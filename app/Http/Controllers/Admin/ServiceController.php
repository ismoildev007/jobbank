<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use NunoMaduro\Collision\Provider;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact( 'services'));
    }


    public function create()
    {
        $categories = Category::all();
        $providers= User::where('role', '1')->get();
        return view('admin.services.create', compact('categories',  'providers'));
    }


    public function store(Request $request)
    {
       $request->validate([
           'provider_id' => 'required',
           'category_id' => 'required',
           'price' => 'required',
           'type_price' => 'required',
           'title_ru' => 'required',
           'title_en' => 'required',
           'title_uz' => 'required',
           'description_ru' => 'required',
           'description_en' => 'required',
           'description_uz' => 'required',
           'image' => 'nullable|file|mimes:jpg,jpeg,png',
           'is_active' => 'required|numeric',

       ]);
        $data = $request->only([
            'title_uz', 'title_ru', 'title_en', 'provider_id', 'category_id', 'price', 'type_price','is_active',
            'description_uz', 'description_ru', 'description_en'
        ]);
        $data['slug'] = Str::uuid();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/services', $fileName, 'public');
            $data['image'] = $filePath;
        }
        Service::create($data);
        return redirect()->route('services.index');


    }

    public function edit($id)
    {
        $service=Service::findOrFail($id);
        $categories = Category::all();
        $providers=User::where('role', '1')->get();
        return view('admin.services.edit', compact('service', 'categories', 'providers'));
    }
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $request->validate([
            'provider_id' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'type_price' => 'required',
            'title_ru' => 'required',
            'title_en' => 'required',
            'title_uz' => 'required',
            'description_ru' => 'required',
            'description_en' => 'required',
            'description_uz' => 'required',
            'image' => 'nullable|file|mimes:jpg,jpeg,png',
            'is_active' => 'required|numeric',
        ]);

        $data = $request->only([
            'title_uz', 'title_ru', 'title_en', 'provider_id', 'category_id', 'price', 'type_price', 'is_active',
            'description_uz', 'description_ru', 'description_en'
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
