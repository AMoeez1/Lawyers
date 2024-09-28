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
                <p class="text-secondary"></p>

                @if (auth()->guard('client')->user() || auth()->user())
                    <div class="">
                        <div class=" bg-white py-4 px-10">
                            <h1 class="text-center text-2xl font-bold">User Profile</h1>
                            <div class="flex justify-center gap-2">

                                <h2 class="text-xl font-bold text-center my-2">
                                    {{ auth()->user() ? auth()->user()->name : auth()->guard('client')->user()->name }}</h2>
                                @if (auth()->user()->email_verified_at == null)
                                    <button class="" onclick="showModal('noblur')">
                                        <div class="bg-red-500 py-1 px-3 rounded-lg shadow-lg">
                                            <i class="fas fa-exclamation text-white" style="font-size: 14px;"></i>

                                        </div>
                                    </button>
                                    <x-bladewind::modal title="Email Verification" cancel_button_label="Verify Later"
                                        ok_button_label="" blur_size="none" name="noblur">
                                        <hr>
                                        <form action="{{ route('lawyer.send_email') }}" method="POST" class="">
                                            @csrf
                                            <p class="my-4">You have not verified your email yet. <br>We will send
                                                verification link in your authenticated email. <br> it can take upto 10
                                                minutes. Be patient! </p>
                                            <div class="flex justify-end mt-2">
                                                <x-bladewind::button can_submit='true'>
                                                    Send Verification Code
                                                </x-bladewind::button>
                                            </div>
                                        </form>
                                    </x-bladewind::modal>
                                    @else 
                                    <div class="flex items-center cursor-pointer">
                                        <i class="fas fa-check-circle text-blue-500 text-xl"></i>
                                    </div>
                                @endif
                            </div>
                            @if (session('response'))
                                <div class="block m-auto" style="width: 50%">
                                        <x-bladewind::alert type="success">
                                            {{ session('response') }}
                                        </x-bladewind::alert>
                                </div>
                            @endif
                            <div class="flex">
                                @if (
                                    (auth()->guard('client')->check() && auth()->guard('client')->user()->image) ||
                                        (auth()->check() && auth()->user()->image))
                                    <div class="mb-4 ml-auto">
                                        <label for="imageUpload" class="cursor-pointer">
                                            <div class="relative my-4 w-40 h-40 rounded-full overflow-hidden">
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
                                {{-- <p>Full Name</p>
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
                                <h3 class="font-semibold mb-3">{{ auth()->user()->about }}</h3> --}}

                                <x-bladewind::table divided="false">
                                    <x-slot name="header">
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Degree</th>
                                        <th>Proficiency</th>
                                        <th>CNIC</th>
                                        <th>About</th>
                                    </x-slot>
                                    <td>{{ auth()->user()->name }}</td>
                                    <td>{{ auth()->user()->email }}</td>
                                    <td>{{ auth()->user()->degree }}</td>
                                    <td>{{ auth()->user()->proficiency }}</td>
                                    <td>{{ auth()->user()->CNIC }}</td>
                                    <td>{{ auth()->user()->about }}</td>
                                </x-bladewind::table>
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
                            <h1 class="text-3xl text-center py-8">Cases Done</h1>
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
