<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\BasicInfoController;
use App\Http\Controllers\SalesManagement;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',  [WebController::class, 'index'])->name('top');

require __DIR__.'/auth.php';

//Route::post('/subscribe_process', 'HomeController@subscribe_process');

// 店舗
Route::resource('stores', StoreController::class);

Route::middleware(['auth', 'verified'])->group(function () {
    

    // レビュー
    Route::post('reviews', [ReviewController::class, 'store'])->name('reviews.store');

    // お気に入り
    Route::controller(FavoriteController::class)->group(function () {
        Route::post('favorites/{store_id}', 'store')->name('favorites.store');
        Route::delete('favorites/{store_id}', 'destroy')->name('favorites.destroy');
        Route::get('favorites', 'index')->name('favorites.index');
    });

    // ユーザ情報
    Route::controller(UserController::class)->group(function () {
        Route::get('users/mypage', 'mypage')->name('mypage');
        Route::get('users/mypage/edit', 'edit')->name('mypage.edit');
        Route::put('users/mypage', 'update')->name('mypage.update');
        Route::get('user/mypage/password/edit', 'edit_password')->name('mypage.edit_password');
        Route::put('user/mypage/password', 'update_password')->name('mypage.update_password');
        Route::delete('users/mypage/delete', 'destroy')->name('mypage.destroy');
        Route::get('users/index', 'index')->name('users.index');
        Route::get('users/{user} ', 'show')->name('users.show');
    });

    // 予約
    Route::controller(ReservationController::class)->group(function () {
        Route::get('reservation', 'index')->name('reservation.index');
        Route::post('reservation', 'store')->name('reservation.store');
        Route::delete('reservation/{reservation_id}', 'destroy')->name('reservation.destroy');
    });

    // カテゴリ
    Route::resource('category', CategoryController::class);

    Route::controller(BasicInfoController::class)->group(function () {
        Route::get('basicInfo', 'show')->name('basicInfo.show');
        Route::get('basicInfo/edit/{basicinfo_id}', 'edit')->name('basicInfo.edit');
        Route::put('basicInfo/update/{basicinfo_id}', 'update')->name('basicInfo.update');
    });

    // 売上管理
    Route::controller(SalesManagement::class)->group(function () {
        Route::get('salesManagement', 'index')->name('salesManagement.index');
    });
    

    // Route::middleware(['AdminMiddleware'])->group(function(){
    //     // アドミン以外見られたくないルート設定
    //     // 基本情報
    //     // Route::resource('basicInfo', BasicInfoController::class);
    //     Route::controller(BasicInfoController::class)->group(function () {
    //         Route::get('basicInfo', 'show')->name('basicInfo.show');
    //         Route::get('basicInfo/edit', 'edit')->name('basicInfo.edit');
    //         Route::put('basicInfo/update', 'update')->name('basicInfo.update');
    //     });

    //     // 売上管理
    //     Route::controller(SalesManagement::class)->group(function () {
    //         Route::get('salesManagement', 'index')->name('salesManagement.index');
    //     });
    // });
    

    // サブスクリプション
    Route::get('tempsubscription/cancel', [SubscriptionController::class, 'cancel'])->name('subscription.cancel');
    Route::resource('subscription', SubscriptionController::class);
});