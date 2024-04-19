@extends('layouts.app')

@section('content')
<div class="container">
    <h1>カテゴリを追加</h1>

    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @error('name')
            <strong>カテゴリを入力してください</strong>
        @enderror
        <div class="form-group">
            <label for="store-name">カテゴリ</label>
            <input type="text" name="name" id="store-name" value="{{ old('name') }}" class="form-control" required>
        </div>
        @error('description')
            <strong>詳細を入力してください</strong>
        @enderror
        <div class="form-group">
            <label for="store-description">詳細</label>
            <textarea name="description" id="store-description" class="form-control">{{ old('description') }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">登録</button>
    </form>

    <a href="{{ route('stores.index') }}">店舗一覧に戻る</a>
</div>
@endsection