<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.2.7/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    {{-- <div class="grid grid-cols-12">
        <div class="col-span-3 h-screen bg-gray-100 hidden lg:block">
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

    </div> --}}
    <nav class="bg-gray-900 text-white">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between py-4">
                <!-- Logo -->
                <div class="text-2xl font-bold">
                    <a href="#" class="text-white hover:text-gray-300">LawyerConnect</a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-8">
                    {{-- <a href="#how-it-works" class="hover:text-gray-400">How It Works</a> --}}
                    <a href="/" class="hover:text-gray-400">Home</a>
                    <a href="#featured-lawyers" class="hover:text-gray-400">Lawyers</a>
                    <a href="/register/client" class="hover:text-gray-400">Regsiter</a>
                    <a href="#contact" class="hover:text-gray-400">Contact Us</a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="md:hidden flex items-center" >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden absolute top-16 left-0 w-full bg-gray-900 text-white hidden">
            <div class="px-4 py-2">
                {{-- <a href="#how-it-works" class="block py-2 px-4 hover:bg-gray-700">How It Works</a> --}}
                <a href="#practice-areas" class="block py-2 px-4 hover:bg-gray-700">Home</a>
                <a href="#featured-lawyers" class="block py-2 px-4 hover:bg-gray-700">Lawyers</a>
                <a href="#testimonials" class="block py-2 px-4 hover:bg-gray-700">Testimonials</a>
                <a href="#contact" class="block py-2 px-4 hover:bg-gray-700">Contact Us</a>
            </div>
        </div>
    </nav>
   </body>

   <script>
    
   </script>
</html>
