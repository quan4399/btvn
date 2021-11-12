<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('carts')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::get('/{idProduct}/add-to-cart', [CartController::class, 'addToCart'])->name('cart.addToCart');
    Route::get('/{index}/remove', [CartController::class, 'remove'])->name('cart.remove');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('welcome');
    });

    Route::prefix('admin')->group(function () {
        Route::prefix('products')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('products.index');
            Route::get('/create', [ProductController::class, 'create'])->name('products.create');
            Route::post('/create', [ProductController::class, 'store'])->name('products.store');
            Route::get('/{id}/update', [ProductController::class, 'update'])->name('products.update');
            Route::post('/{id}/update', [ProductController::class, 'edit'])->name('products.edit');
            Route::post('/delete', [ProductController::class, 'delete'])->name('products.delete');
        });

        Route::prefix('categories')->group(function (){
            Route::get('/',[CategoryController::class, 'index'])->name('categories.index');
            Route::get('/create',[CategoryController::class,'create'])->name('categories.create');
            Route::post('/create',[CategoryController::class,'store'])->name('categories.store');
            Route::post('/{id}/update',[CategoryController::class,'update'])->name('categories.update');
            Route::get('/{id}/update',[CategoryController::class,'edit'])->name('categories.edit');
            Route::post('/delete',[CategoryController::class,'delete'])->name('categories.delete');
        });

        Route::get('users', [UserController::class, 'index'])->name('users.index');
        Route::get('users/{id}/delete', [UserController::class, 'destroy'])->name('users.delete');
    });
});


Route::get('/login', function () {
    return view('login');
})->name('showFormLogin');

Route::post('/login',[AuthController::class,'login'])->name('auth.login');


