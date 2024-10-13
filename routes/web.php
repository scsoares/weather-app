<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CitiesController;

use App\Http\Controllers\WeatherController;

// setting root route first before the others

Route::get('/', [CitiesController::class, 'index'])->name('weather.index');
Route::post('/', [CitiesController::class, 'store'])->name('weather.store');
Route::delete('/weather/{id}', [CitiesController::class, 'destroy'])->name('weather.destroy');
