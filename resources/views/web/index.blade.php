@extends('layouts.app')
 
 @section('content')
 <div class="row">
     <div class="col-2">
         @component('components.sidebar', ['categories' => $categories, 'major_categories' => $major_categories])
         @endcomponent
     </div>
     <div class="col-9">
        <h1>おすすめ店舗</h1>
        <div class="row">
        @foreach($stores as $store)
            @if($store->recommendation_flg == 1)
                <div class="col-4">
                    <a href="{{route('stores.show', $store)}}">
                        <img src="{{ asset('img/dummy.png')}}" class="img-thumbnail">
                    </a>
                    <div class="row">
                        <div class="col-12">
                            <p class="samuraimart-store-label mt-2">
                                {{$store->name}}<br>
                                <label>￥{{$store->price}}</label><br>
                            </p>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        </div>

        <h1>新着店舗</h1>
        <div class="row">
        @foreach($new_stores as $new_store)
            @if($store->recommendation_flg == 1)
                <div class="col-3">
                    <a href="{{route('stores.show', $new_store)}}">
                        <img src="{{ asset('img/dummy.png')}}" class="img-thumbnail">
                    </a>
                    <div class="row">
                        <div class="col-12">
                            <p class="samuraimart-store-label mt-2">
                                {{$new_store->name}}<br>
                                <label>￥{{$new_store->price}}</label><br>
                            </p>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        </div>
     </div>
 </div>
 @endsection