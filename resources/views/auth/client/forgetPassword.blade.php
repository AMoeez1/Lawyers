@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')
<style>
    .relative.w-full.dv-email.mb-4{
        margin-bottom: 0;
    }
</style>
<form method="POST" action="{{ route('client.forget_password') }}"
        class="bg-card bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        @csrf
        <h1 class="text-2xl text-center pb-8">Reset Password</h1>
        <x-bladewind::input name="email" required="true" label="Email Address"
            error_message="You will need to enter your Email" />
        <p class="text-red-600 text-sm mx-1 mb-8">Email must be valid to reset your password!</p>
        @error('credentials')
            <span class="text-red-500">
                {{ $message }}
            </span>
        @enderror
        <x-bladewind::button class="w-full" type="secondary" can_submit="true">
            Send Link
        </x-bladewind::button>
        <a class="text-blue-600 hover:underline" href="/client/login">Try Login Again</a>
    </form>

@endsection