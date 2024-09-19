{{-- Font Awesome Icons --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/solid.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/svg-with-js.min.css" rel="stylesheet" />

@extends('layouts.pages')
@section('title', 'profile - ' . auth()->guard('client')->user()->name)

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

                <h2 class="text-xl font-bold text-center my-2">{{ $client->name }}</h2>
                <p class="text-secondary"></p>

                @if (auth()->guard('client')->user())
                    <div class="grid grid-cols-12">
                        <div class="col-span-3">
                            <img src="{{ asset('storage/' . auth()->guard('client')->user()->image) }}" alt="">
                        </div>
                        <div class="col-span-9 bg-white py-4 px-10">
                            <div class="flex justify-end">
                                <a href="client/edit" . {{auth()->guard('client')->user()->id}}>
                                    <i class="far fa-edit cursor-pointer text-2xl"></i>
                                </a>
                            </div>
                            <p>Full Name</p>
                            <h3 class="text-xl font-semibold mb-3">{{ auth()->guard('client')->user()->name }}</h3>
                            <p>Email</p>
                            <h3 class="text-xl font-semibold mb-3">{{ auth()->guard('client')->user()->email }}</h3>
                            <p>Phone</p>
                            <h3 class="text-xl font-semibold mb-3">{{ auth()->guard('client')->user()->phone ?? 'Null' }}
                            </h3>
                            <p>Gender</p>
                            <h3 class="text-xl font-semibold mb-3">
                                {{ auth()->guard('client')->user()->gender ?? 'Not Added' }}</h3>
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
