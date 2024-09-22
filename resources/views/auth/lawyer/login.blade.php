@extends('layouts.auth')

@section('title', 'Login - Lawyer')

@section('content')
    <form method="POST" action="{{ route('lawyer.login') }}"
        class="bg-card bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        @csrf
        <x-bladewind::input name="email" required="true" label="Email Address"
            error_message="You will need to enter your Email" />
        <x-bladewind::input numeric='true' name="CNIC" required="true" label="CNIC"
            error_message="You will need to enter your valid CNIC/ID number" />
        <x-bladewind::input type="password" viewable="true" prefix_is_icon="true" suffix="eye" name="password"
            required="true" label="Password" />
        <x-bladewind::button class="w-full" type="secondary" can_submit="true">
            Login
        </x-bladewind::button>

        @error('credentials', 'Error')
            <span class="text-red-500">
                {{ $message }}
            </span>
        @enderror


        <p class="mt-4">Don't have lawyer account? <a class="underline" href="/lawyer/register">Register As Lawyer</a></p>
    </form>
@endsection
