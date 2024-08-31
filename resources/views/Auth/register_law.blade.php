<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register As Lawyer</title>
</head>

<body>
    <div class="bg-gray-100 min-h-screen flex flex-col items-center justify-center">
        <form class="bg-card p-8 rounded-lg bg-white shadow-lg w-full max-w-md">
            <div class="flex justify-center">
                <img src="{{ asset('lawyers_title.png') }}" width="100px" />
            </div>
            <label for="name" class="block mb-2">Full Name</label>
            <input type="text" id="name" placeholder="Enter your full name"
                class="w-full px-3 py-2 mb-4 placeholder-input text-input border border-border rounded-md focus:outline-none focus:ring ring-primary" />
            <label for="email" class="block mb-2">Email Address</label>
            <input type="email" id="email" placeholder="Enter your email address"
                class="w-full px-3 py-2 mb-4 placeholder-input text-input border border-border rounded-md focus:outline-none focus:ring ring-primary" />
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                option</label>
            <select id="countries"
                class="bg-gray-50 mb-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Choose a Degree</option>
                <option value="LLB">Bachelors of Law (LLB)</option>
                <option value="JD">Juris Doctor (JD)</option>
                <option value="LLM">Master Of Laws (LLM)</option>
                <option value="SJD">Doctor of Juridical Science (SJD)</option>
                <option value="MDR">Master of Dispute Resolution (MDR)</option>
                <option value="MLS">Master of Legal Studies (MLS)</option>
            </select>

            <label for="speciality" class="block mb-2">Speciality / Proficiency</label>
            <input type="text" id="speciality" placeholder="Enter your Speciality"
                class="w-full px-3 py-2 mb-4 placeholder-input text-input border border-border rounded-md focus:outline-none focus:ring ring-primary" />

            <label for="password" class="block mb-2">Password</label>
            <input type="password" id="password" placeholder="Enter your password"
                class="w-full px-3 py-2 mb-6 placeholder-input text-input border border-border rounded-md focus:outline-none focus:ring ring-primary" />

            <button type="submit"
                class="w-full bg-gray-100 hover:bg-gray-200 py-2 rounded-md transition duration-300">Register</button>

            <p class="mt-4">Already have an account? <a class="underline" href="/login/client">Login</a></p>
        </form>
    </div>


    <script src='https://cdn.tailwindcss.com'></script>
</body>

</html>
