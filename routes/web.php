<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [HomeController::class, 'index'])
    ->name('home-page');
Route::get('/shopping-cart', function () {
    return view('shopping-cart');
})->name('shopping-cart-page');
Route::get('/my-order', function () {
    return view('my-orders');
})->name('my-orders-page');

Route::prefix('/categories')->group(
    function() {
        Route::prefix('/{categoryName}')->group(function() {
            Route::prefix('/products')->group(function() {
                Route::get('', [ProductController::class, 'getProductByCategory'])
                    ->name('products-by-category-page');
            });
        });
    }
);
