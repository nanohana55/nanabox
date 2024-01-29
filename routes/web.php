<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;



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

Route::controller(PostController::class)->middleware(['auth'])->group(function(){
    Route::get('/', 'index')->name('post.index');
    Route::post('/posts', 'store')->name('post.store');
    Route::get('/posts/create', 'create')->name('post.create');
    Route::get('/posts/{post}', 'show')->name('post.show');
    Route::get('/posts/{post}/edit', 'edit')->name('post.edit');
    Route::put('/posts/{post}', 'update')->name('post.update');
    Route::delete('/posts/{post}', 'delete')->name('post.delete');
});

Route::get('/user',[UserController::class,'index'])->name('user.index')->middleware('auth');



