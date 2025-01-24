<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\EvenementController;
Route::get('/', function () {
    return view('welcome');
});

Route::get("/evenement",[EvenementController::class,"index"])->name("evenement.index");
Route::get("/CreateEvenement",[EvenementController::class,"create"])->name("CreateEvenement");
Route::post("/storeEvenement",[EvenementController::class,"store"])->name("storeEvenement");
