<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/movie',[MovieController::class,'index']);
Route::get('/movie/create',[MovieController::class,'create']);