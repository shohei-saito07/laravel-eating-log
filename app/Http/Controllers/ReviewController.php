<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

        $review = new Review();
        $review->title = $request->input('title');
        $review->content = $request->input('content');
        $review->store_id = $request->input('store_id');
        $review->evaluation = $request->input('evaluation',0); // おすすめの設定を削除予定
        $review->user_id = Auth::user()->id;
        $review->save();

        return back();
    }

    public function edit(Review $review)
    {
         return view('reviews.edit', compact('review'));
    }

    public function destroy($reviews_id)
    {
        Review::destroy($reviews_id);
        return back();
    }

    public function update(Request $request, Review $Review)
    {
        // 必須チェック
        $request->validate([
            'title' => 'required|max:20',
            'content' => 'required'
        ]);

        // 店舗情報を更新し、一覧画面へ遷移
        $Review->title = $request->input('title');
        $Review->content = $request->input('content');
        $Review->update();

        return to_route('stores.show', $Review->store_id);
    }
}
