@extends('layouts.pages')
@section('title', 'Edit Profile - ' . auth()->guard('client')->user()->name)
@section('content')
    <div class="h-full">
        <form action="{{ route('client.edit_profile', ['id' => auth()->guard('client')->user()->id]) }}" method="POST"
            enctype="multipart/form-data" class="p-8 w-full  grid grid-cols-11">
            @csrf
            <div class="col-span-3">
                @if (auth()->guard('client')->user()->image)
                    <div class="mb-4 col-span-3">
                        <label for="imageUpload" class="cursor-pointer">
                            <div class="relative w-40 h-40 rounded-full overflow-hidden bg-gray-900 hover:bg-opacity-50">
                                <img class="object-cover w-full h-full transition-opacity duration-200 ease-in-out hover:opacity-50"
                                    src="{{ asset('storage/' . auth()->guard('client')->user()->image) }}" width="150"
                                    height="150" alt="Profile Image" />
                                <div
                                    class="absolute inset-0 flex flex-col justify-center items-center text-white opacity-0 transition-opacity duration-200 ease-in-out hover:opacity-100">
                                    <span class="text-white pb-2">
                                        <i class="fas fa-camera text-xl"></i>
                                    </span>
                                    <span class="uppercase text-xs w-1/2 text-center">Change Picture</span>
                                </div>
                            </div>
                        </label>
                        <input type="file" id="imageUpload" name="image" style="display: none;" accept="image/*"
                            onchange="previewImage(event)">
                    </div>
                @else
                    <div class="mb-4 col-span-3">
                        <label for="imageUpload" class="cursor-pointer">
                            <div class="relative w-36 h-36 rounded-full overflow-hidden bg-gray-900 hover:bg-opacity-50">
                                <img class="object-cover w-full h-full transition-opacity duration-200 ease-in-out hover:opacity-50"
                                    src="https://media.istockphoto.com/id/1300845620/vector/user-icon-flat-isolated-on-white-background-user-symbol-vector-illustration.jpg?s=612x612&w=0&k=20&c=yBeyba0hUkh14_jgv1OKqIH0CCSWU_4ckRkAoy2p73o="
                                    width="150" height="150" alt="Profile Image" />
                                <div
                                    class="absolute inset-0 flex flex-col justify-center items-center text-white opacity-0 transition-opacity duration-200 ease-in-out hover:opacity-100">
                                    <span class=" pb-2">
                                        <i class="fas fa-camera text-xl"></i>
                                    </span>
                                    <span class="uppercase text-xs w-1/2 text-center">Change Picture</span>
                                </div>
                            </div>
                        </label>
                        <input type="file" id="imageUpload" name="image" required style="display: none;"
                            accept="image/*" onchange="previewImage(event)">
                    </div>
                @endif


            </div>
            <div class="col-span-3">
                <label for="name" class="block mb-2">Full Name</label>
                <input type="text" id="name" value="{{ auth()->guard('client')->user()->name }}" name="name"
                    placeholder="Enter your full name"
                    class="w-full px-3 py-2 mb-4 text-black placeholder-input text-input border border-border rounded-md focus:outline-none focus:ring ring-primary" />

                <label for="email" class="block mb-2">Email Address</label>
                <input type="email" id="email" value="{{ auth()->guard('client')->user()->email }}" name="email"
                    placeholder="Enter your email address"
                    class="w-full px-3 py-2 mb-4 text-black placeholder-input text-input border border-border rounded-md focus:outline-none focus:ring ring-primary" />
                <button type="submit"
                    class="w-full bg-gray-400 hover:bg-gray-500 py-2 rounded-md transition duration-300">Edit
                    Profile</button>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                @endif
            </div>
        </form>

        @if (auth()->guard('client')->check() && auth()->guard('client')->user()->image)
        <form action="{{ route('client.remove_profile_pic', ['id' => auth()->guard('client')->user()->id]) }}" method="POST">
            @csrf
            <x-bladewind::button type="secondary" can_submit="true" outline="true">
                Remove Current Profile
            </x-bladewind::button>
        </form>
    @else
        <p></p>
    @endif
    
    </div>

@endSection

<script>
    function previewImage(event) {
        const file = event.target.files[0];
        const imgElement = document.querySelector('label img');
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imgElement.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    }
</script>
