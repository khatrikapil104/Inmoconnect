<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="title" content="{{ env('APP_NAME','CRM-TEST') }}">

    <!-- favicon -->
    <link rel="icon" href="{{asset('img/favicon.ico')}}" type="image/svg+xml" />

    <title>
        @hasSection('title')
            @yield('title')
        @else
            {{ env('APP_NAME', 'CRM-TEST') }}
        @endif
    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        @stack('styles')
        <!-- Main CSS -->
        @php
        $languages = getLanguages();
        $currentLocale = (session()->has('locale')) ? session()->get('locale') :
        config('app.locale');
        @endphp
        @if(!empty($currentLocale) && $currentLocale == 'es')
        <link  rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
        <link  rel="stylesheet" href="{{ asset('assets/css/app_es.css') }}">
        @elseif(!empty($currentLocale) && $currentLocale == 'fr')
        <link  rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
        <link  rel="stylesheet" href="{{ asset('assets/css/app_fr.css') }}">
        @else
        <link  rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
        @endif

        <link  rel="stylesheet" href="{{ asset('assets/css/sidebar.css') }}">
        <link  rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">
        <link  rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">


    <!-- Icon Css File -->
    <link  rel="stylesheet" href="{{ asset('assets/icon/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <!-- <script src="pace.min.js"></script>
    <link rel="stylesheet" href="pace-theme-default.min.css"> -->
</head>