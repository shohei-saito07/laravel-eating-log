<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MajorCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        // キーワードで絞り込み判定
        if ($keyword !== null)
        {
            $categories = MajorCategory::where('name', 'like', "%{$keyword}%")->get();
        }
        else 
        {
            // 親カテゴリ情報を取得
            $categories = MajorCategory::all();
        }

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
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $store = new MajorCategory();
        $store->name = $request->input('name');
        $store->description = $request->input('description');
        $store->save();

        // フラッシュメッセージを設定
        session()->flash('success', 'カテゴリを作成されしました。');

        // カテゴリ作成画面へ遷移する
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
        $major_category = MajorCategory::findOrFail($id);
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
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        // リクエストされたデータのバリデーション
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        // 更新するカテゴリを特定
        $category = MajorCategory::findOrFail($id);

        // カテゴリを更新
        $category->update($validatedData);

        // フラッシュメッセージを設定
        session()->flash('success', 'カテゴリを更新しました。');

        // 更新が成功した場合の処理
        return redirect()->route('category.index')->with('success', 'カテゴリが更新しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // カテゴリを特定して削除
        $category = MajorCategory::findOrFail($id);
        $category->delete();

        // フラッシュメッセージを設定
        session()->flash('success', 'カテゴリを更新されしました。');

        // 削除が成功した場合の処理
        return redirect()->route('category.index');

    }
}
