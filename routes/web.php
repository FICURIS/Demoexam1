<?php

use Illuminate\Support\Facades\Route;

Route::get('/register', function () {
    return view('static.register');
})->name('register');

Route::get('/authorization', function () {
    return view('static.authorization');
})->name('authorization');

Route::get('/requests', function () {
    return view('static.requests');
})->name('requests');

Route::get('/create_requests', function () {
    return view('static.create_requests');
})->name('create_requests');

Route::post('/register', function () {
    return redirect('/register')->withInput();
})->name('register.post');