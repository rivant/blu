<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EmpireApiController;
use App\Http\Controllers\Api\ReleaseApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/empires', [EmpireApiController::class, 'index']);
Route::get('/releases', [ReleaseApiController::class, 'index']);
