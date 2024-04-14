<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $intent = Auth::user()->createSetupIntent();

        // サブスクリプション登録画面へ遷移
        return view('subscription.create', compact('intent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // サブスクリプションの登録
        $request->user()->newSubscription('default', 'price_1OsixTIXY7oQnFsvy1gLI5HG')->create($request->paymentMethodId);

        // マイページにリダイレクト
        return redirect()->route('mypage');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        // ユーザ情報
        $user = Auth::user();

        // クレジットカード情報
        $intent = Auth::user()->createSetupIntent();
        Log::error($intent);

        // クレジットカード編集画面へ遷移
        return view('subscription.edit', compact('user','intent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // 既存の支払いのデフォルト取得
        $paymentMethod = Auth::user()->defaultPaymentMethod();

        // 既存の支払い方法を削除
        $paymentMethod->delete();

        // デフォルトの支払いを変更
        Auth::user()->updateDefaultPaymentMethod($request->paymentMethodId);
 
        // マイページにリダイレクト
        return redirect()->route('mypage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        Auth::user()->subscription('default')->cancel();
        return redirect()->route('mypage');
    }

    public function cancel()
    {
        // サブスクリプション削除画面へ遷移
        return view('subscription.cancel');
        
    }
}
