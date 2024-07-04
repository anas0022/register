<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Registration;

Route::get('/', [Registration::class, 'register']);
Route::post('/register', [Registration::class, 'registration'])->name('register.post');
Route::get('/login', [Registration::class, 'login'])->name('login');
Route::post('/login', [Registration::class, 'loginpost'])->name('login.post');
Route::get('/dashboard', [Registration::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/logout', [Registration::class, 'logout'])->name('logout');