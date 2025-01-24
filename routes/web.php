<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\EvenementController;
Route::get('/', function () {
    return view('welcome');
});

Route::get("/evenement",[EvenementController::class,"index"])->name("evenement.index");
Route::get("/CreateEvenement",[EvenementController::class,"create"])->name("CreateEvenement");
Route::post("/storeEvenement",[EvenementController::class,"store"])->name("storeEvenement");
Route::delete('/deleteEvenement/{id}',[EvenementController::class,"destroy"])->name("deleteEvenement");
Route::get("/editEvenement/{id}",[EvenementController::class,"edit"])->name("editEvenement");
Route::put("updateEvenement{id}",[EvenementController::class,"update"])->name("updateEvenement");
