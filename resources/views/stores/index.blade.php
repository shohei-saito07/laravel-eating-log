@extends('layouts.app')
 
@section('content')
<div class="row">
    <div class="col-2">
        @component('components.sidebar', ['categories' => $categories, 'major_categories' => $major_categories])
        @endcomponent
    </div>
    <div class="col-9">
        <div class="container">
            @if ($category !== null)
                <a href="{{ route('stores.index') }}">トップ</a> > <a href="#">{{ $category->major_category->name }}</a> > {{ $category->name }}
                <h1>{{ $category->name }}の商品一覧{{$total_count}}件</h1>
             @elseif ($keyword !== null)
                 <a href="{{ route('stores.index') }}">トップ</a> > 商品一覧
                 <h1>"{{ $keyword }}"の検索結果{{$total_count}}件</h1>
            @endif
        </div>
        <div>
            Sort By
            @sortablelink('id', 'ID')
            @sortablelink('price', 'price')
        </div>
        <div class="container mt-4">
            <div class="row w-100">
                @foreach($stores as $store)
                <div class="col-3">
                    <a href="{{route('stores.show', $store)}}">
                        <img src="{{ asset('img/dummy.png')}}" class="img-thumbnail">
                    </a>
                    <div class="row">
                        <div class="col-12">
                            <p class="samuraimart-store-label mt-2">
                                {{$store->name}}<br>
                                <label>￥{{$store->price}}</label><br>
                                @if (Auth::user() !== null AND Auth::user()->is_admin)
                                    <a href="{{ route('stores.edit', $store->id) }}">編集</a>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        {{ $stores->links() }}
    </div>
</div>
@endsection