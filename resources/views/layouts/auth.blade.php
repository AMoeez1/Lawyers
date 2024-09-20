<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
    <title>
        @yield('title')
    </title>
    </head>

    <body>
        <div class="bg-gray-100 min-h-screen flex flex-col items-center justify-center">
            <div class="flex justify-center">
                <img src="{{ asset('lawyers_title.png') }}" width="100px" />
            </div>
        @yield('content')
    </div>
    <script src='https://cdn.tailwindcss.com'></script>
</body>

</html>
