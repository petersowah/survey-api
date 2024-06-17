<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::post('/auth/login', \App\Http\Controllers\AuthController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/surveys', \App\Http\Controllers\SurveyController::class);
    Route::apiResource('/surveys/{survey}/questions', \App\Http\Controllers\QuestionController::class);
    Route::apiResource('/surveys/{survey}/questions/{question}/responses', \App\Http\Controllers\ResponseController::class);
});
