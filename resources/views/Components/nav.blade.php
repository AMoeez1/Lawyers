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
                                    <x-bladewind::dropmenu>
                                        <x-slot:trigger>
                                            <div class="flex space-x-2 items-center rounded-md">
                                                <div class="grow">
                                                    <x-bladewind::avatar
                                                        image="{{ asset('storage/' . $user->image) }}" />
                                                </div>
                                                <div>
                                                    <x-bladewind::icon name="chevron-down" class="!h-4 !w-4" />
                                                </div>
                                            </div>
                                        </x-slot:trigger>

                                        <x-bladewind::dropmenu-item header="true">
                                            <div class="grow">
                                                <div><strong>{{ $user->name }}</strong></div>
                                                <div class="text-sm">{{ $user->email }}</div>
                                                <div class="text-sm font-semibold">Speciality : {{ $user->proficiency }}
                                                </div>
                                            </div>
                                        </x-bladewind::dropmenu-item>

                                        <a href="{{ url('/lawyer/profile', $user->id) }}">
                                            <x-bladewind::dropmenu-item icon="user" icon_css="">
                                                Profile
                                            </x-bladewind::dropmenu-item>
                                        </a>
                                        <a href="{{ url('/lawyer/profile/edit', $user->id) }}">
                                            <x-bladewind::dropmenu-item icon="pencil-square">
                                                Edit Profile
                                            </x-bladewind::dropmenu-item>
                                        </a>

                                        <x-bladewind::dropmenu-item divider />

                                        <x-bladewind::dropmenu-item icon="computer-desktop">
                                            Your Repositories
                                        </x-bladewind::dropmenu-item>
                                        <x-bladewind::dropmenu-item icon="briefcase">
                                            Your Projects
                                        </x-bladewind::dropmenu-item>
                                        <x-bladewind::dropmenu-item icon="building-office">
                                            Your Organizations
                                        </x-bladewind::dropmenu-item>
                                        <x-bladewind::dropmenu-item icon="star">
                                            Your Stars
                                        </x-bladewind::dropmenu-item>

                                        <x-bladewind::dropmenu-item divider />

                                        <form action="{{ route('lawyer.logout') }}" method="POST">
                                            @csrf
                                            <x-bladewind::dropmenu-item hover="false">
                                                <x-bladewind::button can_submit='true' color="gray" radius="small"
                                                    size="small" class="w-full">
                                                    Sign Out
                                                </x-bladewind::button>
                                            </x-bladewind::dropmenu-item>
                                        </form>
                                    </x-bladewind::dropmenu>
                                @elseif ($client && $client->image)
                                    <x-bladewind::dropmenu>
                                        <x-slot:trigger>
                                            <div class="flex space-x-2 items-center rounded-md">
                                                <div class="grow">
                                                    <x-bladewind::avatar
                                                        image="{{ asset('storage/' . $client->image) }}" />
                                                </div>
                                                <div>
                                                    <x-bladewind::icon name="chevron-down" class="!h-4 !w-4" />
                                                </div>
                                            </div>
                                        </x-slot:trigger>

                                        <x-bladewind::dropmenu-item header="true">
                                            <div class="grow">
                                                <div><strong>{{ $client->name }}</strong></div>
                                                <div class="text-sm">{{ $client->email }}</div>
                                            </div>
                                        </x-bladewind::dropmenu-item>

                                        <a href="{{ url('/client/profile', $client->id) }}">
                                            <x-bladewind::dropmenu-item icon="user" icon_css="">
                                                Profile
                                            </x-bladewind::dropmenu-item>
                                        </a>
                                        <a href="{{ url('/client/profile/edit', $client->id) }}">
                                            <x-bladewind::dropmenu-item icon="pencil-square">
                                                Edit Profile
                                            </x-bladewind::dropmenu-item>
                                        </a>

                                        <x-bladewind::dropmenu-item divider />

                                        <form action="{{ route('client.logout') }}" method="POST">
                                            @csrf
                                            <x-bladewind::dropmenu-item hover="false">
                                                <x-bladewind::button can_submit='true' color="gray" radius="small"
                                                    size="small" class="w-full">
                                                    Sign Out
                                                </x-bladewind::button>
                                            </x-bladewind::dropmenu-item>
                                        </form>
                                    </x-bladewind::dropmenu>
                                @else
                                    <x-bladewind::dropmenu>
                                        <x-slot:trigger>
                                            <div class="flex space-x-2 items-center rounded-md">
                                                <div class="grow">
                                                    <x-bladewind::avatar image="{{ asset('storage/user.png') }}" />
                                                </div>
                                                <div>
                                                    <x-bladewind::icon name="chevron-down" class="!h-4 !w-4" />
                                                </div>
                                            </div>
                                        </x-slot:trigger>

                                        <x-bladewind::dropmenu-item header="true">
                                            <div class="grow">
                                                <div><strong>{{ $user ? $user->name : $client->name }}</strong></div>
                                                <div class="text-sm">{{ $user ? $user->email : $client->email }}</div>
                                            </div>
                                        </x-bladewind::dropmenu-item>

                                        <a
                                            href="{{ $user ? url('/lawyer/profile', $user->id) : url('/client/profile', $client->id) }}">
                                            <x-bladewind::dropmenu-item icon="user" icon_css="">
                                                Profile
                                            </x-bladewind::dropmenu-item>
                                        </a>
                                        <a
                                            href="{{ $user ? url('/lawyer/profile/edit', $user->id) : url('/client/profile/edit', $client->id) }}">
                                            <x-bladewind::dropmenu-item icon="pencil-square">
                                                Edit Profile
                                            </x-bladewind::dropmenu-item>
                                        </a>

                                        @if ($user && !$user->img)
                                            <x-bladewind::dropmenu-item divider />

                                            <x-bladewind::dropmenu-item icon="computer-desktop">
                                                Your Repositories
                                            </x-bladewind::dropmenu-item>
                                            <x-bladewind::dropmenu-item icon="briefcase">
                                                Your Projects
                                            </x-bladewind::dropmenu-item>
                                            <x-bladewind::dropmenu-item icon="building-office">
                                                Your Organizations
                                            </x-bladewind::dropmenu-item>
                                            <x-bladewind::dropmenu-item icon="star">
                                                Your Stars
                                            </x-bladewind::dropmenu-item>
                                        @endif
                                        <x-bladewind::dropmenu-item divider />

                                        <form action="{{ $client ? route('client.logout') : route('lawyer.logout') }}"
                                            method="POST">
                                            @csrf
                                            <x-bladewind::dropmenu-item hover="false">
                                                <x-bladewind::button can_submit='true' color="gray" radius="small"
                                                    size="small" class="w-full">
                                                    Sign Out
                                                </x-bladewind::button>
                                            </x-bladewind::dropmenu-item>
                                        </form>
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
                            <form method="post" class="py-2 hover:bg-gray-100 font-semibold"
                                action="{{ route('lawyer.logout') }}">
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
