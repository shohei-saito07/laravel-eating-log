@extends('layouts.app')

@section('content')
<div class="container">
    <h1>店舗情報更新</h1>

    <form action="{{ route('stores.update',$store->id) }}" method="POST" class="mb-3">
        @csrf
        @method('PUT')
        @error('name')
            <strong>店舗名を入力してください</strong>
        @enderror
        <div class="form-group">
            <label for="store-name">店舗名</label>
            <input type="text" name="name" id="store-name" class="form-control" value="{{ $store->name }}">
        </div>
        @error('description')
            <strong>店舗説明を入力してください</strong>
        @enderror
        <div class="form-group">
            <label for="store-description">店舗説明</label>
            <textarea name="description" id="store-description" class="form-control">{{ $store->description }}</textarea>
        </div>
        @error('price')
            <strong>価格を入力してください</strong>
        @enderror
        <div class="form-group">
            <label for="store-price">価格</label>
            <input type="number" name="price" id="store-price" class="form-control" value="{{ $store->price }}">
        </div>
        @error('category_id')
            <strong>カテゴリを入力してください</strong>
        @enderror
        <div class="form-group">
            <label for="store-category">カテゴリ</label>
            <select name="category_id" class="form-control" id="store-category">
                @foreach ($categories as $category)
                @if ($category->id == $store->category_id)
                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @else
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="row">
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">更新</button>
            </div>
        </div>
    </form>

    <form action="{{ route('stores.destroy', $store) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">削除</button>
    </form>

    <a href="{{ route('stores.index') }}">店舗一覧に戻る</a>
</div>
@endsection
