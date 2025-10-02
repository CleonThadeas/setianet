<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes - SetiaNet
|--------------------------------------------------------------------------
*/

// Landing
Route::get('/', [ProductController::class, 'index'])->name('landing');

// Auth
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard (redirect by role)
Route::middleware('auth')->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Subscribe (user)
Route::middleware('auth')->get('/subscribe/{id}', [SubscribeController::class, 'subscribe'])->name('subscribe');

// Admin routes
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/reports', [AdminController::class, 'reports'])->name('admin.reports');
    Route::get('/add-package', [AdminController::class, 'addPackage'])->name('admin.addpackage');
    // optionally POST route to store package
    Route::post('/add-package', [AdminController::class, 'storePackage'])->name('admin.storepackage');
});

// User routes
Route::middleware(['auth'])->prefix('user')->group(function () {
    Route::get('/packages', [UserController::class, 'packages'])->name('user.packages');
    Route::get('/mypackage', [UserController::class, 'myPackage'])->name('user.mypackage');
    Route::get('/subscribe/{id}', [SubscribeController::class, 'subscribe'])
    ->name('subscribe')
    ->middleware('auth');

});

// fallback
Route::fallback(fn() => redirect()->route('landing'));
