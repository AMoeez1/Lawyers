@extends('layouts.pages')
@section('title', 'Profile - ' . $user->name)

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

                @if ($user)
                    <div class="">
                        <div class=" bg-white py-4 px-10">
                            <h1 class="text-center text-2xl font-bold">User Profile</h1>
                            <h2 class="text-xl font-bold text-center my-2">
                                {{ $user->name }}</h2>
                            @if ($user->image)
                                <div class="flex justify-center">
                                    <label for="imageUpload" class="cursor-pointer">
                                        <div class="relative my-4 w-40 h-40 rounded-full overflow-hidden">
                                            <img class="object-cover w-full h-full"
                                                src="{{ asset('storage/' . $user->image) }}" width="150" height="150"
                                                alt="Profile Image" />
                                        </div>
                                    </label>
                                </div>
                            @else
                                <div class="mb-4 col-span-3">
                                    <div class="flex justify-center">
                                        <img class="object-cover w-40" src="{{ asset('storage/user.png') }}"
                                            alt="Profile Image" />

                                    </div>
                                </div>
                            @endif
                            <x-bladewind::table divided="false">
                                <x-slot name="header">
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Degree</th>
                                    <th>Proficiency</th>
                                    <th>CNIC</th>
                                    <th>About</th>
                                </x-slot>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->degree }}</td>
                                <td>{{ $user->proficiency }}</td>
                                <td>{{ $user->CNIC }}</td>
                                <td>{{ $user->about }}</td>
                            </x-bladewind::table>
                            <h1 class="text-3xl text-center py-8">Cases Done</h1>
                        </div>
                @endif

            </div>
        </div>
    </div>
@endsection
