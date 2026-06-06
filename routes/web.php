<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\CategoryController;

Route::get('/',[MovieController::class,'index']);
Route::get('/movie',[MovieController::class,'index'])->name('movie.index');
Route::get('/movie/create',[MovieController::class,'create'])->name('movie.create');
Route::post('/movie/store',[MovieController::class,'store'])->name('movie.store');
Route::get('/movie/{movie}/edit',[MovieController::class,'edit'])->name('movie.edit');
Route::put('/movie/{movie}',[MovieController::class,'update'])->name('movie.update');
Route::delete('/movie/{movie}',[MovieController::class,'destroy'])->name('movie.destroy');
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category/{category}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
Route::get('/category/{category}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/genre/create', [GenreController::class, 'create'])->name('genre.create');
Route::post('/genre', [GenreController::class, 'store'])->name('genre.store');
Route::resource('genre', GenreController::class);