<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Weather;

class WeatherController extends Controller
{
    public function index() {
        $weathers = Weather::all();
        return view('weather.index', compact('weathers'));
    }
}
