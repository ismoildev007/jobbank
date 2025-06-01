<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title_uz' => 'required',
            'title_ru' => 'required',
            'title_en' => 'required',
            'description_uz' => 'required',
            'description_ru' => 'required',
            'description_en' => 'required',
            'image' => 'nullable|file|mimes:jpg,jpeg,png',
        ]);

        $data = $request->only([
            'title_uz', 'title_ru', 'title_en',
            'description_uz', 'description_ru', 'description_en'
        ]);
        $data['slug'] = Str::slug($request->title_uz);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/categories', $fileName, 'public');
            $data['image'] = $filePath;
        }

        Category::create($data);

        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }


    public function edit($id)
    {
        $category=Category::findOrFail($id);
        return view('admin.category.edit',  compact('category'));

    }
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'title_uz' => 'required',
            'title_ru' => 'required',
            'title_en' => 'required',
            'description_uz' => 'required',
            'description_ru' => 'required',
            'description_en' => 'required',
            'image' => 'nullable|file|mimes:jpg,jpeg,png',
        ]);

        $data = $request->only([
            'title_uz', 'title_ru', 'title_en',
            'description_uz', 'description_ru', 'description_en'
        ]);
        $data['slug'] = Str::slug($request->title_uz);

        if ($request->hasFile('image')) {
            if ($category->image && Storage::disk('public')->exists($category->image)) {
                Storage::disk('public')->delete($category->image);
            }

            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/categories', $fileName, 'public');
            $data['image'] = $filePath;
        }

        $category->update($data);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }

    public function destroy($id)
    {
        $category=Category::findOrFail($id);
        $category->delete();
        return redirect()->route('categories.index');
    }
}
