<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'authorize'])->name('post.login');
Route::get('/blog', [BlogController::class, 'index'])->name('index.blog');
Route::post('/blog', [BlogController::class, 'create'])->name('create.blog');
Route::get('/blog/{blog}/edit', [BlogController::class, 'edit'])->name('edit.blog');
Route::put('/blog/{blog}', [BlogController::class, 'update'])->name('update.blog');