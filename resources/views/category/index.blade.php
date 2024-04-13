@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <h1 class="text-center">カテゴリ一覧</h1>

        <form action="{{ route('category.index') }}" method="GET" class="row g-1">
            <div class="col-auto">
                <input class="form-control samuraimart-header-search-input" name="keyword">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn samuraimart-header-search-button">
                    <i class="fas fa-search samuraimart-header-search-icon"></i>検索
                </button>
            </div>
        </form>
        <br>
        <form action="{{ route('category.create') }}" method="GET" class="row g-1">
            <div class="col-auto">
                <button type="submit" class="btn samuraimart-header-search-button">
                    <i class="fa fa-bars  samuraimart-header-search-icon"></i>カテゴリ作成
                </button>
            </div>
        </form>



        <hr>

        <!-- テーブルヘッダー -->
        <div class="row">
            <div class="col-md-1">
                <p>ID</p>
            </div>
            <div class="col-md-2">
                <p>カテゴリ</p>
            </div>
            <div class="col-md-3">
                <p>詳細</p>
            </div>
            <div class="col-md-2">
                <p>作成日</p>
            </div>
            <div class="col-md-2">
                <p>更新日</p>
            </div>
            <div class="col-md-1">
                <p></p>
            </div>
            <div class="col-md-1">
                <p></p>
            </div>
        </div>

        <!-- カテゴリをループして表示 -->
        @foreach ($categories as $category)
            <div class="row">
                <div class="col-md-1 mt-1">
                    <h3>{{ $category->id }}</h3>
                </div>
                <div class="col-md-2 mt-2">
                    <h3>{{ $category->name }}</h3>
                </div>
                <div class="col-md-3 mt-3">
                    <h3>{{ $category->description }}</h3>
                </div>
                <div class="col-md-2 mt-2">
                    <h3>{{ $category->created_at->format('Y年m月d日 H:i:s') }}</h3>
                </div>
                <div class="col-md-2 mt-2">
                    <h3>{{ $category->updated_at->format('Y年m月d日 H:i:s') }}</h3>
                </div>
                <div class="col-md-1 mt-1">
                    <form action="{{ route('category.edit', $category) }}" method="GET" class="row g-1">
                        <div class="col-auto">
                            <button type="submit" class="btn samuraimart-header-search-button">編集</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-1 mt-1">
                    <form action="{{ route('category.destroy', $category) }}" method="POST" class="row g-1">
                        <div class="col-auto">
                            <button type="submit" class="btn samuraimart-header-search-button">削除</button>
                        </div>
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        @endforeach

        <hr>
    </div>
@endsection
