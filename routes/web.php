<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\WebController;
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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('stores', StoreController::class);

    Route::post('reviews', [ReviewController::class, 'store'])->name('reviews.store');

    Route::post('favorites/{store_id}', [FavoriteController::class, 'store'])->name('favorites.store');
    Route::delete('favorites/{store_id}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');

    Route::controller(UserController::class)->group(function () {
        Route::get('users/mypage', 'mypage')->name('mypage');
        Route::get('users/mypage/edit', 'edit')->name('mypage.edit');
        Route::put('users/mypage', 'update')->name('mypage.update');
        Route::get('user/mypage/password/edit', 'edit_password')->name('mypage.edit_password');
        Route::put('user/mypage/password', 'update_password')->name('mypage.update_password');
    });

    Route::controller(CheckoutController::class)->group(function () {
        Route::get('checkout', 'index')->name('checkout.index');
        Route::post('checkout', 'store')->name('checkout.store');
        Route::get('checkout/success', 'success')->name('checkout.success');
    });

    // 予約コントローラー
    Route::controller(ReservationController::class)->group(function () {
        Route::get('reservation', 'index')->name('reservation.index');
        Route::post('reservation', 'store')->name('reservation.store');
    });
});