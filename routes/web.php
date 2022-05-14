<?php

use App\Http\Controllers\Controller;
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

Route::get('/services', [Controller::class, 'services'])->name('services');

Route::get('/faqs', [Controller::class, 'faqs'])->name('faqs');

Route::get('/about-us', function () {
    return view('frontend.about');
})->name('about-us');
