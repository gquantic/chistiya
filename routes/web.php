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

Route::prefix('/catalogue/')->group(function () {
    Route::resources([
        'products' => \App\Http\Controllers\Catalogue\ProductController::class,
        'categories' => \App\Http\Controllers\Catalogue\CategoryController::class,
    ]);
});

Route::view('/news', 'news.index');
Route::view('/reviews', 'reviews.index')->name('reviews.index');
