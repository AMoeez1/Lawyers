<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .hero-bg {
            background-image: url('{{ asset('lawyer.jpg') }}');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body>
    @include('components.nav')
    <!-- Hero Section -->
    <section class="hero-bg bg-black h-screen flex items-center justify-center text-center text-white">
        {{-- <img src="{{asset('lawyers.jpg')}}" alt=""> --}}
        <div class="px-4 py-8  bg-opacity-70 rounded-lg">
            <h1 class="text-4xl font-bold mb-4">Find the Right Lawyer for Your Needs</h1>
            <p class="text-lg mb-6">Connect with experienced legal professionals in just a few clicks. Get personalized
                legal advice and representation tailored to your needs.</p>
            <a href="#book" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg">Book a
                Lawyer Now</a>
            <a href="/lawyer/   register"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg">Register As
                Lawyer</a>
        </div>
    </section>

    <!-- How It Works -->
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
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">Featured Lawyers</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Repeat for each featured lawyer -->
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <img src="lawyer-photo.jpg" alt="Lawyer" class="w-24 h-24 rounded-full mx-auto mb-4">
                    <h3 class="text-xl font-semibold mb-2">John Smith, Esq.</h3>
                    <p class="text-gray-700 mb-4">Criminal Defense</p>
                    <p>"I provide aggressive defense and fight for your rights."</p>
                    <a href="#book" class="text-blue-500 hover:underline mt-4 block">View Profile</a>
                    <a href="#book"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg mt-2 inline-block">Book
                        a Consultation</a>
                </div>
                <!-- Add more featured lawyers similarly -->
            </div>
        </div>
    </section>

    <!-- Client Testimonials -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">Client Testimonials</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Repeat for each testimonial -->
                <div class="bg-gray-100 p-6 rounded-lg shadow-lg text-center">
                    <p class="italic mb-4">"LawyerConnect made finding and booking a lawyer incredibly easy. I had my
                        consultation within days and felt confident about my case."</p>
                    <p class="font-semibold">Sarah L.</p>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow-lg text-center">
                    <p class="italic mb-4">"The process was straightforward, and I found a fantastic lawyer for my
                        business needs. Highly recommend!"</p>
                    <p class="font-semibold">James R.</p>
                </div>
                <!-- Add more testimonials similarly -->
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
    <section class="py-12 bg-white">
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
    <section class="py-12 bg-gray-50">
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

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-6">
        <div class="container mx-auto px-4 text-center">
            <a href="#" class="text-blue-400 hover:underline">Privacy Policy</a> |
            <a href="#" class="text-blue-400 hover:underline">Terms of Service</a> |
            <a href="#" class="text-blue-400 hover:underline">Site Map</a> |
            <a href="#" class="text-blue-400 hover:underline">Accessibility Statement</a>
        </div>
    </footer>
</body>

</html>
