<!-- //макет ларавел, макет это базовая структура страницы -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hexley Blog - @yield('title')</title>
    <meta name="csrf-param" content="_token" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ assert('css/app.css') }}" rel="stylesheet">
    <script src="{{ assert('js/app.js') }}"></script>
</head>
<div>
<a href="{{ route('/') }}"></a>
<a href="{{ route('articles.index') }}"></a>
<a href="{{ route('about') }}"></a>
</div>
<body>
    <div class="conatainer mt-4">
        <h1>@yield('header')</h1>
            <div>
            @yield('content')
        </div>
    </div>
</body>
</html>
