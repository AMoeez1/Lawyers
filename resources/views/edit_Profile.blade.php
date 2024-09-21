@extends('layouts.pages')
{{-- @section('title', 'Edit Profile - ' . auth()->user() ? auth()->user()->name : auth()->guard('client')->user()->name) --}}
@section('title', 'Edit Profile - ' . (auth()->user() ? auth()->user()->name : (auth()->guard('client')->user() ? auth()->guard('client')->user()->name : 'Guest')))

@section('content')
    <div class="h-full">
        <form
            action="{{ auth()->user() ? route('lawyer.edit_profile', ['id' => auth()->user()->id]) : route('client.edit_profile', ['id' => auth()->guard('client')->user()->id]) }}"
            method="POST" enctype="multipart/form-data" class="p-8 w-full  grid grid-cols-11">
            @csrf
            <div class="col-span-3">
                @if (
                    (auth()->guard('client')->check() && auth()->guard('client')->user()->image) ||
                        (auth()->check() && auth()->user()->image))
                    <div class="mb-4 col-span-3 flex justify-center items-center h-full">
                        <label for="imageUpload" class="cursor-pointer">
                            <div class="relative w-40 h-40 rounded-full overflow-hidden bg-gray-900 hover:bg-opacity-50">
                                <img class="object-cover w-full h-full transition-opacity duration-200 ease-in-out hover:opacity-50"
                                    src="{{ auth()->user() ? asset('storage/' . auth()->user()->image) : asset('storage/' . auth()->guard('client')->user()->image) }}"
                                    width="150" height="150" alt="Profile Image" />
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
                @if (auth()->user())
                    <x-bladewind::input name="name" required="true" selected_value='{{ auth()->user()->name }}'
                        label="Full Name" />
                    <x-bladewind::input name="email" required="true" selected_value='{{ auth()->user()->email }}'
                        label="Email" />
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                        option</label>
                    <select id="countries" name="degree"
                        class="bg-gray-50 mb-6 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" disabled>Select a Degree</option>
                        <option value="LLB" {{ auth()->user()->degree == 'LLB' ? 'selected' : '' }}>Bachelors of Law
                            (LLB)</option>
                        <option value="JD" {{ auth()->user()->degree == 'JD' ? 'selected' : '' }}>Juris Doctor (JD)
                        </option>
                        <option value="LLM" {{ auth()->user()->degree == 'LLM' ? 'selected' : '' }}>Master Of Laws (LLM)
                        </option>
                        <option value="SJD" {{ auth()->user()->degree == 'SJD' ? 'selected' : '' }}>Doctor of Juridical
                            Science (SJD)</option>
                        <option value="MDR" {{ auth()->user()->degree == 'MDR' ? 'selected' : '' }}>Master of Dispute
                            Resolution (MDR)</option>
                        <option value="MLS" {{ auth()->user()->degree == 'MLS' ? 'selected' : '' }}>Master of Legal
                            Studies (MLS)</option>
                    </select>
                    <x-bladewind::input name="proficiency" required="true"
                        selected_value='{{ auth()->user()->proficiency }}' label="Proficiency/Specialist" />
                    <x-bladewind::input numeric='true' name="CNIC" required="true"
                        selected_value='{{ auth()->user()->CNIC }}' label="CNIC" />
                    <x-bladewind::textarea required="true" selected_value='{{ auth()->user()->about }}' label="Comment"
                        name='about' />
                    <x-bladewind::button class="w-full" type="secondary" can_submit="true">
                        Edit Profile
                    </x-bladewind::button>
                @else
                    <x-bladewind::input required="false" name="name"
                        selected_value="{{ auth()->guard('client')->user()->name }}" label="Name" />
                    <x-bladewind::input required="false" name="email"
                        selected_value="{{ auth()->guard('client')->user()->email }}" label="Email" />
                    <x-bladewind::button class="w-full" type="secondary" can_submit="true">
                        Edit Profile
                    </x-bladewind::button>
                @endif

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

        @if (
            (auth()->guard('client')->check() && auth()->guard('client')->user()->image) ||
                (auth()->check() && auth()->user()->image))
            <form class="ml-40"
                action="{{ auth()->user() ? route('lawyer.remove_profile_pic', ['id' => auth()->user()->id]) : route('client.remove_profile_pic', ['id' => auth()->guard('client')->user()->id]) }}"
                method="POST">
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
