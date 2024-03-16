<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
// 値のログ確認のため追加
use Illuminate\Support\Facades\Log; 


class ReviewController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 必須チェック
        $request->validate([
            'title' => 'required|max:20',
            'content' => 'required'
        ]);
        Log::info($request);
        $review = new Review();
        $review->title = $request->input('title');
        $review->content = $request->input('content');
        $review->store_id = $request->input('store_id');
        $review->evaluation = $request->input('evaluation'); // おすすめの設定を削除予定
        $review->user_id = Auth::user()->id;
        $review->save();

        return back();
    }
}
