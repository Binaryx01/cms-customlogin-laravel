<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;

Route::get('/', [PostController::class, 'index'])->name('posts.index');

Route::middleware('guest')->group(function(){

Route::get('register',[AuthController::class,'showRegisterForm'])->name('posts.showRegisterForm');
Route::get('login',[AuthController::class,'showLoginForm'])->name('posts.showLoginForm');
Route::post('register',[AuthController::class,'register'])->name('posts.register');
Route::post('login',[AuthController::class,'login'])->name('posts.login');

});



Route::middleware('auth')->group(function(){
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

 Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::post('logout', [AuthController::class, 'logout'])->name('posts.logout');
Route::get('create', [PostController::class, 'create'])->name('admindashboard.create');
Route::get('dashboard', [PostController::class, 'dashboard'])->name('dashboard');
Route::get('edit/{post}/edit', [PostController::class, 'edit'])->name('admindashboard.edit');
Route::put('update/{post}', [PostController::class, 'update'])->name('posts.update');



// Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
// Route::put('posts/{post}', [PostController::class, 'update'])->name('posts.update');


});