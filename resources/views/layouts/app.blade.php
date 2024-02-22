<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    
    @vite('resources/css/app.css')
    <title>Laravel-Practice</title>
</head>
<body class="mb-48">
    @include('layouts.nav')
    @include('layouts.hero')
    <main>
        @yield('content')
    </main>
    @include('layouts.footer')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>