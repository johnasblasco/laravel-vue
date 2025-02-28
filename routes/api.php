<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::get('/', function () {
    return [
        [
            "hehe" => "huhu",
            "haha" => "hoho"
        ]
    ];
});

// Routes
Route::apiResource('post', PostController::class);
