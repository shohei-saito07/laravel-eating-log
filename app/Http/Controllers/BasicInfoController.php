<?php

namespace App\Http\Controllers;

use App\Models\BasicInfo;
use Illuminate\Http\Request;

class BasicInfoController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BasicInfo  $basicInfo
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // 基本情報を表示
        $basicInfo = BasicInfo::find(1);

        return view('basicInfo.show', compact('basicInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BasicInfo  $basicInfo
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        // 基本情報を編集
        $basicInfo = BasicInfo::find(1);

        return view('basicInfo.edit', compact('basicInfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BasicInfo  $basicInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $basicInfo = BasicInfo::find(1);

        // 基本情報を更新
        $request->validate([
            'company_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'telephone_number' => 'required|string|max:20',
            'email_address' => 'required|string|email|max:255',
        ]);

        $basicInfo->company_name = $request->input('company_name');
        $basicInfo->address = $request->input('address');
        $basicInfo->telephone_number = $request->input('telephone_number');
        $basicInfo->email_address = $request->input('email_address');

        $basicInfo->update();

        // フラッシュメッセージを設定
        session()->flash('success', '基本情報を更新しました。');
        
        return redirect()->route('basicInfo.show', $basicInfo->id);
    }
}
