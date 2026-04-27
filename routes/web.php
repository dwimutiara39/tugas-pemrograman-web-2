<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/',[MovieController::class,'index']);
Route::get('/movie',[MovieController::class,'index'])->name('movie.index');
Route::get('/movie/create',[MovieController::class,'create'])->name('movie.create');
Route::post('/movie/store',[MovieController::class,'store'])->name('movie.store');