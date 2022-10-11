<?php

use Illuminate\Support\Facades\Route;

Route::get('/cronologie',[App\Http\Controllers\Api\Cronologie\CronologieController::Class,'index']);
Route::post('/blasts',[App\Http\Controllers\Api\Blasts\BlastController::Class,'store']);
Route::post('/blasts/{blast}/likes',[App\Http\Controllers\Api\Blasts\BlastLikeController::Class,'store']);
Route::delete('/blasts/{blast}/likes',[App\Http\Controllers\Api\Blasts\BlastLikeController::Class,'destroy']);
