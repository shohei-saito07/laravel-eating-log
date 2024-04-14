@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>基本情報編集</h2>
        <form action="{{ route('basicInfo.update', $basicInfo->id) }}" method="POST">
            @csrf
            @method('PUT')
            @error('company_name')
                <strong>会社名を入力してください</strong><br>
            @enderror
            <div class="form-group">
                <label for="company_name">会社名:</label>
                <input type="text" name="company_name" id="company_name" value="{{ $basicInfo->company_name }}" class="form-control">
            </div>
            @error('address')
                <strong>住所を入力してください</strong><br>
            @enderror
            <div class="form-group">
                <label for="address">住所:</label>
                <input type="text" name="address" id="address" value="{{ $basicInfo->address }}" class="form-control">
            </div>
            @error('telephone_number')
                <strong>電話番号を入力してください</strong><br>
            @enderror
            <div class="form-group">
                <label for="telephone_number">電話番号:</label>
                <input type="text" name="telephone_number" id="telephone_number" value="{{ $basicInfo->telephone_number }}" class="form-control">
            </div>
            @error('email_address')
                <strong>メールアドレスを入力してください</strong>
            @enderror
            <div class="form-group">
                <label for="email_address">メールアドレス:</label>
                <input type="email" name="email_address" id="email_address" value="{{ $basicInfo->email_address }}" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">更新</button>
        </form>
    </div>
@endsection
