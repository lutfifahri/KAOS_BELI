<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index');
Route::match(['get', 'post'], 'add-to-cart', 'HomeController@addToCart');

Route::prefix('cart')->group(function () {
    Route::get('/', 'CartController@index');
    Route::post('update-or-checkout', 'CartController@updateOrCheckout');
    Route::get('delete/{id}', 'CartController@delete');
});

Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::match(['get', 'post'], '/', 'AuthController@login');

    Route::middleware('auth')->group(function () {
        Route::prefix('auth')->group(function () {
            Route::match(['get', 'post'], 'profile', 'AuthController@profile');
            Route::match(['get', 'post'], 'change-password', 'AuthController@changePassword');
            Route::get('logout', 'AuthController@logout');
        });

        Route::get('home', function () {
            return view('admin.layouts.index', ['data' => [
                'time' => date('G', time()),
                'content' => 'admin.home'
            ]]);
        });

        Route::prefix('printing')->group(function () {
            Route::get('/', 'PrintingController@index');
            Route::get('datatable', 'PrintingController@datatable');
            Route::post('create-data', 'PrintingController@createData');
            Route::get('show-data', 'PrintingController@showData');
            Route::post('update-data', 'PrintingController@updateData');
            Route::delete('destroy-data', 'PrintingController@destroyData');
        });

        Route::prefix('sticker')->group(function () {
            Route::get('/', 'StickerController@index');
            Route::get('datatable', 'StickerController@datatable');
            Route::post('create-data', 'StickerController@createData');
            Route::get('show-data', 'StickerController@showData');
            Route::post('update-data', 'StickerController@updateData');
            Route::delete('destroy-data', 'StickerController@destroyData');
        });

        Route::prefix('category')->group(function () {
            Route::get('/', 'CategoryController@index');
            Route::get('datatable', 'CategoryController@datatable');
            Route::post('create-data', 'CategoryController@createData');
            Route::get('show-data', 'CategoryController@showData');
            Route::post('update-data', 'CategoryController@updateData');
            Route::delete('destroy-data', 'CategoryController@destroyData');
        });

        Route::prefix('product')->group(function () {
            Route::get('/', 'ProductController@index');
            Route::get('datatable', 'ProductController@datatable');
            Route::post('create-data', 'ProductController@createData');
            Route::get('show-data', 'ProductController@showData');
            Route::post('update-data', 'ProductController@updateData');
            Route::delete('destroy-data', 'ProductController@destroyData');
        });

        Route::prefix('transaction')->group(function () {
            Route::get('/', 'TransactionController@index');
            Route::get('datatable', 'TransactionController@datatable');
            Route::get('show-data', 'TransactionController@showData');
        });

        Route::prefix('recap')->group(function () {
            Route::get('/', 'RecapController@index');
            Route::get('datatable', 'RecapController@datatable');
        });

        Route::prefix('user')->group(function () {
            Route::get('/', 'UserController@index');
            Route::get('datatable', 'UserController@datatable');
            Route::post('create-data', 'UserController@createData');
            Route::get('show-data', 'UserController@showData');
            Route::post('update-data', 'UserController@updateData');
            Route::delete('destroy-data', 'UserController@destroyData');
        });
    });
});
