@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <h1 class="text-center">カテゴリ一覧</h1>


        <form action="{{ route('stores.create') }}" method="GET" class="row g-1">
            <div class="col-auto">
                <button type="submit" class="btn samuraimart-header-search-button">
                    <i class="fa fa-bars  samuraimart-header-search-icon"></i>店舗作成
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
                <p>店舗名</p>
            </div>
        </div>

        <!-- カテゴリをループして表示 -->
        @foreach ($stores as $store)
            <div class="row">
                <div class="col-md-1 mt-1">
                    <h3>{{ $store->id }}</h3>
                </div>
                <div class="col-md-2 mt-2">
                    <h3>{{ $store->name }}</h3>
                </div>
                <div class="col-md-1 mt-1">
                    <form action="{{ route('category.edit', $category) }}" method="GET" class="row g-1">
                        <div class="col-auto">
                            <button type="submit" class="btn samuraimart-header-search-button">編集</button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach

        <hr>
    </div>
@endsection
