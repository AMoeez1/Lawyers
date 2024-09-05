@extends('layouts.pages')
@section('title', 'profile');

@section('content')
<div class="bg-s text-primary-foreground min-h-screen">
  <header class="bg-primary py-4">
    <div class="container mx-auto flex items-center justify-between">
      {{-- <button class="bg-secondary text-secondary-foreground px-4 py-2 rounded-lg">Edit Profile</button> --}}
    </div>
  </header>
  <div class="container mx-auto mt-8">
    <div class="bg-gray-800 text-white p-6 rounded-lg shadow-lg">
      <h1 class="text-center text-2xl font-bold">User Profile</h1>
      <div class="flex items-center">
        <img src="https://placehold.co/150x150" alt="User Avatar" class="w-20 h-20 rounded-full" />
        <div class="ml-4">
          <h2 class="text-xl font-bold">{{$client ? $client->name : $lawyer->name}}</h2>
          <p class="text-secondary"></p>
        </div>
      </div>
      @if(auth()->user())
      <div class="mt-4">
        <h3 class="text-lg font-semibold">About Me</h3>
        <p class="mt-2">{{$lawyer->about}}</p>
      </div>
      @endif
      <div class="mt-4">
        <h3 class="text-lg font-semibold">Contact Information</h3>
        <ul class="mt-2">
          <li>Email: {{$client ? $client->email : $lawyer->email}}</li>
          <li> {{ $lawyer ? 'Proficiency: ' . $lawyer->proficiency : ''}}</li>
          <li></li>
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection