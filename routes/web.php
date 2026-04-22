<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/movie', function () {
    return view('movie.index', ['title' => 'Movie']);
});

Route::get('/movie/create', function () {
    return view('movie.create', ['title' => 'Create Movie']);
});