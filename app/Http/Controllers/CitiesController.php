<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\City;

use Illuminate\Http\Request;

use GuzzleHttp\Client;

class CitiesController extends Controller
{
    public function index()
    {
        // Stores all City (eloquent model) data in a cities variable a returns
        $cities = City::all();

        $weatherData = [];

        foreach ($cities as $city) {
            $weatherData[$city->id] = $this->getWeatherForCity($city->name);
        }

        return view('weather.index', compact('cities', 'weatherData'));
    }

    private function getWeatherForCity($cityName)
    {
        $apiKey = env('WEATHER_API_KEY');
        $client = new Client();
        $apiUrl = "http://api.openweathermap.org/data/2.5/weather?q=${cityName}&units=metric&appid={$apiKey}";

        try {
            $response = $client->get($apiUrl);
            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            // Return null or an error message if something goes wrong
            return null; // or ['error' => $e->getMessage()];
        }
    }
    
    public function store(Request $request)
    {
        City::create($request->all());
        return redirect()->route('weather.index')->with('success', 'City stored successfully.');
    }
    
    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $city->delete();
        return redirect()->route('weather.index')->with('success', 'City stored successfully.');
    }

    public function update(Request $request, $id)
    {
        // Update - Save the edited item to the database
    }

    public function edit($id)
    {
        // Update - Show the form to edit an item
    }

    public function show($id)
    {
        // Read - Display a single item
    }

    public function create()
    {
        // Create - Show the form to create a new item
    }
}