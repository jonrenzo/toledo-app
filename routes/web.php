<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Services\ProductService;
use App\Services\UserService;
use Illuminate\Support\Facades\Route;
use \Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome', ['name' => 'Toledo-app']);
});

Route::get('/users', [UserController::class, 'index']);
Route::resource('products', ProductController::class);

// Test Container
Route::get('/test-container', function (Request $request) {
    return $request->input('key');
});

// Test Provider
Route::get('/test-provider', function (UserService $userService) {
    dd($userService->listUsers());
});

// Test Users
Route::get('/test-users', [UserController::class, 'index']);

// Test Facade
Route::get('/test-facade', function (UserService $userService) {
    dd(\Illuminate\Support\Facades\Response::json($userService->listUsers()));
});

// Route Parameters
Route::get('/name/{name}/comment/{comment}', function (string $name, string $comment) {
    return 'Name: ' . $name . '<br>Comment: ' . $comment;
});

// Route Parameters
Route::get('/post/{id}', function (string $id) {
    return $id;
})->where('id', '[0-9]+');

// Route Parameters
Route::get('/search/{search}', function (string $search) {
    return $search;
})->where('search', '.*');

// Routing
Route::get('test/route/sample', function () {
    return route('test-route');
})->name('test-route');

// Route Group Middleware
Route::middleware(['user-middleware'])->group(function () {
    Route::get('route-middleware-group/first', function (Request $request) {
        echo 'first';
    });

    Route::get('route-middleware-group/second', function (Request $request) {
        echo 'second';
    });
});

// Route Controller
Route::controller(UserController::class)->group(function(){
    Route::get('/users', 'index');
    Route::get('/users/first', 'first');
    Route::get('/users/{id}', 'show');
});

// Route View
Route::get('/token', function(Request $request){
    return view('token');
});

// Route Post
Route::post('/token', function(Request $request){
    return $request->all();
});

// Route Middleware
//Route::get('users', [UserController::class, 'index'])->middleware('user-middleware');
// Route Resource
// Route::resource('products', ProductController::class);

// Route List
Route::get('product-list', function (ProductService $productService) {
    $data['products'] = $productService->listProducts();

    return view('products.list', $data);
});
