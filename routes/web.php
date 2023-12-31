<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthenticateController::class, 'loginIndex'])->name('login');
Route::get('/', [AuthenticateController::class, 'loginIndex'])->name('login');
Route::post('/login', [AuthenticateController::class, 'login'])->name('login'); 
Route::post('/logout', [AuthenticateController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/home', [AdminController::class, 'index'])->name('admin');
    Route::post('/admin/home', [AdminController::class, 'index'])->name('admin');
    Route::resource('admin/sellers', SellerController::class);
    Route::resource('admin/products', ProductController::class);
    Route::resource('admin/brands', BrandController::class);
    Route::resource('admin/categories', CategoryController::class);
});

Route::middleware(['auth', 'seller'])->group(function () {
    Route::get('/seller', [HomeController::class, 'index'])->name('seller');
    Route::post('/search', [ProductController::class, 'search'])->name('search');
    Route::post('/addproduct', [ProductController::class, 'addProduct'])->name('addproduct');
    Route::delete('/delete-product/{productId}', [ProductController::class, 'deleteProduct'])->name('delete.product');
    Route::get('/export-pdf', 'App\Http\Controllers\ProductController@exportPDF')->name('export-pdf');
});
