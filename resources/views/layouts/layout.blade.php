<!-- resources/views/layouts/layout.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Weather App')</title>
    <!-- Styles -->
    <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container" style="display:block;">
        <!-- Section for content -->
        @yield('content')
        
        <div style="display:flex; flex-direction: column;justify-content:center; align-items:center; gap: 0.5rem;">
            
        <div style="display:flex; justify-content: center;"><footer style="align-self:flex-end; margin-top:50px;"><p>Made with <span>❤</span> by Sarah Soares</p></footer></div>

        <div><a href="https://github.com/scsoares"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
        <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8"/>
        </svg></div></a>
    </div>
    </div>

    

    {{-- Style markup --}}
    <style scoped>
    @media (max-width: 699px) {
        .responsive {
            display: none;
        }
    }  

    @media (max-width: 699px) {
        .container {
            padding: 1rem;
        }
    } 

    @media (min-width: 700px) {
        .container {
            padding: 3rem;
        }
    } 

    @media (max-width: 699px) {
        #card-container {
            gap: 0.5rem;
        }
    } 

    @media (min-width: 700px) {
        #card-container {
            gap: 1rem;
        }
    } 
    </style>

    <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const cityTimeElements = document.querySelectorAll('.city-time');

        cityTimeElements.forEach(function (element) {
            const timezoneOffset = parseInt(element.getAttribute('data-timezone'));
            const adjustedTime = timezoneOffset - 3600;
            const localTime = getLocalTime(adjustedTime);
            element.textContent = localTime;
        });

        
        function getLocalTime(timezoneOffsetInSeconds) {
            
            const currentTime = new Date();

            const localTime = new Date(currentTime.getTime() + (timezoneOffsetInSeconds * 1000));

            const options = {
                hour: '2-digit',
                minute: '2-digit',
            };
            return localTime.toLocaleTimeString([], options);
        }
    });
    </script>
</body>
</html>
