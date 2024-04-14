<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Category;
use App\Models\MajorCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        // カテゴリーで絞り込みの判定
        if ($request->category !== null) {
            $stores = Store::where('category_id', $request->category)->sortable()->paginate(15);
            $total_count = Store::where('category_id', $request->category)->count();
            $category = Category::find($request->category);
        } elseif ($keyword !== null) {
            $stores = Store::where('name', 'like', "%{$keyword}%")->sortable()->paginate(15);
            $total_count = $stores->total();
            $category = null;
        } else {
            // 店舗情報を15件取得
            $stores = Store::sortable()->paginate(15);
            $total_count = "";
            $category = null;
        }

        // カテゴリーを取得
        $major_categories = MajorCategory::all();
        $categories = Category::all();

        // 店舗一覧へ遷移
        return view('stores.index', compact('stores', 'category', 'categories', 'major_categories', 'total_count', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // カテゴリ情報を取得
        $categories = Category::all();

        // カテゴリ情報を渡して、店舗作成画面へ遷移
        return view('stores.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'category_id' => 'required|string|max:255'
        ]);

        // 店舗情報の保存
        $store = new Store();
        $store->name = $request->input('name');
        $store->description = $request->input('description');
        $store->price = $request->input('price');
        $store->category_id = $request->input('category_id');

        if ($request->file('image') != null)
        {
            $path = $request->file('image')->store('image');
            $store->image = $request->input($path);
        }

        $store->recommendation_flg = $request->has('recommendation_flg') ? 1 : 0;
        $store->save();

        return to_route('stores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        // 店舗に関連するレビューを全件取得する
        $reviews = $store->reviews()->get();

        // 店舗詳細が画面へ遷移
        return view('stores.show', compact('store', 'reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        // カテゴリ情報を取得
        $categories = Category::all();

        // 店舗情報を編集画面へ遷移
        return view('stores.edit', compact('store', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'category_id' => 'required|string|max:255'
        ]);

        // 店舗情報を更新し、一覧画面へ遷移
        $store->name = $request->input('name');
        $store->description = $request->input('description');
        $store->price = $request->input('price');
        $store->category_id = $request->input('category_id');
        $store->update();

        return to_route('stores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        // 店舗情報を削除
        $store->delete();

        return to_route('stores.index');
    }
}
