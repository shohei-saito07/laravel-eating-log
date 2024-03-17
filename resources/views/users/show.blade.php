@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h1 class="mt-3 mb-3">会員情報詳細</h1>
                <hr>


                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="name" class="text-md-left samuraimart-edit-user-info-label">氏名</label>
                    </div>
                    <div class="collapse show editUserName">
                        <p class="form-control-static">{{ $user->name }}</p>
                    </div>
                </div>
                <hr>

                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="email" class="text-md-left samuraimart-edit-user-info-label">メールアドレス</label>
                    </div>
                    <div class="collapse show editUserMail">
                        <p class="form-control-static">{{ $user->email }}</p>
                    </div>
                </div>
                <hr>
                
                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="postal_code" class="text-md-left samuraimart-edit-user-info-label">郵便番号</label>
                    </div>
                    <div class="collapse show editUserPhone">
                        <p class="form-control-static">{{ $user->postal_code }}</p>
                    </div>
                </div>
                <hr>

                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="address" class="text-md-left samuraimart-edit-user-info-label">住所</label>
                    </div>
                    <div class="collapse show editUserPhone">
                        <p class="form-control-static">{{ $user->address }}</p>
                    </div>
                </div>
                <hr>

                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="phone" class="text-md-left samuraimart-edit-user-info-label">電話番号</label>
                    </div>
                    <div class="collapse show editUserPhone">
                        <p class="form-control-static">{{ $user->phone }}</p>
                    </div>
                </div>
                <hr>

            </div>
        </div>
    </div>
@endsection