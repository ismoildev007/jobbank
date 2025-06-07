<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function home()
    {
        $categories = Category::whereNull('parent_id')->get();
        return view('pages.home', compact('categories'));
    }

    public function pageService(Request $request)
    {
        $categoryId = $request->query('cate');
        $keywords = $request->query('keywords');
        $rangePrice = $request->query('range_price');
        $subcategory = $request->query('subcategory');

        $query = Service::query();

        if (!empty($categoryId)) {
            $query->where('category_id', (int)$categoryId);
        }

        if ($keywords) {
            $query->where(function ($q) use ($keywords) {
                $q->where('title_uz', 'like', '%' . $keywords . '%')
                    ->orWhere('description_uz', 'like', '%' . $keywords . '%');
            });
        }

        if ($rangePrice) {
            [$minPrice, $maxPrice] = explode('-', $rangePrice);
            $query->whereBetween('price', [(int)trim($minPrice), (int)trim($maxPrice)]);
        }

        if ($subcategory) {
            $query->where('sub_category_id', (int)$subcategory);
        }

        // Yagona joyda to‘liq kerakli yuklamalar bilan query ishlatiladi
        $services = $query->with(['category', 'subCategory', 'provider'])->paginate(12);
        $categories = Category::whereNull('parent_id')->get();

        $userOrders = [];

        if (Auth::check()) {
            foreach ($services as $service) {
                $hasRecentOrder = Order::recentForService(Auth::id(), $service->id)->exists();
                $userOrders[$service->id] = $hasRecentOrder;
            }
        }

        return view('pages.page-service', compact('services', 'categories', 'userOrders'));
    }


    public function singleService($id)
    {
        $service = Service::with(['category', 'subCategory', 'provider'])->findOrFail($id);
        return view('pages.single-service', compact('service'));
    }
}

