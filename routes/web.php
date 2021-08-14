<?php

use App\Http\Controllers\HomeController;
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

Route::prefix('/')->group(function () {
    Route::get('/', [HomeController::class, 'index'])
        ->name('home-page');
    Route::get('/shopping-cart', function () {
        return view('shopping-cart');
    })->name('shopping-cart-page');
    Route::get('/my-order', function () {
        return view('my-orders');
    })->name('my-orders-page');

    Route::get('/smartphones', function () {
        return view('smartphones');
    })->name('smartphone-page');
    Route::get('/tablets', function () {
        return view('tablets');
    })->name('tablet-page');
    Route::get('/laptops', function () {
        return view('laptops');
    })->name('laptop-page');
    Route::get('/pcs', function () {
        return view('pcs');
    })->name('pc-page');
    Route::get('/accessories', function () {
        return view('accessories');
    })->name('accessory-page');
});
