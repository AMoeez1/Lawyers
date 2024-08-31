@extends('layouts.auth')

@section('content')
    <form method="POST" action="{{ route('client.login') }}" class="bg-card bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        @csrf
        <label for="email" class="block mb-2">Email Address</label>
        <input type="email" id="email" placeholder="Enter your email address"
            class="w-full px-3 py-2 mb-4 placeholder-input text-input border border-border rounded-md focus:outline-none focus:ring ring-primary" />

        <label for="password" class="block mb-2">Password</label>
        <input type="password" id="password" placeholder="Enter your password"
            class="w-full px-3 py-2 mb-6 placeholder-input text-input border border-border rounded-md focus:outline-none focus:ring ring-primary" />

        <button type="submit"
            class="w-full bg-gray-100 hover:bg-gray-200 py-2 rounded-md transition duration-300">Login</button>

        <p class="mt-4">Already have an account? <a class="underline" href="/register/client">Register</a></p>
    </form>
@endsection
