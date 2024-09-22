@extends('layouts.pages')
@section('title', 'Profile - ' . (auth()->user() ? auth()->user()->name : (auth()->guard('client')->user() ?
    auth()->guard('client')->user()->name : 'Guest')))

@section('content')
    <div class="bg-s text-primary-foreground">
        <header class="bg-primary py-4">
            <div class="container mx-auto flex items-center justify-between">
                {{-- <button class="bg-secondary text-secondary-foreground px-4 py-2 rounded-lg">Edit Profile</button> --}}
            </div>
        </header>
        <div class="container mx-auto mt-8 h-full">
            <div class="p-6 rounded-lg drop-shadow-xl">
                <h1 class="text-center text-2xl font-bold">User Profile</h1>

                  <h2 class="text-xl font-bold text-center my-2">
                      {{ auth()->user() ? auth()->user()->name : auth()->guard('client')->user()->name }}</h2>
                <p class="text-secondary"></p>

                @if (auth()->guard('client')->user() || auth()->user())
                    <div class="">
                        <div class="col-span-3">
                            <div class="flex h-full justify-center items-center">
                                {{-- @if ((auth()->guard('client')->check() && auth()->guard('client')->user()->image) || (auth()->check() && auth()->user()->image))
                                    <div class="mb-4 col-span-3">
                                        <label for="imageUpload" class="cursor-pointer">
                                            <div
                                                class="relative w-60 h-60 rounded-full overflow-hidden bg-gray-900 hover:bg-opacity-50">
                                                <img class="object-cover w-full h-full"
                                                    src="{{ auth()->user() ? asset('storage/' . auth()->user()->image) : asset('storage/' . auth()->guard('client')->user()->image) }}"
                                                    width="150" height="150" alt="Profile Image" />
                                            </div>
                                        </label>
                                    </div>
                                @else
                                    <div class="mb-4 col-span-3">
                                        <img class="object-cover w-40" src="{{ asset('storage/user.png') }}"
                                            alt="Profile Image" />
                                    </div>
                                @endif --}}
                            </div>
                        </div>
                        <div class=" bg-white py-4 px-10">
                            <div class="flex">
                                @if (
                                    (auth()->guard('client')->check() && auth()->guard('client')->user()->image) ||
                                        (auth()->check() && auth()->user()->image))
                                    <div class="mb-4 ml-auto">
                                        <label for="imageUpload" class="cursor-pointer">
                                            <div
                                                class="relative my-4 w-40 h-40 rounded-full overflow-hidden">
                                                <img class="object-cover w-full h-full"
                                                    src="{{ auth()->user() ? asset('storage/' . auth()->user()->image) : asset('storage/' . auth()->guard('client')->user()->image) }}"
                                                    width="150" height="150" alt="Profile Image" />
                                            </div>
                                            {{-- <x-bladewind::avatar image="{{ auth()->user() ? asset('storage/' . auth()->user()->image) : asset('storage/' . auth()->guard('client')->user()->image) }}" size="omg" /> --}}
                                        </label>
                                    </div>
                                @else
                                    <div class="mb-4 col-span-3">
                                        <img class="object-cover w-40" src="{{ asset('storage/user.png') }}"
                                            alt="Profile Image" />
                                    </div>
                                @endif
                                <div class="flex ml-auto">
                                    <a
                                        href="{{ auth()->user() ? url('lawyer/profile/edit/' . auth()->user()->id) : url('client/profile/edit/' . auth()->guard('client')->user()->id) }}">
                                        <i class="far fa-edit cursor-pointer text-2xl"></i>
                                    </a>
                                </div>
                            </div>
                            @if (auth()->user())
                                <p>Full Name</p>
                                <h3 class="text-xl font-semibold mb-3">{{ auth()->user()->name }}</h3>
                                <p>Email</p>
                                <h3 class="text-xl font-semibold mb-3">{{ auth()->user()->email }}</h3>
                                <p>Degree</p>
                                <h3 class="text-xl font-semibold mb-3">{{ auth()->user()->degree }}</h3>
                                <p>Proficiency</p>
                                <h3 class="text-xl font-semibold mb-3">{{ auth()->user()->proficiency }}</h3>
                                <p>CNIC</p>
                                <h3 class="text-xl font-semibold mb-3">{{ auth()->user()->CNIC }}</h3>
                                <p>About</p>
                                <h3 class="font-semibold mb-3">{{ auth()->user()->about }}</h3>
                            @else
                                <p>Full Name</p>
                                <h3 class="text-xl font-semibold mb-3">{{ auth()->guard('client')->user()->name }}</h3>
                                <p>Email</p>
                                <h3 class="text-xl font-semibold mb-3">{{ auth()->guard('client')->user()->email }}</h3>
                                <p>Phone</p>
                                <h3 class="text-xl font-semibold mb-3">
                                    {{ auth()->guard('client')->user()->phone ?? 'Null' }}
                                </h3>
                                <p>Gender</p>
                                <h3 class="text-xl font-semibold mb-3">
                                    {{ auth()->guard('client')->user()->gender ?? 'Not Added' }}</h3>
                            @endif
                        </div>
                    </div>
                @endif

                {{-- @if (auth()->user())
                <div class="mt-4">
                    <h3 class="text-lg font-semibold">About Me</h3>
                    <p class="mt-2">{{ $lawyer->about }}</p>
                </div>
            @endif
            <div class="mt-4">
                <h3 class="text-lg font-semibold">Contact Information</h3>
                <ul class="mt-2">
                    <li>Email: {{ $client ? $client->email : $lawyer->email }}</li>
                    <li> {{ $lawyer ? 'Proficiency: ' . $lawyer->proficiency : '' }}</li>
                    <li></li>
                </ul> 
            </div> --}}
            </div>
        </div>
    </div>
@endsection
