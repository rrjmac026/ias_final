<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('account.expiry')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    // Other routes that require account expiry check
});

