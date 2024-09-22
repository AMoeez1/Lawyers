@extends('layouts.auth')

@section('content')
    <form method="POST" action="{{ route('client.login') }}"
        class="bg-card bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        @csrf
        <x-bladewind::input name="email" required="true" label="Email Address"
            error_message="You will need to enter your Email" />
        <x-bladewind::input type="password" viewable="true" prefix_is_icon="true" suffix="eye" name="password"
            required="true" label="Password" />
        @error('credentials')
            <span class="text-red-500">
                {{ $message }}
            </span>
        @enderror
        <x-bladewind::button class="w-full" type="secondary" can_submit="true">
            Register
        </x-bladewind::button>

        <p class="mt-4">Already have an account? <a class="underline" href="/client/register">Register</a></p>
    </form>
@endsection