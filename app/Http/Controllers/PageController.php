<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
        $categories = Category::whereNull('parent_id')->get();
        return view('pages.home',compact('categories'));
    }
}
