<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Major_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // ログ出力用

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 親カテゴリ情報を取得
        $categories = Major_category::all();
        
        // 親カテゴリ情報を渡して、一覧画面へ遷移
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // カテゴリ作成画面へ遷移
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // カテゴリ作成画面へ遷移する
        $store = new Major_category();
        $store->name = $request->input('name');
        $store->description = $request->input('description');
        $store->save();

        return to_route('stores.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
        $major_category = Major_category::findOrFail($id);
        // 親カテゴリ情報を渡して、カテゴリ編集画面へ遷移
        return view('category.edit', compact('major_category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // リクエストされたデータのバリデーション
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        // ログ出力
        // Log::error($request);
        // Log::error($id);

        // 更新するカテゴリを特定
        $category = Major_category::findOrFail($id);

        // カテゴリを更新
        $category->update($validatedData);

        // 更新が成功した場合の処理
        return redirect()->route('category.index')->with('success', 'カテゴリが更新されました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

         // ログ出力
        Log::error($id);

        // カテゴリを特定して削除
        $category = Major_category::findOrFail($id);
        $category->delete();

        // 削除が成功した場合の処理
        return redirect()->route('category.index')->with('success', 'カテゴリが削除されました。');

    }
}
