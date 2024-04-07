@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center mt-3">
    <div class="w-75">
        <h1>売上管理</h1>

        <hr>

        <div class="row">
            <div class="col-md-3 mt-2">
                <p>イメージ</p>
            </div>
            <div class="col-md-6 mt-4">
                <p>店舗名</p>
            </div>
            <div class="col-md-3">
                <p>予約数</p>
            </div>
            @foreach ($stores as $store)
            <div class="col-md-3 mt-2">
                <a href="{{route('stores.show', $store->id)}}">
                    <img src="{{ asset('img/dummy.png')}}" class="img-fluid w-100">
                </a>
            </div>
            <div class="col-md-6 mt-4">
                <h3 class="mt-4">{{$store->name}}</h3>
            </div>
            <div class="col-md-3">
                <h3 class="w-100 mt-4">{{$store->reservations_count}}</h3>
            </div>
            @endforeach
        </div>

        <hr>
    </div>
</div>
@endsection