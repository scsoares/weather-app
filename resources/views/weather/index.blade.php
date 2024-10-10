<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>weather-app</title>
</head>
<body>
    <h1>Welcome to weather-app</h1>
    <p>Search for a city and add to your weather list</p>

    <form action="{{ route('weather-list') }}" method="POST">
    @csrf
    <input type="text" name="city" required>
    <button type="submit">Submit</button>
</form>

    {{-- button: add city to list --}}
    

    {{-- <ul>
        @foreach ($flowers as $flower)
        <li>{{ $flower->species }} {{ $flower->color }}</li>
        @endforeach
    </ul> --}}
</body>
</html>