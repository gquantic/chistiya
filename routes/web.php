<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::view('/about', 'main.about')->name('about');
Route::view('/delivery', 'main.delivery')->name('delivery');
Route::view('/contacts', 'main.contacts')->name('contacts');

Route::view('/news', 'news.index');
Route::view('/reviews', 'reviews.index')->name('reviews.index');
