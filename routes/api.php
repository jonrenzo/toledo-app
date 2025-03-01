<?php

use App\Http\Middleware\UserMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Middleware
Route::get('user', function (Request $request) {
    echo 'Welcome API - Test Middleware';
})->middleware(UserMiddleware::class);
