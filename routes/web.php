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

//===ADMIN===

Route::group(['namespace' => 'Admin', 'prefix' => 'admin/', 'middleware' => 'admin'], function()
{
    Route::get('/', 'Reviews\IndexController');

    Route::group(['namespace' => 'MainHeader', 'prefix' => 'main_header'], function()
    {
        Route::get('/', 'IndexController')->name('admin.main_header.index');
        Route::get('/{header}', 'ShowController')->name('admin.main_header.show');
        Route::get('/{header}/edit', 'EditController')->name('admin.main_header.edit');
        Route::patch('/{header}', 'UpdateController')->name('admin.main_header.update');
    });

    Route::group(['namespace' => 'About', 'prefix' => 'about'], function()
    {
        Route::get('/', 'IndexController')->name('admin.about.index');
        Route::get('/{about}', 'ShowController')->name('admin.about.show');
        Route::get('/{about}/edit', 'EditController')->name('admin.about.edit');
        Route::patch('/{about}', 'UpdateController')->name('admin.about.update');
    });

    Route::group(['namespace' => 'Banners', 'prefix' => 'banners'], function()
    {
        Route::get('/', 'IndexController')->name('admin.banners.index');
        Route::get('/{banner}', 'ShowController')->name('admin.banners.show');
        Route::get('/{banner}/edit', 'EditController')->name('admin.banners.edit');
        Route::patch('/{banner}', 'UpdateController')->name('admin.banners.update');
        Route::post('', 'StoreController')->name('admin.banners.store');
        Route::delete('/{banner}', 'DestroyController')->name('admin.banners.destroy');
    });


    Route::group(['namespace' => 'Contacts', 'prefix' => 'contacts'], function()
    {
        Route::get('/', 'IndexController')->name('admin.contacts.index');
        Route::get('/{contact}', 'ShowController')->name('admin.contacts.show');
        Route::get('/{contact}/edit', 'EditController')->name('admin.contacts.edit');
        Route::patch('/{contact}', 'UpdateController')->name('admin.contacts.update');
    });

    Route::group(['namespace' => 'Managers', 'prefix' => 'managers'], function()
    {
        Route::get('/', 'IndexController')->name('admin.managers.index');
        Route::get('/{manager}', 'ShowController')->name('admin.managers.show');
        Route::get('/{manager}/edit', 'EditController')->name('admin.managers.edit');
        Route::patch('/{manager}', 'UpdateController')->name('admin.managers.update');
        Route::post('', 'StoreController')->name('admin.managers.store');
        Route::delete('/{manager}', 'DestroyController')->name('admin.managers.destroy');
    });

    Route::group(['namespace' => 'IP', 'prefix' => 'ip'], function()
    {
        Route::get('/', 'IndexController')->name('admin.ip.index');
        Route::get('/{ip}', 'ShowController')->name('admin.ip.show');
        Route::get('/{ip}/edit', 'EditController')->name('admin.ip.edit');
        Route::patch('/{ip}', 'UpdateController')->name('admin.ip.update');
    });

    Route::group(['namespace' => 'Products', 'prefix' => 'products'], function()
    {
        Route::get('/', 'IndexController')->name('admin.products.index');
        Route::get('/{product}', 'ShowController')->name('admin.products.show');
        Route::get('/{product}/edit', 'EditController')->name('admin.products.edit');
        Route::patch('/{product}', 'UpdateController')->name('admin.products.update');
        Route::post('', 'StoreController')->name('admin.products.store');
        Route::delete('/{product}', 'DestroyController')->name('admin.products.destroy');
    });

    Route::group(['namespace' => 'Categories', 'prefix' => 'categories'], function()
    {
        Route::get('/', 'IndexController')->name('admin.categories.index');
        Route::get('/{category}', 'ShowController')->name('admin.categories.show');
        Route::get('/{category}/edit', 'EditController')->name('admin.categories.edit');
        Route::patch('/{category}', 'UpdateController')->name('admin.categories.update');
        Route::post('', 'StoreController')->name('admin.categories.store');
        Route::delete('/{category}', 'DestroyController')->name('admin.categories.destroy');
    });

    Route::group(['namespace' => 'Reviews', 'prefix' => 'reviews'], function()
    {
        Route::get('/', 'IndexController')->name('admin.reviews.index');
        Route::get('/{review}', 'ShowController')->name('admin.reviews.show');
        Route::get('/{review}/edit', 'EditController')->name('admin.reviews.edit');
        Route::patch('/{review}', 'UpdateController')->name('admin.reviews.update');
        Route::post('', 'StoreController')->name('admin.reviews.store');
        Route::delete('/{review}', 'DestroyController')->name('admin.reviews.destroy');
    });

    Route::group(['namespace' => 'Delivery', 'prefix' => 'delivery'], function()
    {
        Route::get('/', 'IndexController')->name('admin.delivery.index');
        Route::get('/{delivery}', 'ShowController')->name('admin.delivery.show');
        Route::get('/{delivery}/edit', 'EditController')->name('admin.delivery.edit');
        Route::patch('/{delivery}', 'UpdateController')->name('admin.delivery.update');
        Route::post('', 'StoreController')->name('admin.delivery.store');
        Route::delete('/{delivery}', 'DestroyController')->name('admin.delivery.destroy');
    });
});

Route::group(['middleware' => 'admin'], function()
{
    Route::get('/admin/banner/create', 'App\Http\Controllers\Admin\Banners\CreateController')->name('admin.banners.create');
    Route::get('/admin/manager/create', 'App\Http\Controllers\Admin\Managers\CreateController')->name('admin.managers.create');
    Route::get('/admin/product/create', 'App\Http\Controllers\Admin\Products\CreateController')->name('admin.products.create');
    Route::get('/admin/review/create', 'App\Http\Controllers\Admin\Reviews\CreateController')->name('admin.reviews.create');
    Route::get('/admin/category/create', 'App\Http\Controllers\Admin\Categories\CreateController')->name('admin.categories.create');
    Route::get('/admin/delivery_s/create', 'App\Http\Controllers\Admin\Delivery\CreateController')->name('admin.delivery.create');
});


//===/ADMIN===



Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/about', 'AboutController@index')->name('about');
Route::get('/delivery', 'DeliveryController@index')->name('delivery');
Route::get('/contacts', 'ContactController@index')->name('contacts');

Route::prefix('/catalogue/')->group(function () {
    Route::resources([
        'products' => \App\Http\Controllers\Catalogue\ProductController::class,
        'categories' => \App\Http\Controllers\Catalogue\CategoryController::class,
    ]);
});

Route::get('/news', 'NewsController@index')->name('news.index');
Route::get('/reviews', 'ReviewsController@index')->name('reviews.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
