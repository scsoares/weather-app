# Weather App

## Description

This Weather App allows users to search for cities and retrieve weather information from the OpenWeather API. Users can add cities to a list, which displays the current weather conditions for each city and local time.

<img src="readme-img/app-overview.jpg" alt="Weather app overview" style="box-shadow: 3px 3px 3px gray;">

## Table of Contents

-   [Prerequisites](#prerequisites)
-   [Installation](#installation)
-   [Usage](#usage)
-   [API Key Configuration](#api-key-configuration)
-   [Running the Application](#running-the-application)
-   [Contributing](#contributing)
-   [License](#license)

## Prerequisites

Before you begin, ensure you have met the following requirements:

-   You have `PHP` installed (version 7.3 or higher).
-   You have `Composer` installed for managing dependencies.
-   You have `Node.js` and `npm` installed for asset management.
-   You have a local web server set up (ideally Laragon in Windows).
-   A MySQL database server installed.

## Installation

1. **Clone the repository:**

    ```bash
    git clone https://github.com/scsoares/weather-app.git
    cd weather-app
    ```

2. Install PHP dependencies using Composer:

    ```bash
    composer install
    ```

3. Install Node.js dependencies:

    ```bash
    npm install
    ```

4. Build your assets:

    ```bash
    npm run dev
    ```

5. Set up your environment file:

    Copy the .env.example file to a new file named .env.

    ```bash
    npm run dev
    ```

6. Generate your application key:

    ```bash
    php artisan key:generate
    ```

7. Set up your database:

-   Create a new database in your MySQL server (e.g., weather_app).
-   Update the .env file with your database credentials.

8. Run the migrations:

## API Key Configuration

To use the OpenWeather API, you'll need an API key:

-   Sign up at OpenWeather.

-   Obtain your API key from your account.

-   Add your API key to the .env file.

## Running the Application

To run the application, make sure you have completed the setup above. Then, start the server with:

```bash
php artisan serve
```

## Built With

`PHP` `laravel` `blade` `mysql` `bladewindUI`

## Authors

-   **Sarah Soares** - _Initial work_ - [scsoares](https://github.com/scsoares)
