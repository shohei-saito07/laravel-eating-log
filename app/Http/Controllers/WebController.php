<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\MajorCategory;

class WebController extends Controller
{
    public function index()
    {
        $categories = Category::all()->sortBy('major_category_name');
        $major_categories = MajorCategory::all();

        // $major_category_names = Category::pluck('major_category_name')->unique();

        return view('web.index', compact('major_categories', 'categories'));
        // return view('web.index', compact('categories'));
    }
}
