<?php

use Illuminate\Routing\Route;
use App\Http\Controllers\API\RegistrationController;

Route::post('/register', [RegistrationController::class, 'store']);
