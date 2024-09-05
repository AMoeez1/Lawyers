 @extends('layouts.auth')

 @section('content')
     <form method="POST" action="{{ route('lawyer.register') }}"
         class="bg-card p-8 rounded-lg bg-white shadow-lg w-full max-w-md">
         @csrf
         <div class="grid"></div>
         <label for="name" class="block mb-2">Full Name</label>
         <input type="text" name="name" id="name" placeholder="Enter your full name"
             class="w-full px-3 py-2 mb-4 placeholder-input text-input border border-border rounded-md focus:outline-none focus:ring ring-primary" required />
         <label for="email" class="block mb-2">Email Address</label>
         <input type="email" id="email" name="email" placeholder="Enter your email address"
             class="w-full px-3 py-2 mb-4 placeholder-input text-input border border-border rounded-md focus:outline-none focus:ring ring-primary" required />
         <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
             option</label>
         <select id="countries" name="degree"
             class="bg-gray-50 mb-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
             <option selected>Choose a Degree</option>
             <option value="LLB">Bachelors of Law (LLB)</option>
             <option value="JD">Juris Doctor (JD)</option>
             <option value="LLM">Master Of Laws (LLM)</option>
             <option value="SJD">Doctor of Juridical Science (SJD)</option>
             <option value="MDR">Master of Dispute Resolution (MDR)</option>
             <option value="MLS">Master of Legal Studies (MLS)</option>
         </select>
         <div class="">
             <label for="speciality" class="block mb-2">Speciality / Proficiency</label>
             <input type="text" name="proficiency" id="speciality" placeholder="Enter your Speciality"
                 class="w-full px-3 py-2 mb-4 placeholder-input text-input border border-border rounded-md focus:outline-none focus:ring ring-primary" required />
         </div>
         <div class="">
             <label for="CNIC" class="block">CNIC number</label>
             <input type="text" name="CNIC" id="CNIC" placeholder="Enter your CNIC number"
                 class="w-full px-3 py-2 mb-4 placeholder-input text-input border border-border rounded-md focus:outline-none focus:ring ring-primary" required />
         </div>
         <div class="">
             <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">About</label>
             <textarea id="message" name="about" rows="4"
                 class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                 placeholder="Write your about here..." required></textarea>
         </div>
         <label for="password" class="block mb-2">Password</label>
         <input type="password" name="password" id="password" placeholder="Enter your password"
             class="w-full px-3 py-2 mb-6 placeholder-input text-input border border-border rounded-md focus:outline-none focus:ring ring-primary" required />

         <button type="submit"
             class="w-full bg-gray-100 hover:bg-gray-200 py-2 rounded-md transition duration-300">Register</button>

         <p class="mt-4">Already have an account? <a class="underline" href="/lawyer/login">Login</a></p>
         @error('register')
             <span class="text-red-500">
                 {{ $message }}
             </span>
         @enderror
         @error('validation')
             <span class="text-red-500">
                 {{ $message }}
             </span>
         @enderror
     </form>
 @endsection
