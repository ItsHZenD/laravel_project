<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;



Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/companies', [CompanyController::class, 'index'])->name('companies');
