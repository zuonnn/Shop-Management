<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SellerController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/store', [LoginController::class, 'store']);

Route::middleware(['auth'])->group(function() {
    Route::get('/admin/home',[AdminController::class, 'index'])->name('admin');
});

Route::resource('admin/sellers',SellerController::class);