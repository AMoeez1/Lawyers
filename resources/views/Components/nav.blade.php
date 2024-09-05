<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.2.7/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <nav class="bg-gray-900 text-white">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between py-4">
                <!-- Logo -->
                <div class="text-2xl font-bold">
                    <a href="/" class="text-white hover:text-gray-300">LawyerConnect</a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-8">
                    {{-- <a href="#how-it-works" class="hover:text-gray-400">How It Works</a> --}}
                    <a href="/" class="hover:text-gray-400">Home</a>
                    <a href="#featured-lawyers" class="hover:text-gray-400">Lawyers</a>
                    @if (auth()->guard('client')->user() || auth()->user())
                        <a href="/profile" class="hover:text-gray-400">Profile</a>
                    @else
                        <a href="/client/login" class="hover:text-gray-400">Login</a>
                    @endif
                    <a href="#contact" class="hover:text-gray-400">Contact Us</a>
                    @if (auth()->guard('client')->user() || auth()->user())
                        <form method="post" action="{{ auth()->guard('client')->user() ? route('client.logout') :  route('lawyer.logout')}}">
                            @csrf
                            <button class="flex items-center text- gap-2">
                                <i class="fa fa-circle-o-notch" aria-hidden="true"></i>
                                Logout
                            </button>
                        </form>
                    @endif
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="md:hidden flex items-center">
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
                <a href="/" class="block py-2 px-4 hover:bg-gray-700">Home</a>
                @if (auth()->guard('client')->user() || auth()->user())
                    <a href="/profile" class="hover:text-gray-400">Profile</a>
                @else
                    <a href="/client/login" class="hover:text-gray-400">Login</a>
                @endif
                <a href="#contact" class="hover:text-gray-400">Contact Us</a>
                @if (auth()->guard('client')->user() || auth()->user())
                    <form method="post" action="{{ auth()->guard('client')->user() ? route('client.logout') : route('lawyer.logout') }}">
                        @csrf
                        <button class="flex items-center text- gap-2">
                            <i class="fa fa-circle-o-notch" aria-hidden="true"></i>
                            Logout
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </nav>
</body>

<script></script>

</html>
