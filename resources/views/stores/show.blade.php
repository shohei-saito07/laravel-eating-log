@extends('layouts.app') 

@section('content')

<div class="d-flex justify-content-center">
    <div class="row w-75">
        <div class="col-5 offset-1">
            <img src="{{ asset('img/dummy.png')}}" class="w-100 img-fluid">
        </div>
        <div class="col">
            <div class="d-flex flex-column">
                <h1 class="">
                    {{$store->name}}
                </h1>
                <p class="">
                    {{$store->description}}
                </p>
                <hr>
            </div>
            @auth
            <!-- 有料会員の表示 -->
            <form method="POST" action="{{route('reservation.store')}}"class="m-3 align-items-end">
                @csrf
                <input type="hidden" name="id" value="{{$store->id}}">
                <input type="hidden" name="name" value="{{$store->name}}">
                <input type="hidden" name="price" value="{{$store->price}}">
                <div class="row">
                    @error('title')
                        <strong>人数を入力してください</strong>
                    @enderror
                    <div class="form-group row">
                        <label for="quantity" class="col-sm-2 col-form-label">人数</label>
                        <div class="col-sm-10">
                            <input type="number" id="quantity" name="number" min="1" value="1" class="form-control w-25">
                        </div>
                    </div>
                    @error('reservation_date')
                        <strong>予約日時を入力してください</strong>
                    @enderror
                    <div class="form-group row">
                        <label for="reservation_date" class="col-sm-2 col-form-label">予約日時</label>
                        <div class="col-sm-10">
                            <input type="date" id="reservation_date" name="reservation_date" class="form-control w-25">
                        </div>
                    </div>
                </div>
                <input type="hidden" name="weight" value="0">
                <div class="row">
                    <div class="col-7">
                        <button type="submit" class="btn eating-log-submit-button w-75">
                            <i class="fas fa-shopping-cart"></i>
                            予約
                        </button>
                    </div>
                    @if(Auth::user()->subscription('default')->recurring())
                    <div class="col-5">
                        @if(Auth::user()->favorite_stores()->where('store_id', $store->id)->exists())
                            <a href="{{ route('favorites.destroy', $store->id) }}" class="btn eating-log-favorite-button text-favorite w-100" onclick="event.preventDefault(); document.getElementById('favorites-destroy-form').submit();">
                                <i class="fa fa-heart"></i>
                                お気に入り解除
                            </a>
                        @else
                            <a href="{{ route('favorites.store', $store->id) }}" class="btn eating-log-favorite-button text-favorite w-100" onclick="event.preventDefault(); document.getElementById('favorites-store-form').submit();">
                                <i class="fa fa-heart"></i>
                                お気に入り
                            </a>
                        @endif
                    </div>
                    @endif
                </div>
            </form>
            
            <form id="favorites-destroy-form" action="{{ route('favorites.destroy', $store->id) }}" method="POST" class="d-none">
                @csrf
                @method('DELETE')
            </form>
            <form id="favorites-store-form" action="{{ route('favorites.store', $store->id) }}" method="POST" class="d-none">
                @csrf
            </form>
            @endauth
        </div>

        <div class="offset-1 col-11">
            <hr class="w-100">
            <h3 class="float-left">カスタマーレビュー</h3>
        </div>

        <div class="offset-1 col-10">
            <div class="row">
                @foreach($reviews as $review)
                <div class="offset-md-5 col-md-5">
                    <p class="h3 review-title">{{$review->title}}</p>
                    <p class="h3 review-content">{{$review->content}}</p>
                   
                    <label>{{$review->created_at}} {{$review->user->name}}</label>
                    @if(Auth::user() !== null AND Auth::user()->id == $review->user_id)
                        <!-- 編集ボタン -->
                        <form id="review-edit-form" action="{{ route('reviews.edit',$review) }}" method="GET" class="d-inline">
                            <button id="review-edit" class="btn btn-primary edit-btn">編集</button>
                        </form>
                        <!-- 削除ボタン -->
                        <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">削除</button>
                        </form>
                    @endif
                </div>
                @endforeach
            </div><br />
            @auth
            @if(Auth::user()->subscription('default')->recurring())
                <div class="row">
                    <div class="offset-md-5 col-md-5">
                        <form method="POST" action="{{ route('reviews.store') }}">
                            @csrf
                            <h4>タイトル</h4>
                            @error('title')
                                <strong>タイトルを入力してください</strong>
                            @enderror
                            <input type="text" name="title" class="form-control m-2">
                            <h4>レビュー内容</h4>
                            @error('content')
                                <strong>レビュー内容を入力してください</strong>
                            @enderror
                            <textarea name="content" class="form-control m-2"></textarea>
                            <input type="hidden" name="store_id" value="{{$store->id}}">
                            <button type="submit" class="btn eating-log-submit-button ml-2">レビューを追加</button>
                        </form>
                    </div>
                </div>
            @endif
            @endauth
        </div>
    </div>
</div>
@endsection