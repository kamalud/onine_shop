<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;



// User route start 
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// User route end 

// Admin route start 
Route::group(['prefix'=>'admin','middleware'=>'redirectAdmin'],function(){
    Route::get('login',[AuthController::class,'LoginShow'])->name('admin.login');
    Route::post('login/post',[AuthController::class,'login'])->name('admin.login.post');
    
});
Route::middleware('auth','admin')->prefix('admin')->group(function(){
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::post('logout',[AuthController::class,'logout'])->name('admin.logout');
  });
// Admin route end 


require __DIR__.'/auth.php';
