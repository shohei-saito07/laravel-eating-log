<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorite_stores = Auth::user()->favorite_stores()->get();
        return view('favorite.index', compact('favorite_stores'));
    }

    public function store($store_id)
    {
        
        Auth::user()->favorite_stores()->attach($store_id);
        session()->flash('success', 'お気に入りに追加しました。');
        return back();
    }

    public function destroy($store_id)
    {
        Auth::user()->favorite_stores()->detach($store_id);
        session()->flash('success', 'お気に入りを解除しました。');

        return back();
    }
}
