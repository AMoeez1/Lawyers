{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$subject}}</title>
</head>
<body>
    <h3>{{$subject}}</h3>
    <p></p>
</body>
</html> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="max-w-lg mx-auto mt-10 bg-white rounded-lg shadow-lg overflow-hidden">
        <!-- Header -->
        <div class="bg-blue-600 text-white text-center py-4">
            <h1 class="text-2xl font-bold">Welcome to Lawyers Connect!</h1>
            {{ $messageContent }}
        </div>
        <!-- Body -->
        <div class="p-6">
            <h2 class="text-xl font-semibold mb-4">Hello {{ auth()->user()->name }},</h2>
            <p class="text-gray-700 mb-4">Thank you for joining us! We are thrilled to have you as part of our
                community.</p>
            <p class="text-gray-700 mb-4">To get started, please verify your email address by clicking the button below:
            </p>
            <div class="mt-4">
                {{-- <form action="{{route('lawyer.verify_email')}}"> --}}
                    {{-- @csrf --}}
                    <a href="{{url('lawyer/email/verify')}}"
                        class="inline-block px-6 py-3 bg-blue-600 text-white rounded-lg text-center hover:bg-blue-500 transition">Verify
                        Email</a>
                {{-- </form> --}}
            </div>
            <p class="text-gray-700 mt-4">Once verified, you can start enjoying all the features we offer!</p>
            <h3 class="text-lg font-semibold mt-6">Need Help?</h3>
            <p class="text-gray-700 mb-4">If you have any questions or need assistance, feel free to reach out to our
                support team at <a href="mailto:support@yourcompany.com"
                    class="text-blue-600 underline">support@yourcompany.com</a>.</p>
        </div>
        <!-- Footer -->
        <div class="bg-gray-200 text-center py-4">
            <p class="text-gray-600 text-sm">© 2024 Your Company. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
