<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="flex flex-col md:flex-row min-h-screen">
        <!-- Left Section -->
        <div class="w-2/3 flex flex-col md:flex-row bg-[#7d8fae] p-10 space-y-8 md:space-y-0 md:space-x-8">
            <!-- Left Section -->
            <div class="flex-1 flex flex-col items-center text-center md:text-left space-y-6 mt-9 mr-5">
               
                @if (isset($appParameters))
            
           
             <h2 class="text-4xl font-bold text-white">{{ $appParameters->app_name ?? '' }}</h2>
                @endif
                <p
                    class="text-lg text-white text-center py-12 font-['Fredoka_One','Roboto_Condensed'] font-normal text-[30px]">
                  
                    {{__('Votre solution complète pour la gestion de copropriété, assurant conformité, transparence et
                    communication fluide')}}
                </p>
                <div class="w-80 h-auto">
                    <img src="{{ asset('assets/images/neighbours_on_balconies_or_windows_during_coronavirus_rafiki_1.png') }}"
                        alt="Illustration">
                </div>
            </div>

            <!-- Right Section -->
            <div class="flex-1 flex flex-col items-center text-center md:text-left space-y-6">
                <div class="w-80 h-auto">
                    <img src="{{ asset('assets/images/build_your_home_amico_11.png') }}" alt="Illustration">
                </div>
                <p
                    class="text-lg text-white text-center py-12 font-['Fredoka_One','Roboto_Condensed'] font-normal text-[30px]">
                    
                    {{__('Si vous n'avez pas de compte, remplissez dès maintenant le formulaire d'inscription et simplifiez la
                    gestion de votre copropriété') }}
                </p>
                <button class="bg-[#F7F7F7] text-[#7d8fae] py-3 px-6 rounded-full font-bold text-xl hover:bg-[#cbc9c9]">
                    <a href="{{ route('formRegister') }}"> {{ __('Remplir le formulaire') }}</a>
                </button>
            </div>
            {{-- <div class="w-full flex flex-row justify-between mt-6">
                <div class="m-4 inline-block break-words font-['Inter'] font-normal text-[12px] text-[#9EAFCE]">
                    Copyrights © 2024, Synditchat. All Rights Reserved.
                </div>
                <div class="flex flex-row box-sizing-border">
                    <div
                        class="rounded-[15px] bg-[#9EAFCE] relative m-[0_20px_0_0] flex p-[7px_7px_7px_7px] w-[30px] h-[30px] box-sizing-border">
                        <i class="fa-brands fa-facebook text-white"></i>
                    </div>
                    <div
                        class="rounded-[15px] bg-[#9EAFCE] relative m-[0_20px_0_0] flex p-[7px_7px_7px_7px] w-[30px] h-[30px] box-sizing-border">
                        <i class="fa-brands fa-instagram text-white"></i>
                    </div>
                    <div
                        class="rounded-[15px] bg-[#9EAFCE] relative m-[0_20px_0_0] flex p-[7px_7px_7px_7px] w-[30px] h-[30px] box-sizing-border">
                        <i class="fa-brands fa-linkedin text-white"></i>
                    </div>
                    <div
                        class="rounded-[15px] bg-[#9EAFCE] relative m-[0_20px_0_0] flex p-[7px_7px_7px_7px] w-[30px] h-[30px] box-sizing-border">
                        <i class="fa-brands fa-twitter text-white"></i>
                    </div>
                    <div
                        class="rounded-[15px] bg-[#9EAFCE] relative m-[0_20px_0_0] flex p-[7px_7px_7px_7px] w-[30px] h-[30px] box-sizing-border">
                        <i class="fa-brands fa-whatsapp text-white"></i>
                    </div>
                </div>
            </div> --}}
        </div>



        <!-- Right Section -->
        <div class="w-full md:w-1/3 bg-[#F7F7F7] p-8 flex flex-col justify-center items-center">
            <div class="absolute top-5 right-5">
                <form action="{{ route('locale.change') }}" method="POST" class="inline-block">
                    @csrf
                    <select name="locale" onchange="this.form.submit()" class="border border-gray-300 rounded-md py-1 px-2 bg-white text-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-transparent text-sm">
                        <option value="en"{{ app()->getLocale() == 'en' ? ' selected' : '' }}>En</option>
                        <option value="fr"{{ app()->getLocale() == 'fr' ? ' selected' : '' }}>Fr</option>
                    </select>
                </form>
            </div>
            
            <h2
                class="text-4xl font-bold mb-8 
            font-['Fredoka_One','Roboto_Condensed'] text-[48px] text-[#3C4C7C]">
            {{ __('Se Connecter') }}
            </h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form class="space-y-4 w-full max-w-md" action="{{ route('login') }}" method="POST">
                @csrf
                <div>
                    <label
                        class="block mb-1
                    font-['Inter'] font-medium text-[16px] text-[#6F7D93]">  {{ __('') }}</label>
                    <div class="flex items-center border rounded-[80px]">
                        <x-text-input id="email" class="focus:ring-indigo-700" type="email" name="email"
                            :value="old('email')" required autofocus autocomplete="username"
                            placeholder="Exemple@synditchat.com" />
                        <i class="fa-solid fa-envelope ml-1 pr-2 h-4 w-auto"></i>

                    </div>
                    <!-- Email Error -->
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="h-[3%]"></div>
                <div>
                    <label
                        class="block mb-1
                    font-['Inter'] font-medium text-[16px] text-[#6F7D93]">Entrez
                        Votre Mot de passe</label>
                    <div class="flex items-center border rounded-[80px]">
                        <x-text-input id="password" class="focus:ring-indigo-700" type="password" name="password"
                            required autocomplete="current-password" placeholder="Mot de passe" />
                        <i class="fa-solid fa-lock ml-1 pr-2 h-4 w-auto"></i>
                    </div>
                    <!-- Password Error -->
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="h-[0.5%]"></div>
                <div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <input id="remember_me" type="checkbox"
                                class="h-6 w-6 rounded-[25px] text-[#3C4C7C] font-semibold focus:ring-blue-500 border-[#3C4C7C]"
                                name="remember">
                            <label for="remember_me" class="text-gray-600">Restez connecté</label>
                        </div>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                                class="break-words font-['Inter'] font-medium text-[16px] text-[#3C4C7C]">Mot de passe
                                oublié ?</a>
                        @endif
                    </div>
                    <div class="mb-22 p-20">
                        <button type="submit"
                            class="w-full bg-[#3C4C7C] hover:bg-[#3e569b] text-white
                                py-3 px-6 rounded-full font-bold text-xl">Connexion</button>
                    </div>

            </form>
        </div>
    </div>


    <!-- Modal Structure -->
    <div id="errorModal" class="fixed z-50 inset-0 flex items-center justify-center hidden bg-black bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full relative">
            <div class="flex justify-between items-center">
                <h2 class="text-lg text-[#3C4C7C] font-semibold">Login Error</h2>
                <button type="button" id="closeModalBtn" class="text-gray-500 hover:text-gray-700 close-modal-btn"
                    aria-label="Close">
                    &times;
                </button>
            </div>
            <div class="my-[2.5rem]">
                <!-- Display the custom residence inactive error -->
                @if ($errors->has('residenceInactive'))
                    {{-- <p class="text-sm text-[#6F7D93]">{{ $errors->first('residenceInactive') }}</p> --}}
                    {{-- <p class="text-sm text-[#6F7D93]">Your residence account is currently inactive, and you're unable to log in. Please contact the residence staff for further information.</p> --}}
                    <p class="text-sm text-[#6F7D93]">Votre compte résidence est actuellement inactif et vous ne pouvez pas vous connecter. Veuillez contacter le personnel de votre résidence pour plus d'informations.</p>
                @endif
            </div>
            <div>
                <button type="button" id="closeModalBtnFooter"
                    class="w-full bg-[#3C4C7C] hover:bg-[#3e569b] text-white py-1 px-6 rounded-full font-bold text-lg">OK</button>
            </div>
        </div>
    </div>

    <script>
        // Check if there are any custom errors and trigger the modal
        @if ($errors->has('residenceInactive'))
            document.getElementById('errorModal').classList.remove('hidden');
        @endif

        // Get modal and close button elements
        var errorModal = document.getElementById('errorModal');
        var closeModalBtn = document.getElementById('closeModalBtn');
        var closeModalBtnFooter = document.getElementById('closeModalBtnFooter');

        // Close modal when clicking the close button in the header
        closeModalBtn.addEventListener('click', function() {
            errorModal.classList.add('hidden');
        });

        // Close modal when clicking the close button in the footer
        closeModalBtnFooter.addEventListener('click', function() {
            errorModal.classList.add('hidden');
        });

        // Close modal when clicking outside the modal content (overlay area)
        window.addEventListener('click', function(e) {
            if (e.target === errorModal) {
                errorModal.classList.add('hidden');
            }
        });
    </script>


</body>

</html>
