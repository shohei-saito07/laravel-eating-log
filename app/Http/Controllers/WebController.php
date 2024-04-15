<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\MajorCategory;
use App\Models\Store;

class WebController extends Controller
{
    public function index()
    {
        $stores = Store::all();
        $new_stores = Store::orderBy('updated_at', 'desc')->take(4)->get();
        $categories = Category::all()->sortBy('major_category_name');
        $major_categories = MajorCategory::all();

        return view('web.index', compact('major_categories', 'categories', 'stores', 'new_stores'));
    }
}
