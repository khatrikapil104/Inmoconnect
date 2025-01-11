<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>

    <!-- favicon -->
    <link rel="icon" href="{{asset('img/favicon.ico')}}" type="image/svg+xml" />

    <!-- custom-css -->
    <link rel="stylesheet" href="{{ asset('assets/css/error.css') }}">
</head>

<body>
    <div class="main-page">
        <div class="error-one">
            <img src="{{ asset('img/error-4.png') }}" alt="image">
        </div>
        <div class="error-two">
            <img src="{{ asset('img/error-3.png') }}" alt="image">
        </div>
        <div class="error-three">
            <img src="{{ asset('img/error-5.svg') }}" alt="image">
        </div>
        <div class="error-main-page">
            <div class="error-four">
                <img src="{{ asset('img/error-1.png') }}" alt="image">
            </div>
            <div class="error_text" style="animation-delay:1s;">
                <h2>Ooops...</h2>
                <h4>Page not found</h4>
                <p>The page you are looking for doesn’t exist or an other error<br>
                    occured,go back to homepage</p>
                <a href="#" class="error_button">Go to Dashboard</a>
            </div>
            <div class="error-five">
                <img src="{{ asset('img/error-2.png') }}" alt="image">
            </div>
        </div>
    </div>

</body>

</html>