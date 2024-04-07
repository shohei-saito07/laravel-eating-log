<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class SalesManagement extends Controller
{
    public function index()
    {
        // 親カテゴリ情報を取得
        $stores = Store::all();
        
        // 親カテゴリ情報を渡して、一覧画面へ遷移
        return view('salesManagement.index', compact('stores'));
    }
}
