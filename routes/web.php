<?php

use App\Http\Controllers\AdminController;
<<<<<<< HEAD
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
=======
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
>>>>>>> 8e77f5e55cea67e688c61d38ed68c5d2548a810e
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use Illuminate\Support\Facades\Route;

<<<<<<< HEAD
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
=======
Route::get('/login', [AuthenticateController::class, 'loginIndex'])->name('login');
Route::post('/login', [AuthenticateController::class, 'login'])->name('login'); // Fixed route definition
Route::get('/logout', [AuthenticateController::class, 'logout'])->name('logout');
>>>>>>> 8e77f5e55cea67e688c61d38ed68c5d2548a810e

Route::middleware(['auth'])->group(function() {
    Route::get('/admin/home',[AdminController::class, 'index'])->name('admin');
    Route::resource('admin/sellers',SellerController::class);
    Route::resource('admin/products',ProductController::class);
    Route::resource('admin/brands',BrandController::class);
    Route::resource('admin/categories',CategoryController::class);
});

Route::get('/home/pay', [HomeController::class, 'index']);

