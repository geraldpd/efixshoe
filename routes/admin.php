<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'namespace' => 'Admin',
], function(){

    Auth::routes(['register' => false]);

    Route::group([
        'middleware' => ['admin', 'verified'],
    ], function(){

        Route::get('/', [HomeController::class, 'index'])->name('home');

        Route::resource('bookings', BookingController::class);
        Route::resource('services', ServiceController::class);
        Route::resource('payment_methods', PaymentMethodController::class);
        Route::resource('vouchers', VoucherController::class);

    });
});

