<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>weather-app</title>
        <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
        <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
    </head>
    <body>


        <div>
            <h1>Welcome to weather-app</h1>
            <p>Search for a city and add to your weather list</p>

            <form action="{{ route('weather.store') }}" method="POST">
                @csrf
                <x-bladewind::input type="text" name="name" label="Type a city name here" size="tiny" />
                <x-bladewind::button
                    can_submit="true"
                    class="mx-auto block">ADD CITY TO LIST</x-bladewind::button>
        </form>


        <div class="grid grid-cols-2">
            @if($cities->isEmpty())
            @else
            @foreach ($cities as $city)
            <x-bladewind::card compact="true">
                <div class="flex items-center">
                
                    <div class="grow pl-2 pt-1">
                        
                        @if(isset($weatherData[$city->id]))
                        @if(isset($weatherData[$city->id]['main']))
                            <b>{{ $weatherData[$city->id]['name'] }}, {{ $weatherData[$city->id]['sys']['country'] }}</b>
                            <div class="text-sm">Temperature: {{ $weatherData[$city->id]['main']['temp'] }}°C</div>
                            <div class="text-sm">Weather description: {{ $weatherData[$city->id]['weather'][0]['description'] }}</div>
                        @else
                            <p>Error fetching weather data.</p>
                        @endif
                        @else
                        <p>No weather data available.</p>
                        @endif
                        <br>
                        <form action="{{ route('weather.destroy', $city->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="color: red">Delete</button>
                </form>
                    </div>
                    <div>
                        <a href="">
                            <svg>
                                ...
                            </svg>
                        </a>
                    </div>
                </div>
            </x-bladewind::card>
            @endforeach
            @endif

        </div>


        

        </div>

    </body>
</html>