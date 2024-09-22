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




{{-- @if ((auth()->check() && auth()->user()) || (auth()->guard('client')->check() && auth()->guard('client')->user()))
                        <a href="/client/profile/{{ auth()->user()->id }}" class="hover:text-gray-400">
                            <x-bladewind::dropmenu trigger="<i class='fas fa-user'></i>" trigger_css="">
                                <x-bladewind::dropmenu-item>
                                    <a href="{{auth()->user() ? url('/lawyer/profile/' . auth()->user()->id) : url('/client/profile/' . auth()->user()->id) }}" class="px-4">Profile</a>
                                </x-bladewind::dropmenu-item>
                                <x-bladewind::dropmenu-item>
                                    <form method="post" class="m-0" action="{{ route('lawyer.logout') }}">
                                        @csrf
                                        <button class="px-4 my-0">Logout</button>
                                    </form>
                                </x-bladewind::dropmenu-item>
                            </x-bladewind::dropmenu>
                        </a>
                    @endif --}}
                    {{-- @if ((auth()->check() && auth()->user()) || (auth()->guard('client')->check() && auth()->guard('client')->user()))
                        <div class="relative inline-block text-left">
                            <div class="text-center">
                                @if (auth()->user()->image || auth()->guard('client')->user()->image)
                                    <x-bladewind::dropmenu
                                        trigger="<img class='w-10 rounded-full' src='{{ auth()->user() ? asset('storage/' . auth()->user()->image) : asset('storage/' . auth()->guard('client')->user()->image) }}'/>"
                                        trigger_css="">
                                        <x-bladewind::dropmenu-item>
                                            <a href="/client/profile/{{ auth()->guard('client')->user()->id }}"
                                                class="px-4">Profile</a>
                                        </x-bladewind::dropmenu-item>
                                        <x-bladewind::dropmenu-item>
                                            <form method="post" class="m-0"
                                                action="{{ auth()->guard('client')->user() ? route('client.logout') : route('lawyer.logout') }}">
                                                @csrf
                                                <button class="px-4 my-0">Logout</button>
                                            </form>
                                        </x-bladewind::dropmenu-item>
                                    </x-bladewind::dropmenu>
                            </div>
                        @else
                            <x-bladewind::dropmenu trigger="<i class='fas fa-user'></i>" trigger_css="">
                                <x-bladewind::dropmenu-item>
                                    <a href="/client/profile/{{ auth()->guard('client')->user()->id }}"
                                        class="px-4">Profile</a>
                                </x-bladewind::dropmenu-item>
                                <x-bladewind::dropmenu-item>
                                    <form method="post" class="m-0"
                                        action="{{ auth()->guard('client')->user() ? route('client.logout') : route('lawyer.logout') }}">
                                        @csrf
                                        <button class="px-4 my-0">Logout</button>
                                    </form>
                                </x-bladewind::dropmenu-item>
                            </x-bladewind::dropmenu>
                    @endif --}}
