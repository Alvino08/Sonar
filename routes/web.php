<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/audiopost', function () {
    return view('audiopost');
})->name("audiopost");

Route::get('/loading', function () {
    return view('loading');
})->name("loading");
