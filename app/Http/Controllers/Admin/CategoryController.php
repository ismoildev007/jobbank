<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function getSubCategories(Request $request)
    {
        $categoryId = $request->query('category_id');
        $onlyFeatured = $request->query('only_featured', false); // default: false

        $query = Category::where('parent_id', $categoryId);

        if ($onlyFeatured) {
            $query->where('is_featured', 1);
        }

        $subCategories = $query->get();

        return response()->json($subCategories);
    }


    public function getSubCategoryPrice($id)
    {
        $subcategory = \App\Models\Category::find($id);

        if (!$subcategory) {
            return response()->json(['price' => 0]);
        }

        return response()->json(['price' => $subcategory->price]);
    }



    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.category.create',  compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'parent_id' => 'nullable|integer',
            'title_uz' => 'required',
            'title_ru' => 'required',
            'title_en' => 'required',
            'description_uz' => 'required',
            'description_ru' => 'required',
            'description_en' => 'required',
            'price' => 'nullable',
            'is_featured' => 'nullable',
            'image' => 'nullable|file|mimes:jpg,jpeg,png',
        ]);

        $data = $request->only([
            'title_uz', 'title_ru', 'title_en', 'parent_id',
            'description_uz', 'description_ru', 'description_en','price','is_featured'
        ]);
        $data['slug'] = Str::uuid();
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
        $categories = Category::all();
        $category=Category::findOrFail($id);
        return view('admin.category.edit',  compact('category', 'categories'));

    }
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'parent_id' => 'nullable',
            'title_uz' => 'required',
            'title_ru' => 'required',
            'title_en' => 'required',
            'description_uz' => 'required',
            'description_ru' => 'required',
            'description_en' => 'required',
            'price' => 'nullable',
            'is_featured' => 'nullable',
            'image' => 'nullable|file|mimes:jpg,jpeg,png',
        ]);

        $data = $request->only([
            'title_uz', 'title_ru', 'title_en', 'parent_id',
            'description_uz', 'description_ru', 'description_en','price','is_featured'
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
