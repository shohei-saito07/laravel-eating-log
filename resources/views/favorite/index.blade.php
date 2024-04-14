@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center mt-3">
    <div class="w-75">
        <h1>お気に入り店舗一覧</h1>

        <hr>

        <div class="row">
            <div class="col-md-2 mt-2">
                <p>イメージ</p>
            </div>
            <div class="col-md-4 mt-4">
                <p>店舗名</p>
            </div>
            <div class="col-md-4">
                <p>詳細</p>
            </div>
            <div class="col-md-2">
                <p>お気に入り解除</p>
            </div>
            @if($favorite_stores ==! null OR !empty($favorite_stores))
                @foreach ($favorite_stores as $favorite_store)
                <div class="col-md-2 mt-2">
                    <a href="{{route('stores.show', $favorite_store->id)}}">
                        <img src="{{ asset('img/dummy.png')}}" class="img-fluid w-100">
                    </a>
                </div>
                <div class="col-md-4 mt-4">
                    <h3 class="mt-4">{{$favorite_store->name}}</h3>
                </div>
                <div class="col-md-4">
                    <h3 class="w-100 mt-4">{{$favorite_store->description}}</h3>
                </div>
                <div class="col-md-2">
                    <h3 class="w-100 mt-4"></h3>
                    <a href="{{ route('favorites.destroy', $favorite_store->id) }}" class="btn eating-log-favorite-button text-favorite w-100" onclick="event.preventDefault(); document.getElementById('favorites-destroy-form').submit();">
                        <i class="fa fa-heart"></i>
                        お気に入り解除
                    </a>
                </div>
                <form id="favorites-destroy-form" action="{{ route('favorites.destroy', $favorite_store->id) }}" method="POST" class="d-none">
                        @csrf
                        @method('DELETE')
                </form>
                @endforeach
            @endif
        </div>
        
        <hr>
    </div>
</div>
@endsection
