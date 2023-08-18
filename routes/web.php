<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthenticateController::class, 'loginIndex'])->name('login');
Route::post('/login', [AuthenticateController::class, 'login'])->name('login'); // Fixed route definition
Route::get('/logout', [AuthenticateController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function() {
    Route::get('/admin/home',[AdminController::class, 'index'])->name('admin');
    Route::resource('admin/sellers',SellerController::class);
    Route::resource('admin/products',ProductController::class);
    Route::resource('admin/brands',BrandController::class);
    Route::resource('admin/categories',CategoryController::class);
});

Route::get('/home/pay', [HomeController::class, 'index']);

