<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }
    public function store(Request $request)
    {

    }
    public function edit($id)
    {
        $category=Category::findOrFail($id);
        return view('admin.categories.edit',  compact('category'));

    }
    public function update(Request $request, $id)
    {
        $category=Category::findOrFail($id);

    }
    public function destroy($id)
    {
        $category=Category::findOrFail($id);
        $category->delete();
        return redirect()->route('categories.index');
    }
}
