@extends('layouts.app')

@section('content')
<div class="container">
    <h1>新しい店舗を追加</h1>

    <form action="{{ route('stores.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @error('name')
            <strong>店舗名を入力してください</strong>
        @enderror
        <div class="form-group">
            <label for="store-name">店舗名</label>
            <input type="text" name="name" id="store-name" value="{{ old('name') }}" class="form-control">
        </div>
        @error('description')
            <strong>店舗説明を入力してください</strong>
        @enderror
        <div class="form-group">
            <label for="store-description">店舗説明</label>
            <textarea name="description" id="store-description" class="form-control">{{ old('description') }}</textarea>
        </div>
        @error('price')
            <strong>価格を入力してください</strong>
        @enderror
        <div class="form-group">
            <label for="store-price">価格</label>
            <input type="number" name="price" id="store-price" value="{{ old('price') }}" class="form-control">
        </div>
        @error('category_id')
            <strong>カテゴリを入力してください</strong>
        @enderror
        <div class="form-group">
            <label for="store-category">カテゴリ</label>
            <select name="category_id" class="form-control" id="store-category">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if(old('category_id') == $category->id) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="store-image">画像</label>
            <input type="file" name="image" id="store-image" class="form-control">
        </div>
        <div class="form-group">
            <label for="store-recommendation_flg">おすすめフラグ</label><br>
            <input type="checkbox" name="recommendation_flg" id="store-recommendation_flg"  @if(old('recommendation_flg')) checked @endif class="">
        </div>
        <button type="submit" class="btn btn-success">登録</button>
    </form>

    <a href="{{ route('stores.index') }}">店舗一覧に戻る</a>
</div>
@endsection