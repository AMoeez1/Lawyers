@extends('layouts.pages')
@section('title', 'profile -  ' . auth()->guard('client')->user()->name)

@section('content')
    <div class="bg-s text-primary-foreground">
        <header class="bg-primary py-4">
            <div class="container mx-auto flex items-center justify-between">
                {{-- <button class="bg-secondary text-secondary-foreground px-4 py-2 rounded-lg">Edit Profile</button> --}}
            </div>
        </header>
        <div class="container mx-auto mt-8 h-full">
            <div class="p-6 rounded-lg drop-shadow-xl">
                <h1 class="text-center text-2xl font-bold">User Profile</h1>

                <h2 class="text-xl font-bold text-center my-2">{{ $client->name }}</h2>
                <p class="text-secondary"></p>

                @if (auth()->guard('client')->user())
                <div class="">
                  <form action="{{ route('client.edit_profile', ['id' => auth()->guard('client')->user()->id]) }}"
                    method="POST" enctype="multipart/form-data" class="p-8 w-full grid grid-cols-12">
                    @csrf
                    @if (auth()->guard('client')->user()->image)
                    <div class="mb-4 col-span-3">
                      <label for="imageUpload" class="cursor-pointer">
                        <img src="{{ asset('storage/' . auth()->guard('client')->user()->image) }}"
                             alt="{{ auth()->guard('client')->user()->image }}" 
                             class="w-40 h-40 rounded-full object-cover" />
                    </label>
                    <input type="file" id="imageUpload" name="image" required style="display: none;" accept="image/*" onchange="previewImage(event)">
                    </div>
                    @else
                        <img src="https://placehold.co/150x150" alt="User Avatar" class="w-40 h-40 rounded-full" />
                    @endif
                    <div class="col-span-3">
                      <label for="name" class="block mb-2">Full Name</label>
                      <input type="text" id="name" value="{{ $client->name }}" name="name"
                          placeholder="Enter your full name"
                          class="w-full px-3 py-2 mb-4 text-black placeholder-input text-input border border-border rounded-md focus:outline-none focus:ring ring-primary" />

                      <label for="email" class="block mb-2">Email Address</label>
                      <input type="email" id="email" value="{{ $client->email }}" name="email"
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

                    </div>
                        </form>
                    </div>
                @endif

                @endif

                {{-- @if (auth()->user())
                <div class="mt-4">
                    <h3 class="text-lg font-semibold">About Me</h3>
                    <p class="mt-2">{{ $lawyer->about }}</p>
                </div>
            @endif
            <div class="mt-4">
                <h3 class="text-lg font-semibold">Contact Information</h3>
                <ul class="mt-2">
                    <li>Email: {{ $client ? $client->email : $lawyer->email }}</li>
                    <li> {{ $lawyer ? 'Proficiency: ' . $lawyer->proficiency : '' }}</li>
                    <li></li>
                </ul>
            </div> --}}
            </div>
        </div>
    </div>
@endsection

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
