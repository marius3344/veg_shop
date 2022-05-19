<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::group(['middleware'=>['auth']], function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Admin routes, Role id - 1
    Route::group(['middleware'=>['roles:1']], function(){
        Route::controller(ProductController::class)->group(function(){
            Route::get('/product/create', 'create')->name('product.create');
            Route::post('/product', 'store')->name('product.store');
            Route::get('/product', 'index')->name('product.index');
        });
    });
    
    Route::controller(OrderController::class)->group(function(){
        Route::get('/order/create', 'create')->name('order.create');
        Route::post('/order', 'store')->name('order.store');
        Route::get('/order', 'index')->name('order.index');
    });
});
