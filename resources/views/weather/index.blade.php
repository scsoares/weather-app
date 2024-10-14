<!-- resources/views/weather/index.blade.php -->
@extends('layouts.layout')

@section('title', 'Weather App')

@section('content')
<div class="p-48"><h1 style="font-weight:700">WELCOME TO WEATHER-APP</h1>
<p style="margin-bottom: 1rem;">Search for a city and add to your weather list</p>

<form action="{{ route('weather.store') }}" method="POST">
    @csrf
    <x-bladewind::input type="text" name="name" label="Type a city name here" size="tiny" style="max-width: 50rem" />
    <x-bladewind::button
        can_submit="true"
        class="mx-auto block" style="display: inline;">ADD CITY TO LIST</x-bladewind::button>
</form>

{{-- Error message handling --}}
    @if(session('error'))
        <div class="mt-2 mb-2 text-red-600" style="color:red">
            {{ session('error') }}
        </div>
    @endif

<div id="card-container" class="grid grid-cols-2" style="">
    @if($cities->isEmpty())
    <p style="color: gray; margin-bottom: 20vh;">No cities added. Try adding one!</p>
    @else
    @foreach ($cities as $city)
    <x-bladewind::card compact="true">
        <div class="flex items-center">
            <div class="grow pl-2 pt-1 gap: 4rem;">
                @if(isset($weatherData[$city->id]))
                @if(isset($weatherData[$city->id]['main']))
                    <b>{{ $weatherData[$city->id]['name'] }}, {{ $weatherData[$city->id]['sys']['country'] }}</b>
                    <div class="text-sm">Temperature: {{ $weatherData[$city->id]['main']['temp'] }}°C</div>
                    <div style="" class="text-sm">{{ $weatherData[$city->id]['weather'][0]['description'] }}</div>

                    {{-- display different emojis based on weather description --}}
                    <br>
                    <div class="text-5xl">
                        @php
                            $description = strtolower($weatherData[$city->id]['weather'][0]['description']);
                        @endphp

                        @switch($description)
                            @case('clear sky')
                                ☀️
                                @break
                            @case('few clouds')
                                ⛅
                                @break
                            @case('scattered clouds')
                            @case('broken clouds')
                                🌥️
                                @break
                            @case('overcast clouds')
                                ☁️
                                @break
                            @case('rain')
                            @case('light rain')
                            @case('shower rain')
                                🌧️
                                @break
                            @case('thunderstorm')
                                ⛈️
                                @break
                            @case('snow')
                                ❄️
                                @break
                            @case('mist')
                                🌫️
                                @break
                            @default
                                
                        @endswitch
                    </div>
                @else
                    <p>Error fetching weather data.</p>
                @endif
                @else
                <p>No weather data unavailable.</p>
                @endif
                    <br>
                <form action="{{ route('weather.destroy', $city->id) }}" method="POST" style="display: inline; padding-left: 5 rem">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="color: red">Delete</button>
                </form>
            </div>
             {{-- Display city time --}}
            <div class="responsive text-xl" style="margin-top: 150px;"><span class="city-time" data-timezone="{{ $weatherData[$city->id]['timezone'] }}"></span></div>
        </div>
    </x-bladewind::card>
    @endforeach
    @endif
</div></div>

{{-- Notification logic --}}
    @if(session('success'))
        
    @endif

    @if(session('error'))
        <script>
            showNotification(
                'Error',
                '{{ session('error') }}',
                'error'
            );
        </script>
    @endif
@endsection
