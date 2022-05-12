<?php

use App\Http\Controllers\Customer\Controller;
use Illuminate\Support\Facades\Route;

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

//AUTH ROUTES
Auth::routes(['verify' => true]);

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

//FRONT ONLY
Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', function () {
    return view('frontend.home');
})->name('home');

Route::get('/services', function () {
    return view('frontend.services');
})->name('services');

Route::get('/faqs', function () {
    return view('frontend.faqs');
})->name('faqs');

Route::get('/about-us', function () {
    return view('frontend.about');
})->name('about-us');

//CUSTOMER ROUTES
Route::group(['middleware' => 'customer'], function () {
    Route::get('/booking', [Controller::class, 'index'])->name('booking');
    Route::post('/add-to-cart', [Controller::class, 'addToCart'])->name('cart.store');
});
