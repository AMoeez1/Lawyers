<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>
</head>
<body>
    <div class="bg-gray-100 min-h-screen h-screen overflow-x-hidden scroll-smooth">
        <div class="header w-screen">
            @include('components.nav')
        </div>
        <div class="main">
            @yield('content')
        </div>
        <div class="footer w-screen">
            @include('components.footer')
        </div>
</div>
<script src='https://cdn.tailwindcss.com'></script>
</body>
</html>