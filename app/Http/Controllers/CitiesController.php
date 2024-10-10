<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CitiesController extends Controller
{
   public function handle(Request $request)
    {
        // Replace 'YOUR_API_KEY' with your OpenWeather API key
        $request->validate([
            'city' => 'required|string|max:255',
        ]);
        // Create a new Guzzle client instance

        // Call the seeder
        \Artisan::call('db:seed', [
            '--class' => 'CitiesTableSeeder',
            '--data' => $request->input('city')
        ]);

        return redirect()->back()->with('success', 'City name has been seeded!');
    }
}
