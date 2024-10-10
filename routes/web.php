<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WeatherController;

Route::get('/', function () {
    return view('weather.index');
});

Route::get('/weather-list', function () {
    return view('weather.list');
});


Route::resource('weathers', WeatherController::class);

Route::get('/weather-list', [WeatherController::class, 'getWeather']);

Route::post('/weather-list', [CitiesController::class, 'handle'])->name('weatherList');