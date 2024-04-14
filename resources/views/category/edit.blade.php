@extends('layouts.app')

@section('content')
<div class="container">
    <h1>店舗情報更新</h1>

    <form action="{{ route('category.update', $major_category->id) }}" method="POST">
        @csrf
        @method('PUT')
        @error('name')
            <strong>カテゴリを入力してください</strong>
        @enderror
        <div class="form-group">
            <label for="store-name">カテゴリ</label>
            <input type="text" name="name" id="store-name" class="form-control" value="{{ $major_category->name }}">
        </div>
        @error('description')
            <strong>詳細を入力してください</strong>
        @enderror
        <div class="form-group">
            <label for="store-description">詳細</label>
            <textarea name="description" id="store-description" class="form-control">{{ $major_category->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-danger">更新</button>
    </form>

    <a href="{{ route('category.index') }}">カテゴリ一覧に戻る</a>
</div>
@endsection