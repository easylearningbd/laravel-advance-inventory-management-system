<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\BrandController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');
 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

Route::middleware('auth')->group(function () {

    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile'); 
    Route::post('/profile/store', [AdminController::class, 'ProfileStore'])->name('profile.store'); 
    Route::post('/admin/password/update', [AdminController::class, 'AdminPasswordUpdate'])->name('admin.password.update'); 
    
});


Route::middleware('auth')->group(function () {

Route::controller(BrandController::class)->group(function(){
    Route::get('/all/brand', 'AllBrand')->name('all.brand'); 
    Route::get('/add/brand', 'AddBrand')->name('add.brand');
});

    
});



