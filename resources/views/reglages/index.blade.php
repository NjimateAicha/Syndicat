@extends('layouts.main')

@section('content')
    <x-layouts.navbar :user="Auth::user()" route="reglages.show" :residence="$residence"></x-layouts.navbar>

    <div class="flex flex-col w-full p-4 space-y-4">

        <!-- First layout -->
        <div class="w-full p-4 rounded-lg flex flex-col md:flex-row justify-between items-center space-x-4">
            <!-- Heading on the left -->
            <h2 class="inline-block break-words font-['Inter'] font-semibold text-[14px] text-[#3C4C7C]">
                {{__('Useful Contacts')}}
            </h2>

            <!-- Buttons on the right -->

            <div class="flex space-x-4">
                @role('Super Admin|Admin|Manager principal|Manager|Propriétaire')
                    <!-- First Button -->
                    <button id="openModalBtnUser"
                        class="w-[150px] h-[40px] rounded-[8px] bg-[linear-gradient(90deg,#9EAFCE,#697C9B)] relative flex flex-row p-2 box-sizing-border hover:bg-[linear-gradient(90deg,#697C9B,#9EAFCE)] transition duration-300 ease-in-out transform hover:scale-105">
                        <span class="m-auto inline-block break-words font-['Inter'] font-medium text-[12px] text-[#FFFFFF]">
                           {{__('Ajouter utilisateur')}} +
                        </span>
                    </button>
                @endrole
                @role('Super Admin')
                    <!-- Second Button -->
                    <x-parameters.parameter-button class=""></x-parameters.parameter-button>
                    <button id="openModalBtnAdmin"
                        class="w-[150px] h-[40px] rounded-[8px] bg-[linear-gradient(90deg,#9EAFCE,#697C9B)] relative flex flex-row p-2 box-sizing-border hover:bg-[linear-gradient(90deg,#697C9B,#9EAFCE)] transition duration-300 ease-in-out transform hover:scale-105">
                        <span class="m-auto inline-block break-words font-['Inter'] font-medium text-[12px] text-[#FFFFFF]">
                            {{__('Ajouter Admin')}} +
                        </span>
                    </button>
                @endrole
            </div>


        </div>




        <!-- Second layout -->
        <div class="w-full rounded-lg flex flex-col md:gap-0 gap-4 md:flex-row box-sizing-border  ">
            <!-- Left Section (Table) -->
            <div class="flex-grow bg-white p-6 rounded-[20px] shadow-md">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr>
                            <th class="font-['Inter'] font-semibold text-[12px] text-[#6F7D93] p-2 text-left">
                                {{__('Manager')}}
                            </th>
                            <th class="font-['Inter'] font-semibold text-[12px] text-[#6F7D93] p-2 text-left">
                                {{__('Address')}}
                            </th>
                            <th class="font-['Inter'] font-semibold text-[12px] text-[#6F7D93] p-2 text-center">
                                {{__('Role')}}
                            </th>
                            @role('Super Admin|Admin|Manager principal|Manager')
                                <th class="font-['Inter'] font-semibold text-[12px] text-[#6F7D93] p-2 text-center">
                                    {{__('Phone')}}
                                </th>
                                <th class="font-['Inter'] font-semibold text-[12px] text-[#6F7D93] p-2 text-center">{{__('ACTION')}}</th>
                            @endrole
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @php
                    dd($users)
                    @endphp --}}

                    @if (!empty($users) && $users->count() > 0)
                    @foreach ($users as $user)
                        <tr class="border-b">
                            <td class="p-2 flex items-center space-x-2 text-left">
                                    <img src="{{ $user->image ? asset('storage/' . $user->image) : asset('assets/images/avatar.png') }}"
                                    alt="User Profile" class="rounded-[8px] w-[40px] h-[40px] bg-cover bg-center">
                                <div>
                                    <p class="font-['Inter'] font-semibold text-[12px] text-[#3A416F]">
                                        {{ $user->prenom }} {{ $user->nom }}</p>
                                        <a href="mailto: {{ $user->email }}" class="text-[12px] text-[#6F7D93]">{{ $user->email }}</a>
                                </div>
                            </td>
                            <td class="p-2 text-left">
                                <p class="font-['Inter'] font-semibold text-[12px] text-[rgba(58,65,111,0.8)]">
                                    Immeuble {{ $user->Num_Immenble }}</p>
                                <p class="text-[12px] text-[#6F7D93]">Appartement {{ $user->Num_Appartement }}</p>
                            </td>
                            {{-- <td class="p-2 text-center">
                                @foreach ($user->roles as $role)
                                
                                    <span
                                        class="bg-[#EAF9F0] text-[#6F7D93] px-2 py-1 rounded-full text-[10px] font-['Inter']">{{ $role->name }}</span>
                                @endforeach
                            </td> --}}
                            <td class="p-2 text-center">

                                @foreach ($user->roles as $role)
                                    @php
                                        $bgColor = isset($roleHierarchyColors[$role->name]) ? $roleHierarchyColors[$role->name] : '#EAF9F0'; // Default color if role not found
                                    @endphp
                                    <button
                                        class="text-white px-2 py-1 rounded-[8px] text-[10px] font-['Inter'] h-[24px] w-[130px]"
                                        style="background-color: {{ $bgColor }};">
                                        {{ $role->name }}
                                </button>
                                @endforeach
    
                                </td>
                            @role('Super Admin|Admin|Manager principal|Manager')
                                <td class="p-2 text-center font-['Inter'] text-[12px] text-[#3A416F]">
                                    {{ $user->phone }}
                                </td>
                                <td class="p-2 text-center text-red-600 cursor-pointer">
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this user?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="font-['Inter'] text-[12px] text-[#6F7D93] hover:text-[#3e4044]">Supprimer</button>
                                    </form>
                                </td>
                            @endrole
                        </tr>
                    @endforeach
                @endif



                    </tbody>
                </table>
            </div>


            <!-- Right Section (Profile Info) -->
            <div class="flex-grow bg-white p-6 rounded-[20px] shadow-md md:ml-4 md:h-[600px]">
                <h2
                    class="mb-6 inline-block self-start break-words font-['Inter'] font-semibold text-[14px] text-[#3C4C7C]">
                    {{ __('Profil') }}</h2>

                <!-- Image taking full width -->
                {{-- focus on this part --}}
                <div class=" m-[0_0_28px_0] w-[300px] h-[0px]"></div>

                <form id="updateForm" method="POST" action="{{ route('user.update', $residence->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="flex justify-center mb-6 relative">
                        <img id="profileImage"
                        

                            src="{{ Auth::user()->image ? asset('storage/' .Auth::user()->image) : asset('assets/images/avatar.png') }}"
                            alt="User Profile" class="rounded-full w-24 h-24">
                        <input type="file" id="imageUpload" class="hidden" name="profile_image"
                            onchange="previewImage(event)">
                        <i id="cameraIcon"
                            class="fa-solid fa-camera absolute bottom-0 right-0 bg-gray-200 p-2 rounded-full text-gray-600 cursor-pointer"
                            aria-label="Change profile picture"></i>
                    </div>


                    <!-- Name and Last Name on the same line -->
                    <div class="flex justify-between mb-6">
                        <div class="flex-1">
                            <h3
                                class="m-[0_7.5px_0_0]  break-words font-['Inter'] font-semibold text-[12px] text-[#6F7D93]">
                                {{__('Prénom')}}:</h3>
                            <p class="break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
                                {{ Auth::user()->prenom }}</p>
                        </div>
                        <div class="flex-1">
                            <h3
                                class="m-[0_7.5px_0_0]  break-words font-['Inter'] font-semibold text-[12px] text-[#6F7D93]">
                                {{__('name')}}:</h3>
                            <p class="break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
                                {{ Auth::user()->name }}
                            </p>
                        </div>
                    </div>

                    <!-- Immeuble and Appartement on the same line -->
                    <div class="flex justify-between mb-6">
                        <div class="flex-1">
                            <h3
                                class="m-[0_7.5px_0_0]  break-words font-['Inter'] font-semibold text-[12px] text-[#6F7D93]">
                                {{__('Immeuble')}}:</h3>
                            <p class="break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
                                {{ Auth::user()->Num_Immenble }}</p>
                        </div>
                        <div class="flex-1">
                            <h3
                                class="m-[0_7.5px_0_0]  break-words font-['Inter'] font-semibold text-[12px] text-[#6F7D93]">
                                {{__('Appartement')}}:</h3>
                            <p class="break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
                                {{ Auth::user()->Num_Appartement }}</p>
                        </div>
                    </div>

                    <!-- Role -->
                    <div class="mb-6">
                        <h3 class="m-[0_7.5px_0_0]  break-words font-['Inter'] font-semibold text-[12px] text-[#6F7D93]">
                            {{__('Role')}}:
                        </h3>
                        <p class="break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
                            {{ Auth::user()->getRoleNames()->first() }}</p>
                    </div>



                    <!-- Numéro de Téléphone with edit icon -->
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h3 class="m-[0_7.5px_0_0] break-words font-['Inter'] font-semibold text-[12px] text-[#6F7D93]">
                                {{__('Phone')}}:
                            </h3>
                            <p id="phoneDisplay" class="break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
                                {{ Auth::user()->phone }}
                            </p>
                            <input id="phoneInput" name="phone" class="hidden border rounded p-1 text-[12px]"
                                type="text" value="{{ Auth::user()->phone }}">
                        </div>
                        <button type="button" id="editPhoneBtn" class="text-[#6F7D93] hover:text-black-800"
                            onclick="toggleEdit()">
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>

                    <!-- Password with edit icon -->
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="m-[0_7.5px_0_0] break-words font-['Inter'] font-semibold text-[12px] text-[#6F7D93]">
                                {{__('Password')}}:
                            </h3>
                            <p id="passwordDisplay"
                                class="break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
                                ********
                            </p>
                            <input id="passwordInput" name="password" class="hidden border rounded p-1 text-[12px]"
                                type="password">
                        </div>
                        <button type="button" id="editPasswordBtn" class="text-[#6F7D93] hover:text-black-800"
                            onclick="toggleEdit()">
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>

                    <!-- Submit button -->
                    <div class="flex justify-center">
                        <button id="saveBtn"
                            class="hidden w-[70px] h-[40px] rounded-[8px] bg-[linear-gradient(90deg,#9EAFCE,#697C9B)] relative mt-5 p-2 box-sizing-border hover:bg-[linear-gradient(90deg,#697C9B,#9EAFCE)] transition duration-300 ease-in-out transform hover:scale-105"
                            type="submit">
                            <span
                                class="m-auto inline-block break-words font-['Inter'] font-medium text-[12px] text-[#FFFFFF]">{{__('Save')}}</span>
                        </button>
                    </div>
                </form>


            </div>
        </div>
    </div>


    </div>

    <!-- Modal structure -->
    <div id="userModal" class="fixed z-50 inset-0 flex items-center justify-center hidden bg-black bg-opacity-50">
        <form action="{{ route('Admin.users.store') }}" method="POST"
            class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full">
            @csrf
            <input type="hidden" name="residenceId" value="{{ $residence->id }}">
            <div class="flex justify-between items-center">
                <h2 class="text-lg text-[#3C4C7C] font-semibold">{{__('Ajouter utilisateur')}}</h2>
                <button type="button" id="closeModalBtn" class="text-gray-500 hover:text-gray-700">
                    &times;
                </button>
            </div>
            <div class="text-[#6F7D93] font-semibold my-[2.5rem]">
                <p>{{__('Résidence')}} {{ $residence->nomResidence }}</p>
            </div>
            <div class="mb-[2.5rem]">
                <div>
                    <label for="role" class="block text-sm text-[#6F7D93] font-semibold mb-2">{{__('Role')}}</label>
                    <select id="role" name="role"
                        class="border rounded-lg w-full py-2 px-3 text-gray-600 bg-[#f1f1f1] border-[#dce1e8]" required>
                        @foreach ($roles as $role)
                            <option value="{{ $role }}">{{ __($role) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-4">
                    <label for="email" class="block text-sm text-[#6F7D93] font-semibold mb-2">{{__('EnterUserEmail')}}</label>
                    <input type="email" id="email" name="email"
                        class="border rounded-lg w-full py-2 px-3 text-gray-600 bg-[#f1f1f1] border-[#dce1e8]"
                        placeholder="{{__('Exemple@synditchat.com')}}" required>
                </div>
            </div>
            <div class="mt-6">
                <button type="submit"
                    class="w-full bg-[#3C4C7C] hover:bg-[#3e569b] text-white py-1 px-6 rounded-full font-bold text-lg">{{__('Add')}}</button>
            </div>
        </form>
    </div>





    <!-- Modal structure -->
    <div id="AdminModal" class="fixed z-50 inset-0 flex items-center justify-center hidden bg-black bg-opacity-50">
        <form action="{{ route('Admin.users.store') }}" method="POST"
            class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full">
            @csrf
            <input type="hidden" name="role" value="Admin">
            <input type="hidden" name="residenceId" value="{{ $residence->id }}">
            <div class="flex justify-between items-center">
                <h2 class="text-lg text-[#3C4C7C] font-semibold">{{__('Ajouter Admin')}}</h2>
                <button type="button" id="closeModalBtnAdmin" class="text-gray-500 hover:text-gray-700 close-modal-btn">
                    &times;
                </button>
            </div>
            <div class="my-[2.5rem]">
                <label for="email" class="block text-sm text-[#6F7D93] font-semibold mb-2">{{__('EnterUserEmail')}}</label>
                <input type="email" id="email" name="email"
                    class="border rounded-lg w-full py-2 px-3 text-gray-600 bg-[#f1f1f1] border-[#dce1e8]"
                    placeholder="{{__('Exemple@synditchat.com')}}" required>
            </div>
            <div>
                <button type="submit"
                    class="w-full bg-[#3C4C7C] hover:bg-[#3e569b] text-white py-1 px-6 rounded-full font-bold text-lg">{{__('Add')}}</button>
            </div>
        </form>
    </div>




    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const openModalBtnUser = document.getElementById('openModalBtnUser');
            const openModalBtnAdmin = document.getElementById('openModalBtnAdmin');
            const closeModalBtn = document.getElementById('closeModalBtn');
            const closeModalBtnAdmin = document.getElementById('closeModalBtnAdmin');
            const cameraIcon = document.getElementById('cameraIcon');
            const imageUpload = document.getElementById('imageUpload');
            const saveBtn = document.getElementById('saveBtn');

            // Open user modal if button exists
            if (openModalBtnUser) {
                openModalBtnUser.addEventListener('click', function() {
                    document.getElementById('userModal').classList.remove('hidden');
                });
            }

            // Open Admin modal if button exists
            if (openModalBtnAdmin) {
                openModalBtnAdmin.addEventListener('click', function() {
                    document.getElementById('AdminModal').classList.remove('hidden');
                });
            }

            // Close user modal if button exists
            if (closeModalBtn) {
                closeModalBtn.addEventListener('click', function() {
                    document.getElementById('userModal').classList.add('hidden');
                });
            }

            // Close Admin modal if button exists
            if (closeModalBtnAdmin) {
                closeModalBtnAdmin.addEventListener('click', function() {
                    document.getElementById('AdminModal').classList.add('hidden');
                });
            }

            // Open image upload dialog if camera icon is clicked
            if (cameraIcon) {
                cameraIcon.addEventListener('click', function() {
                    imageUpload.click();
                });
            }

            // Preview uploaded image
            if (imageUpload) {
                imageUpload.addEventListener('change', function(event) {
                    previewImage(event);
                });
            }

            // Preview the uploaded image
            function previewImage(event) {
                const file = event.target.files[0];
                const allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
                const maxSize = 2 * 1024 * 1024; // 2MB

                if (file && allowedTypes.includes(file.type) && file.size <= maxSize) {
                    const reader = new FileReader();
                    reader.onload = function() {
                        document.getElementById('profileImage').src = reader.result;
                    };
                    reader.readAsDataURL(file);

                    if (saveBtn) {
                        saveBtn.classList.remove('hidden');
                    }
                } else {
                    alert('Please upload a valid image file (JPEG, PNG, GIF) smaller than 2MB.');
                }
            }
        });

        // Toggle edit mode for phone and password
        function toggleEdit() {
            let phoneDisplay = document.getElementById('phoneDisplay');
            let phoneInput = document.getElementById('phoneInput');
            let passwordDisplay = document.getElementById('passwordDisplay');
            let passwordInput = document.getElementById('passwordInput');
            let saveBtn = document.getElementById('saveBtn');

            let isEditing = phoneInput.classList.contains('hidden') && passwordInput.classList.contains('hidden');

            if (isEditing) {
                phoneDisplay.classList.add('hidden');
                phoneInput.classList.remove('hidden');
                passwordDisplay.classList.add('hidden');
                passwordInput.classList.remove('hidden');
                if (saveBtn) {
                    saveBtn.classList.remove('hidden');
                }
            } else {
                phoneDisplay.classList.remove('hidden');
                phoneInput.classList.add('hidden');
                passwordDisplay.classList.remove('hidden');
                passwordInput.classList.add('hidden');
                if (saveBtn) {
                    saveBtn.classList.add('hidden');
                }
            }
        }
    </script>
@endsection