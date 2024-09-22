<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LawyerConnect</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        .relative:hover .hidden {
            display: block;
        }
    </style>
</head>

<body>
    <nav class="bg-white">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between py-4">
                <!-- Logo -->
                <div class="text-2xl font-bold">
                    <a href="/" class="">LawyerConnect</a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex md:items-center space-x-8">
                    <a href="/" class="hover:text-gray-400 font-bold">Home</a>
                    <a href="#lawyers" class="hover:text-gray-400 font-semibold">Lawyers</a>
                    <a href="#contact" class="hover:text-gray-400 font-semibold">Contact Us</a>
                    @if (auth()->check() || auth()->guard('client')->check())
                        <div class="relative inline-block text-left">
                            <div class="text-center">
                                @php
                                    $user = auth()->user();
                                    $client = auth()->guard('client')->user();
                                @endphp

                                @if ($user && $user->image)
                                    <x-bladewind::dropmenu
                                        trigger="<img class='w-10 rounded-full' src='{{ asset('storage/' . $user->image) }}'/>"
                                        trigger_css="">
                                        <x-bladewind::dropmenu-item>
                                            <a href="/lawyer/profile/{{ $user->id }}" class="px-4">Profile</a>
                                        </x-bladewind::dropmenu-item>
                                        <x-bladewind::dropmenu-item>
                                            <form method="post" class="m-0" action="{{ route('lawyer.logout') }}">
                                                @csrf
                                                <button class="px-4 my-0">Logout</button>
                                            </form>
                                        </x-bladewind::dropmenu-item>
                                    </x-bladewind::dropmenu>
                                @elseif ($client && $client->image)
                                    <x-bladewind::dropmenu
                                        trigger="<img class='w-10 rounded-full' src='{{ asset('storage/' . $client->image) }}'/>"
                                        trigger_css="">
                                        <x-bladewind::dropmenu-item>
                                            <a href="/client/profile/{{ $client->id }}" class="px-4">Profile</a>
                                        </x-bladewind::dropmenu-item>
                                        <x-bladewind::dropmenu-item>
                                            <form method="post" class="m-0" action="{{ route('client.logout') }}">
                                                @csrf
                                                <button class="px-4 my-0">Logout</button>
                                            </form>
                                        </x-bladewind::dropmenu-item>
                                    </x-bladewind::dropmenu>
                                @else
                                    <x-bladewind::dropmenu trigger="<i class='fas fa-user'></i>" trigger_css="">
                                        <x-bladewind::dropmenu-item>
                                            <a href="/client/profile/{{ $client->id ?? $user->id }}"
                                                class="px-4">Profile</a>
                                        </x-bladewind::dropmenu-item>
                                        <x-bladewind::dropmenu-item>
                                            <form method="post" class="m-0"
                                                action="{{ $client ? route('client.logout') : route('lawyer.logout') }}">
                                                @csrf
                                                <button class="px-4 my-0">Logout</button>
                                            </form>
                                        </x-bladewind::dropmenu-item>
                                    </x-bladewind::dropmenu>
                                @endif
                            </div>
                        </div>
                    @else
                        <a href="/client/login" class="hover:text-gray-400 font-semibold">Login</a>
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

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="md:hidden absolute top-16 left-0 bg-white w-full hidden">
                <div class="px-4 py-2">
                    <a href="/" class="block py-2 px-4 hover:bg-gray-100 font-semibold">Home</a>
                    <a href="#contact" class="block py-2 px-4 hover:bg-gray-100 font-semibold ">Contact Us</a>
                    @if (auth()->check() || auth()->guard('client')->check())
                        @php
                            $user = auth()->user();
                            $client = auth()->guard('client')->user();
                        @endphp

                        @if ($user)
                            <a href="/lawyer/profile/{{ $user->id }}"
                                class="block px-4 py-2 hover:bg-gray-100 font-semibold">Profile</a>
                            <form method="post" class="py-2 hover:bg-gray-100 font-semibold" action="{{ route('lawyer.logout') }}">
                                @csrf
                                <button class="px-4 py-2">Logout</button>
                            </form>
                        @elseif ($client)
                            <a href="/client/profile/{{ $client->id }}"
                                class="block px-4 my-2 hover:bg-gray-100 font-semibold">Profile</a>
                            <form method="post" class="" action="{{ route('client.logout') }}">
                                @csrf
                                <button class="px-4 py-2 hover:bg-gray-100 font-semibold">Logout</button>
                            </form>
                        @else
                            <a href="/client/login" class="hover:text-gray-400 font-semibold">Login</a>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </nav>
</body>

<script>
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>

</html>
