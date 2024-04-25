<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'authorize'])->name('post.login');
Route::get('/blog', [BlogController::class, 'index'])->name('index.blog');
Route::get('/blog/{blog}/edit', [BlogController::class, 'edit'])->name('edit.blog');
Route::get('/blog/create', [BlogController::class, 'create'])->name('create.blog');
Route::post('/blog', [BlogController::class, 'save'])->name('save.blog');
Route::put('/blog/{blog}', [BlogController::class, 'update'])->name('update.blog');
Route::delete('/blog/{blog}', [BlogController::class, 'destroy'])->name('delete.blog');


Route::get('/akun', [AkunController::class, 'index'])->name('index.akun');
Route::get('/akun/{username}/edit', [AkunController::class, 'edit'])->name('edit.akun');
Route::get('/akun/create', [AkunController::class, 'create'])->name('create.akun');
Route::post('/akun', [AkunController::class, 'save'])->name('save.akun');
Route::put('/akun/{username}', [AkunController::class, 'update'])->name('update.akun');
Route::delete('/akun/{username}', [AkunController::class, 'destroy'])->name('delete.akun');