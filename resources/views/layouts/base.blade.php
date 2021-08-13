<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d6903fe8c7.js" crossorigin="anonymous"></script>
    <title>@yield('title') - Tech Store</title>
</head>
<body>
<div class="flex flex-col h-screen justify-between bg-gray-200">
    @include('partials.navbar')
    <div class="container-xl mx-auto">
        @yield('content')
    </div>
    @include('partials.footer')
</div>
</body>
</html>
