<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="flex">
        <div class="w-[19rem] h-screen bg-gray-100 hidden lg:block">
            <ul class="flex flex-col">
                <li class="nav-item">
                    <a to='/home' class="nav-link flex justify-center">
                        <img src="{{ asset('lawyers_title.png') }}" width="80px" />
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link flex items-center py-2 mx-4 px-4 hover:bg-gray-200">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link flex items-center py-3 mx-4 px-4 hover:bg-gray-200">Lawyers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link flex items-center py-3 mx-4 px-4 hover:bg-gray-200">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link flex items-center py-3 mx-4 px-4 hover:bg-gray-200">Articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link flex items-center py-3 mx-4 px-4 hover:bg-gray-200">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link flex items-center py-3 mx-4 px-4 hover:bg-gray-200">Contact</a>
                </li>
            </ul>
            <ul class="mt-14">
                <li class="nav-item">
                    <a class="nav-link flex items-center py-3 mx-4 px-4 hover:bg-gray-200">Register As Client</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link flex items-center py-3 mx-4 px-4 hover:bg-gray-200">Register As a Lawyer / Barristor</a>
                </li>
            </ul>
        </div>

    </div>
</body>

</html>
