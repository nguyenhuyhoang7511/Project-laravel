<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// route with closure
Route::get('/user', function () {
    return "Get user with closure";
});

// multiple HTTP
Route::match(['get', 'post'], '/posts', function () {
    return "Get posts with multiple HTTP ";
});
Route::any('/posts', function () {
    return "Get posts with multiple HTTP ";
});

// Route Parameters
Route::post('/user/{id}', function ($id, Request $rq) {
    return "Get user " . $id;
});

// route prefix
Route::prefix('admin')->group(function () {
    Route::get('/management-user', function () {
        return "Management user";
    });
    Route::get('/crud-user', function () {
        return "CRUD user";
    });
});
// Middleware route
