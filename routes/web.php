<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/audiopost', function () {
    return view('audiopost');
})->name("audiopost");

Route::get('/audiopost2', function () {
    return view('audiopost2');
})->name("audiopost2");

Route::get('/loading', function () {
    return view('loading');
})->name("loading");

Route::get('/logo', function () {
    return view('logo-sonar');
})->name("logo");
