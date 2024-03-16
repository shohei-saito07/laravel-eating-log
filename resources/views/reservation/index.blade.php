@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center mt-3">
    <div class="w-75">
        <h1>予約店舗一覧</h1>

        <hr>

        <div class="row">
            <div class="col-md-2 mt-2">
                <p>イメージ</p>
            </div>
            <div class="col-md-6 mt-4">
                <p>店舗名</p>
            </div>
            <div class="col-md-2">
                <p>人数</p>
            </div>
            <div class="col-md-2">
                <p>予約日</p>
            </div>
            @foreach ($reservations as $reservation)
            <div class="col-md-2 mt-2">
                <a href="{{route('stores.show', $reservation->store_id)}}">
                    <img src="{{ asset('img/dummy.png')}}" class="img-fluid w-100">
                </a>
            </div>
            <div class="col-md-6 mt-4">
                <h3 class="mt-4">{{$reservation->store_name}}</h3>
            </div>
            <div class="col-md-2">
                <h3 class="w-100 mt-4">{{$reservation->number}}</h3>
            </div>
            <div class="col-md-2">
                <h3 class="w-100 mt-4">{{$reservation->date}}</h3>
            </div>
            @endforeach
        </div>

        <hr>
    </div>
</div>
@endsection
