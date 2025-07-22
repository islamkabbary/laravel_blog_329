<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::post("login", [AuthController::class, "login"]);

Route::middleware("auth:sanctum")->group(function () {
    Route::apiResource("posts", PostController::class);
});

/*
/api/posts = get => index
/api/posts = post => store
/api/posts/{id} = get => show
/api/posts/{id} = put => update
/api/posts/{id} = delete => destroy
*/