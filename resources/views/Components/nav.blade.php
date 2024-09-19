<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        .relative:hover .hidden {
            display: block;
        }
    </style>
</head>

<body>
    <nav class="bg-white ">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between py-4">
                <!-- Logo -->
                <div class="text-2xl font-bold">
                    <a href="/" class="">LawyerConnect</a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex md:items-center space-x-8">
                    {{-- <a href="#how-it-works" class="hover:text-gray-400">How It Works</a> --}}
                    <a href="/" class="hover:text-gray-400 font-bold">Home</a>
                    <a href="#lawyers" class="hover:text-gray-400 font-semibold">Lawyers</a>
                    <a href="#contact" class="hover:text-gray-400 font-semibold">Contact Us</a>
                    @if (auth()->guard('client')->user() || auth()->user())
                        {{-- <a href="/client/profile/{{auth()->guard('client')->user()->id}}" class="hover:text-gray-400">
                            <img src="{{asset('storage/' . auth()->guard('client')->user()->image)}}" width="40" class="rounded-full" />
                        </a> --}}

                        <div class="relative inline-block text-left">
                            @if (auth()->guard('client')->user()->image)
                                <a href="/client/profile/{{ auth()->guard('client')->user()->id }}"
                                    class="hover:text-gray-400">
                                    <img src="{{ asset('storage/' . auth()->guard('client')->user()->image) }}"
                                        width="40" class="rounded-full" />
                                </a>
                            @else
                                <a href="/client/profile/{{ auth()->guard('client')->user()->id }}"
                                    class="hover:text-gray-400">
                                    <i class="fas fa-user"></i>
                                </a>
                            @endif
                            <div class="absolute right-0 z-10 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden group-hover:block">
                                <div class="py-1">
                                    <a href="/client/profile/{{ auth()->guard('client')->user()->id }}"
                                        class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100">Profile</a>
                                    <a href="/client/settings" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100">Settings</a>
                                    <form method="post"
                                        action="{{ auth()->guard('client')->user() ? route('client.logout') : route('lawyer.logout') }}">
                                        @csrf
                                        <button
                                            class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100">Logout</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        <a href="/client/login" class="hover:text-gray-400 font-semibold">Login</a>
                    @endif
                    {{-- @if (auth()->guard('client')->user() || auth()->user())
                    <form method="post" action="{{ auth()->guard('client')->user() ? route('client.logout') :  route('lawyer.logout')}}">
                        @csrf
                        <button class="flex items-center text- gap-2">
                            <i class="fa fa-circle-o-notch" aria-hidden="true"></i>
                            Logout
                        </button>
                        </form>
                    @endif --}}

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
                    <form method="post"
                        action="{{ auth()->guard('client')->user() ? route('client.logout') : route('lawyer.logout') }}">
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
