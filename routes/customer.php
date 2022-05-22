<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\Controller;

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
    'middleware' => ['customer'],
], function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/booking', [Controller::class, 'index'])->name('booking');
    Route::post('/add-to-cart', [Controller::class, 'addToCart'])->name('cart.store');
    Route::get('/my-cart', [Controller::class, 'myCart'])->name('cart.content');
});
