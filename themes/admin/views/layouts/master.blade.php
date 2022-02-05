<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js', 'themes/admin') }}" defer></script>
    <script src="{{ mix('js/custom.js', 'themes/admin') }}" defer></script>
    

    <!-- Styles -->
    <link href="{{ mix('css/app.css', 'themes/admin') }}" rel="stylesheet">
    <link href="{{ mix('css/custom.css', 'themes/admin') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
      <script defer src="https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js"></script>
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet"> <!--Totally optional :) -->

    <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>

</head>
<body class="bg-gray-800 font-sans leading-normal tracking-normal mt-12">
    @include('layouts.header')
    <main> 
        <div class="flex flex-col md:flex-row">
            @include('layouts.sidebar')
            @yield('content')
        </div>
    </main>
    
</body>
</html>
