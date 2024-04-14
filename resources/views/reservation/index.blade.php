@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center mt-3">
    <div class="w-75">
        <h1>予約店舗一覧</h1>

        <hr>

        <div class="row">
            <div class="col-md-6 mt-4">
                <p>店舗名</p>
            </div>
            <div class="col-md-2">
                <p>人数</p>
            </div>
            <div class="col-md-2">
                <p>予約日</p>
            </div>
            <div class="col-md-2">
            </div>
            @foreach ($reservations as $reservation)
            <div class="col-md-6 mt-4">
                <h3 class="mt-4">{{$reservation->store_name}}</h3>
            </div>
            <div class="col-md-2">
                <h3 class="w-100 mt-4">{{$reservation->number}}</h3>
            </div>
            <div class="col-md-2">
                <h3 class="w-100 mt-4">{{$reservation->date->format('Y年m月d日')}}</h3>
            </div>
            <div class="col-md-2">
                <form action="{{ route('reservation.destroy', $reservation->id) }}" method="POST" class="row g-1">
                    @csrf
                    @method('DELETE')
                    <div class="col-auto">
                        <button type="submit" class="btn samuraimart-header-search-button">キャンセル</button>
                    </div>
                </form>
            </div>
            @endforeach
        </div>

        <hr>
    </div>
</div>
@endsection
