 @extends('layouts.auth')

 @section('title', 'Registeration Lawyer')
 
 @section('content')
     <form method="POST" action="{{ route('lawyer.register') }}"
         class="bg-card p-8 rounded-lg bg-white shadow-lg w-full max-w-md">
         @csrf
         <x-bladewind::input name="name" required="true" label="Full Name"
             error_message="You will need to enter your full name" />
         <x-bladewind::input name="email" required="true" label="Email"
             error_message="You will need to enter your valid email" />
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
         <x-bladewind::input name="proficiency" required="true" label="Proficiency/Specialist"
             error_message="You will need to enter your proficiency" />
         <x-bladewind::input numeric='true' name="CNIC" required="true" label="CNIC"
             error_message="You will need to enter your valid CNIC/ID number" />
         <x-bladewind::textarea required="true" label="Comment" name='about' />
         <x-bladewind::input type="password" viewable="true" prefix_is_icon="true" suffix="eye" name="password"
             required="true" label="Password" />
         <x-bladewind::button class="w-full" type="secondary" can_submit="true">
             Edit Profile
         </x-bladewind::button>
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
