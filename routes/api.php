<?php

use Illuminate\Support\Facades\Route;

Route::get('/cronologie',[App\Http\Controllers\Api\Cronologie\CronologieController::Class,'index']);
Route::post('/blasts',[App\Http\Controllers\Api\Blasts\BlastController::Class,'store']);
