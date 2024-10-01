<?php

use App\Http\Controllers\Api\CatagoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/catagory', [CatagoryController::class, 'index']);
