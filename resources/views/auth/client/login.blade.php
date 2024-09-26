@extends('layouts.auth')

@section('content')

<style>
    .w-full.bw-alert.animate__animated.animate__fadeIn.rounded-md.flex.p-3.bg-red-200\/80.text-red-600.mb-4 {
    padding: 8px;
}
</style>

<form method="POST" action="{{ route('client.login') }}"
        class="bg-card bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        @csrf
        <x-bladewind::input name="email" required="true" label="Email Address"
            error_message="You will need to enter your Email" />
        <x-bladewind::input type="password" viewable="true" prefix_is_icon="true" suffix="eye" name="password"
            required="true" label="Password" />
        @error('credentials')
            <x-bladewind::alert class="mb-4" size='small' type="error">
                {{ $message }}
            </x-bladewind::alert>
        @enderror
        <x-bladewind::button class="w-full" type="secondary" can_submit="true">
            Register
        </x-bladewind::button>

        <p class="mt-4">Already have an account? <a class="underline" href="/client/register">Register</a></p>
        <a class="text-blue-600 hover:underline" href="/client/reset/password">Forgot Password</a>
    </form>
@endsection
