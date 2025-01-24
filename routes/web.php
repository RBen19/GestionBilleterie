<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\EvenementController;
Route::get('/', function () {
    return view('welcome');
});

Route::get("/evenement",[EvenementController::class,"index"]);
