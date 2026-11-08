<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasicController;

Route::get('/', [BasicController::class, 'register'])->name('register');

Route::get('/login', [BasicController::class, 'authorization'])->name('authorization');

Route::get('/home', [BasicController::class, 'requests'])->name('requests');

Route::get('/create_requests', [BasicController::class, 'create_requests'])->name('create_requests');

Route::post('/', [BasicController::class, 'submit_register'])->name('register.post');

Route::post('/authorization', [BasicController::class, 'submit_authorization'])->name('authorization.post');