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
    public function show(Request $request)
    {
        // 基本情報を表示
        $basicInfo = BasicInfo::find($id);

        return view('basicInfo.show', compact('basicInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BasicInfo  $basicInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(BasicInfo $basicInfo)
    {
        // 基本情報を編集
        // $basicInfo = BasicInfo::first();

        return view('basicInfo.edit', compact('basicInfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BasicInfo  $basicInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BasicInfo $basicInfo)
    {
        // 基本情報を更新
        // $basicInfo = BasicInfo::first();
        
        $request->validate([
            'company_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'telephone_number' => 'required|string|max:20',
            'email_address' => 'required|string|email|max:255',
        ]);
        
        $basicInfo->update($request->all());

        return redirect()->route('basicInfo.show', $basicInfo->id);
    }
}
