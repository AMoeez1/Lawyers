<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="bg-gray-100 min-h-screen flex flex-col items-center justify-center">
        <form method="POST" action="{{ route('loginCl')}}" class="bg-card bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            @csrf
            <div class="flex justify-center">
                <img src="{{ asset('lawyers_title.png') }}" width="100px" />
            </div>

            <label for="email" class="block mb-2">Email Address</label>
            <input type="email" id="email" placeholder="Enter your email address"
                class="w-full px-3 py-2 mb-4 placeholder-input text-input border border-border rounded-md focus:outline-none focus:ring ring-primary" />

            <label for="password" class="block mb-2">Password</label>
            <input type="password" id="password" placeholder="Enter your password"
                class="w-full px-3 py-2 mb-6 placeholder-input text-input border border-border rounded-md focus:outline-none focus:ring ring-primary" />

            <button type="submit"
                class="w-full bg-gray-100 hover:bg-gray-200 py-2 rounded-md transition duration-300">Register</button>
        
			<p class="mt-4">Already have an account? <a class="underline" href="/register/client">Login</a></p>
		</form>
    </div>

    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>