@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>レビュー編集</h2>
        <form action="{{ route('reviews.update', $review) }}" method="POST">
            @csrf
            @method('PUT')
            @error('name')
                <strong>カテゴリを入力してください</strong>
            @enderror
            <div class="form-group">
                <label for="title">タイトル</label>
                <input type="text" name="title" id="title" value="{{ $review->title }}" class="form-control">
            </div>
            @error('content')
                <strong>レビュー内容を入力してください</strong>
            @enderror
            <div class="form-group">
                <label for="content">レビュー内容</label>
                <input type="text" name="content" id="content" value="{{ $review->content }}" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">更新</button>
        </form>
    </div>
@endsection
