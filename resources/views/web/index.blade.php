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
             <div class="col-4">
                 <a href="#">
                     <img src="{{ asset('img/dummy.png') }}" class="img-thumbnail">
                 </a>
                 <div class="row">
                     <div class="col-12">
                         <p class="samuraimart-product-label mt-2">
                             A店<br>
                             <label>￥2000</label>
                         </p>
                     </div>
                 </div>
             </div>
             <div class="col-4">
                 <a href="#">
                     <img src="{{ asset('img/dummy.png') }}" class="img-thumbnail">
                 </a>
                 <div class="row">
                     <div class="col-12">
                         <p class="samuraimart-product-label mt-2">
                             B店<br>
                             <label>￥500</label>
                         </p>
                     </div>
                 </div>
             </div>
 
             <div class="col-4">
                 <a href="#">
                     <img src="{{ asset('img/dummy.png') }}" class="img-thumbnail">
                 </a>
                 <div class="row">
                     <div class="col-12">
                         <p class="samuraimart-product-label mt-2">
                             C店<br>
                             <label>￥1200</label>
                         </p>
                     </div>
                 </div>
             </div>
 
         </div>
 
         <h1>新着店舗</h1>
         <div class="row">
             <div class="col-3">
                 <a href="#">
                     <img src="{{ asset('img/dummy.png') }}" class="img-thumbnail">
                 </a>
                 <div class="row">
                     <div class="col-12">
                         <p class="samuraimart-product-label mt-2">
                             D店<br>
                             <label>￥55000</label>
                         </p>
                     </div>
                 </div>
             </div>
 
             <div class="col-3">
                 <a href="#">
                     <img src="{{ asset('img/dummy.png') }}" class="img-thumbnail">
                 </a>
                 <div class="row">
                     <div class="col-12">
                         <p class="samuraimart-product-label mt-2">
                             E店<br>
                             <label>￥35000</label>
                         </p>
                     </div>
                 </div>
             </div>
 
             <div class="col-3">
                 <a href="#">
                     <img src="{{ asset('img/dummy.png') }}" class="img-thumbnail">
                 </a>
                 <div class="row">
                     <div class="col-12">
                         <p class="samuraimart-product-label mt-2">
                             D店<br>
                             <label>￥1000</label>
                         </p>
                     </div>
                 </div>
             </div>
 
             <div class="col-3">
                 <a href="#">
                     <img src="{{ asset('img/dummy.png') }}" class="img-thumbnail">
                 </a>
                 <div class="row">
                     <div class="col-12">
                         <p class="samuraimart-product-label mt-2">
                             E店<br>
                             <label>￥2000</label>
                         </p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 @endsection