<?php

use App\Http\Controllers\UserController;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-container', function (Request $request) {
        return $request->input('key');
});

Route::get('/test-provider', function (UserService $userService) {
    dd($userService->listUsers());
});

Route::get('/test-users', [UserController::class, 'index']);

Route::get('/test-facade', function (UserService $userService) {
    dd(Response::json($userService->listUsers()));
});
