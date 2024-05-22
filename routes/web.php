<?php

use App\Http\Controllers\AdminAuctionController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminRequestController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Route::get('admin/dashboard',[HomeController::class, 'index'])->middleware(['auth','admin']);
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('users/bidders', [AdminUserController::class, 'bidders'])->name('users.bidders');
    Route::get('users/sellers', [AdminUserController::class, 'sellers'])->name('users.sellers');
    Route::get('bids/active', [AdminAuctionController::class, 'active'])->name('bids.active');
    Route::get('bids/closed', [AdminAuctionController::class, 'closed'])->name('bids.closed');
    Route::get('categories', [AdminCategoryController::class, 'index'])->name('categories');
    Route::get('items', [AdminRequestController::class, 'index'])->name('items');

    Route::delete('admin/user/{id}', [AdminUserController::class, 'destroy'])->name('user.destroy');
    Route::patch('admin/user/{id}', [AdminUserController::class, 'updateSeller'])->name('user.update');
});