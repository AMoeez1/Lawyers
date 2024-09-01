@extends('layouts.auth')

@section('content')
    <form method="POST" action="{{ route('lawyer.login') }}"
        class="bg-card bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        @csrf
        <div class="">
            <label for="email" class="block mb-2">Email Address</label>
            <input type="email" id="email" name="email" placeholder="Enter your email address"
                class="w-full px-3 py-2 mb-4 placeholder-input text-input border border-border rounded-md focus:outline-none focus:ring ring-primary" />
        </div>
        <div class="">
            <label for="CNIC" class="block mb-2">CNIC Number</label>
            <input type="text" id="CNIC" name="CNIC" placeholder="Enter your CNIC number"
                class="w-full px-3 py-2 mb-4 placeholder-input text-input border border-border rounded-md focus:outline-none focus:ring ring-primary" />
        </div>

        <div class="">
            <label for="password" class="block mb-2">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password"
                class="w-full px-3 py-2 mb-6 placeholder-input text-input border border-border rounded-md focus:outline-none focus:ring ring-primary" />
        </div>

        @error('credentials')
            <span class="text-red-500">
                {{ $message }}
            </span>
        @enderror

        <button type="submit"
            class="w-full bg-gray-100 hover:bg-gray-200 py-2 rounded-md transition duration-300">Login</button>

        <p class="mt-4">Don't have lawyer account? <a class="underline" href="/lawyer/register">Register As Lawyer</a></p>
    </form>
@endsection
