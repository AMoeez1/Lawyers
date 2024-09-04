@extends('layouts.pages');
@section('title', 'Post - LawyerConnect');

@section('content')
<div class="my-12 flex justify-center">
    <form method="POST" action="{{ route('post') }}"
    class="bg-card bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
    @csrf
    <h1 class="text-xl text-center my-4">Add post about your case</h1>
    <div class="">
        <label for="title" class="block mb-2">Case Title</label>
        <input type="text" id="title" name="title" placeholder="Enter Case Title"
            class="w-full px-3 py-2 mb-4 placeholder-input text-input border border-border rounded-md focus:outline-none focus:ring ring-primary" />
    </div>
    <div class="">
        <label for="details" class="block mb-2">Case Details</label>
        <textarea id="details" name="details" placeholder="Enter Case Details"
            class="w-full px-3 py-2 mb-4 placeholder-input text-input border border-border rounded-md focus:outline-none focus:ring ring-primary" ></textarea>
    </div>
    
    <div class="">
        <label for="price" class="block mb-2">Price per visit</label>
        <input type="text" id="price" name="price" placeholder="Enter the reasonable price"
            class="w-full px-3 py-2 mb-6 placeholder-input text-input border border-border rounded-md focus:outline-none focus:ring ring-primary" />
    </div>
    
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Whoops!</strong>
            <span class="block sm:inline">{{ $errors->first() }}</span>
        </div>
    @endif
    
    <button type="submit"
        class="w-full bg-gray-100 hover:bg-gray-200 py-2 rounded-md transition duration-300">Post</button>
</form>
</div>
@endsection