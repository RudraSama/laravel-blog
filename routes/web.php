<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

//ROUTES FOR LOGIN
Route::get('/login', [LoginController::class, 'login']);
