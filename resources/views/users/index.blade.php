@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <h1 class="text-center">ユーザ一覧</h1>

        <form action="{{ route('users.index') }}" method="GET" class="row g-1">
            <div class="col-auto">
                <input class="form-control samuraimart-header-search-input" name="keyword">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn samuraimart-header-search-button">
                    <i class="fas fa-search samuraimart-header-search-icon"></i>検索
                </button>
            </div>
        </form>

        <hr>

        <div class="row">
            <div class="col-md-1">
                <p>ID</p>
            </div>
            <div class="col-md-1">
                <p>名前</p>
            </div>
            <div class="col-md-2">
                <p>メール</p>
            </div>
            <div class="col-md-1">
                <p>住所</p>
            </div>
            <div class="col-md-2">
                <p>電話番号</p>
            </div>
            <div class="col-md-2">
                <p>作成日</p>
            </div>
            <div class="col-md-2">
                <p>更新日</p>
            </div>
            <div class="col-md-1">
                <p>ユーザ詳細</p>
            </div>

            @foreach ($users as $user)
                <div class="col-md-1 mt-2">
                    <h3>{{ $user->id }}</h3>
                </div>
                <div class="col-md-1 mt-2">
                    <h3>{{ $user->name }}</h3>
                </div>
                <div class="col-md-2 mt-2" style="word-break: break-all;">
                    <h3>{{ $user->email }}</h3>
                </div>
                <div class="col-md-1 mt-2">
                    <h3>{{ $user->address }}</h3>
                </div>
                <div class="col-md-2 mt-2">
                    <h3>{{ $user->phone }}</h3>
                </div>
                <div class="col-md-2 mt-2">
                    <h3>{{ $user->created_at->format('Y年m月d日 H:i:s') }}</h3>
                </div>
                <div class="col-md-2 mt-2">
                    <h3>{{ $user->updated_at->format('Y年m月d日 H:i:s') }}</h3>
                </div>
                <div class="col-md-1">
                    <form action="{{ route('users.show', $user) }}" method="GET" class="row g-1">
                        <div class="col-auto">
                            <button type="submit" class="btn samuraimart-header-search-button">詳細</button>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>

        <hr>
    </div>
@endsection
