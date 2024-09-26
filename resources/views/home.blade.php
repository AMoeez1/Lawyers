@extends('layouts.pages')
@section('title', 'Home - LawyerConnect')
@section('content')
    <section class="hero-bg h-80 p-10 md:p-0 bg-black md:screen flex md:items-center justify-center text-center text-white"
        id="home">
        {{-- <img src="{{asset('lawyers.jpg')}}" alt=""> --}}
        @if (!auth()->check())
            <div class="px-4 py-8 bg-opacity-70 rounded-lg">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">Find the Right Lawyer for Your Needs</h1>
                <p class="text-md md:text-lg mb-6">Connect with experienced legal professionals in just a few clicks. Get
                    personalized
                    legal advice and representation tailored to your needs.</p>

                <a href="#book" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg">Book a
                    Lawyer Now</a>
                @if (auth()->guard('client')->user())
                    <a href="/post" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg">Add
                        Post</a>
                @else
                    <a href="/lawyer/register"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg">Register As
                        Lawyer</a>
                @endif
            </div>
        @else
            <div class="px-4 py-8 bg-opacity-70 rounded-lg">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">Find Clients</h1>
                <p class="text-md md:text-lg mb-6">Connect with 1000+ clients in just a few clicks. Fight on their behalf
                    and get paid
                    for that.</p>
                <x-bladewind::button onclick="showModal('tnc-agreement-titled')">
                    Terms And Condition
                </x-bladewind::button>
                <x-bladewind::modal name="tnc-agreement-titled" title="Agree or Disagree">
                    Please agree to the terms and conditions of
                    the agreement before proceeding.
                </x-bladewind::modal>
            </div>
        @endif
    </section>

    <section class="py-12 bg-gray-50 text-gray-800">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">How It Works</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <h3 class="text-xl font-semibold mb-4">Describe Your Legal Issue</h3>
                    <p>Fill out a brief form outlining your legal concern.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <h3 class="text-xl font-semibold mb-4">Get Matched with Lawyers</h3>
                    <p>Receive recommendations for lawyers based on your specific needs and location.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <h3 class="text-xl font-semibold mb-4">Book a Consultation</h3>
                    <p>Choose a time that works for you and schedule a meeting directly with the lawyer.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Find Lawyers by Practice Area -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">Find Lawyers by Practice Area</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-gray-100 p-6 rounded-lg shadow-lg text-center">
                    <h3 class="text-xl font-semibold mb-4">Criminal Defense</h3>
                    <p>Protect your rights with experienced criminal defense attorneys.</p>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow-lg text-center">
                    <h3 class="text-xl font-semibold mb-4">Family Law</h3>
                    <p>Get support for divorce, custody, and family matters.</p>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow-lg text-center">
                    <h3 class="text-xl font-semibold mb-4">Personal Injury</h3>
                    <p>Seek compensation for accidents and injuries.</p>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow-lg text-center">
                    <h3 class="text-xl font-semibold mb-4">Real Estate</h3>
                    <p>Navigate property transactions and disputes with expert advice.</p>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow-lg text-center">
                    <h3 class="text-xl font-semibold mb-4">Business Law</h3>
                    <p>Handle business formation, contracts, and disputes efficiently.</p>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow-lg text-center">
                    <h3 class="text-xl font-semibold mb-4">Employment Law</h3>
                    <p>Resolve workplace issues and ensure your rights are protected.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Lawyers -->
    <section class="py-12 bg-gray-50" id="lawyers">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">Featured Lawyers</h2>
            <div class="grid grid-cols-12 gap-8">
                @foreach ($AllUsers as $user)
                    <div class="col-span-12 md:col-span-4 bg-white p-6 rounded-lg shadow-lg text-center cursor-pointer">
                        <a href="{{route('lawyer.other_profile', ['id' => $user->id])}}">
                            @if ($user->image)
                                <x-bladewind::avatar class="my-4" image="{{ asset('storage/' . $user->image) }}" size="huge" />
                            @else
                                <x-bladewind::avatar class="my-4"
                                    image="https://media.istockphoto.com/id/1300845620/vector/user-icon-flat-isolated-on-white-background-user-symbol-vector-illustration.jpg?s=612x612&w=0&k=20&c=yBeyba0hUkh14_jgv1OKqIH0CCSWU_4ckRkAoy2p73o="
                                    size="huge" />
                            @endif
    
                            <h3 class="text-xl font-semibold mb-2">{{ $user->name }}</h3>
                            <p class="text-gray-700 mb-4">{{ $user->proficiency }}</p>
                            <p>"{{ $user->about }}"</p>
                            {{-- <a href="#book" class="text-blue-500 hover:underline mt-4 block">View Profile</a> --}}
                            <form method="POST">
                                @csrf
                                <a href="#book" id="book"
                                    class="bg-blue-500 hover:bg-blue-600  text-white font-semibold py-2 px-4 rounded-lg mt-2 inline-block">Book
                                    a Consultation</a>
                            </form>

                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Client Testimonials -->
    <section class="py-12 bg-white" id="cases">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">Cases Study</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($posts as $post)
                    <!-- Repeat for each testimonial -->
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg text-center">
                        <p class="text-xl">{{ $post->title }}</p>
                        <p class=" mb-4">{{ $post->details }}</p>
                        <p class="font-semibold">RS - {{ $post->price }} <span class="text-sm font-normal">per visit</span>
                        </p>
                        <a href="#book"
                            class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg mt-2 inline-block">
                            Interested</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">Why Choose Us?</h2>
            <ul class="list-disc list-inside space-y-4">
                <li class="text-lg">Convenient Booking: Schedule consultations online at your convenience.</li>
                <li class="text-lg">Verified Professionals: All lawyers are vetted for their expertise and credentials.
                </li>
                <li class="text-lg">Personalized Matches: Receive lawyer recommendations tailored to your specific legal
                    needs.</li>
                <li class="text-lg">Transparent Pricing: Clear information about fees and services.</li>
            </ul>
        </div>
    </section>

    <!-- Frequently Asked Questions -->
    <section class="py-12 bg-white" id="FAQ">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">Frequently Asked Questions</h2>
            <div class="space-y-6">
                <div>
                    <h3 class="text-xl font-semibold mb-2">How do I choose the right lawyer?</h3>
                    <p>Describe the process of matching clients with lawyers based on their needs.</p>
                </div>
                <div>
                    <h3 class="text-xl font-semibold mb-2">What should I prepare for my consultation?</h3>
                    <p>Provide a list of documents and information clients should bring.</p>
                </div>
                <div>
                    <h3 class="text-xl font-semibold mb-2">How are the lawyers selected?</h3>
                    <p>Explain the vetting process for selecting featured lawyers.</p>
                </div>
            </div>
        </div>
    </section>


    {{-- Contact US --}}
    <section class="py-12 bg-gray-50" id="contact">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">Contact Us</h2>
            <div class="text-center">
                <p class="text-lg mb-4">Have More Questions? Feel free to reach out to our support team for assistance.
                </p>
                <p class="text-lg mb-2">Phone: <a href="tel:+18001234567"
                        class="text-blue-500 hover:underline">1-800-123-4567</a></p>
                <p class="text-lg mb-2">Email: <a href="mailto:support@lawyerconnect.com"
                        class="text-blue-500 hover:underline">support@lawyerconnect.com</a></p>
                <p class="text-lg mb-4">Address: 123 Legal Ave, Suite 100, Lawtown, USA</p>
                <div class="flex justify-center space-x-4">
                    <a href="#" class="text-blue-500 hover:underline">Facebook</a>
                    <a href="#" class="text-blue-500 hover:underline">Twitter</a>
                    <a href="#" class="text-blue-500 hover:underline">LinkedIn</a>
                </div>
            </div>
        </div>
    </section>
@stop
<script>
    function bookLawyer() {
        const book = document.getElementById('book');
        const req = document.getElementById('req');
        book.classList.add('display');
        req.classList.remove('block');
    }
</script>
