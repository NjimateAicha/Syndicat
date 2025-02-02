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
        <!-- Right Section (Login Form) - Now appears first -->
        <div class="w-full md:w-1/3 bg-[#F7F7F7] p-6 md:p-8 flex flex-col justify-center items-center">
            <div class="absolute top-5 right-5">
                <form action="{{ route('locale.change') }}" method="POST" class="inline-block">
                    @csrf
                    <select name="locale" onchange="this.form.submit()" 
                            class="border border-gray-300 rounded-md py-1 px-2 bg-white text-gray-700 
                                   focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-transparent text-sm">
                        <option value="en"{{ app()->getLocale() == 'en' ? ' selected' : '' }}>En</option>
                        <option value="fr"{{ app()->getLocale() == 'fr' ? ' selected' : '' }}>Fr</option>
                    </select>
                </form>
            </div>

            <h2 class="text-3xl md:text-4xl font-bold mb-8 font-['Fredoka_One','Roboto_Condensed'] text-[#3C4C7C]">
                {{ __('Se Connecter') }}
            </h2>

            <form class="space-y-4 w-full max-w-md" action="{{ route('login') }}" method="POST">
                @csrf
                <div>
                    <label class="block mb-1 font-['Inter'] text-sm md:text-lg text-[#6F7D93]">
                        {{ __('Entrez Votre E-mail') }}</label>
                    <div class="flex items-center border rounded-[80px]">
                        <x-text-input id="email" class="focus:ring-indigo-700 max-w-full" type="email" name="email"
                                      :value="old('email')" required autofocus autocomplete="username"
                                      placeholder="Exemple@synditchat.com" />
                        <i class="fa-solid fa-envelope ml-1 pr-2 h-4"></i>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div>
                    <label class="block mb-1 font-['Inter'] text-sm md:text-lg text-[#6F7D93]">
                        {{ __('Entrez Votre Mot de passe') }}</label>
                    <div class="flex items-center border rounded-[80px]">
                        <x-text-input id="password" class="focus:ring-indigo-700 max-w-full" type="password"
                                      name="password" required autocomplete="current-password"
                                      placeholder="Mot de passe" />
                        <i class="fa-solid fa-lock ml-1 pr-2 h-4"></i>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <input id="remember_me" type="checkbox"
                               class="h-6 w-6 rounded-[25px] text-[#3C4C7C] font-semibold focus:ring-blue-500 border-[#3C4C7C]"
                               name="remember">
                        <label for="remember_me" class="text-gray-600">{{ __('Restez connecté') }}</label>
                    </div>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                           class="break-words font-['Inter'] font-medium text-sm md:text-lg text-[#3C4C7C]">
                            {{ __('Mot de passe oublié ?') }}
                        </a>
                    @endif
                </div>

                <div>
                    <button type="submit"
                            class="w-full bg-[#3C4C7C] hover:bg-[#3e569b] text-white py-3 px-6 rounded-full font-bold text-lg md:text-xl">
                        {{ __('Connexion') }}
                    </button>
                </div>
            </form>

            <!-- Registration Button (just after login) -->
            <div class="mt-6">
                <button class="bg-[#F7F7F7] text-[#7d8fae] py-3 px-6 md:px-8 rounded-full font-bold text-lg md:text-xl hover:bg-[#cbc9c9]">
                    <a href="{{ route('formRegister') }}"> {{ __('Remplir le formulaire') }}</a>
                </button>
            </div>
        </div>

        <!-- Left Section (Introduction/Images/Description) -->
        <div class="w-full md:w-2/3 flex flex-col md:flex-row bg-[#7d8fae] p-6 md:p-10 space-y-8 md:space-y-0 md:space-x-8">
            <div class="flex-1 flex flex-col items-center text-center md:text-left space-y-6 mt-9 mr-5">
                @if (isset($appParameters))
                    <h2 class="text-2xl md:text-4xl font-bold text-white">{{ $appParameters->app_name ?? '' }}</h2>
                @endif
                <p class="text-base md:text-lg text-white text-center py-12 font-['Fredoka_One','Roboto_Condensed']">
                    {{ __('Votre solution complète pour la gestion de copropriété...') }}
                </p>
                <div class="w-full md:w-80 h-auto">
                    <img src="{{ asset('assets/images/neighbours_on_balconies_or_windows_during_coronavirus_rafiki_1.png') }}" 
                         alt="Illustration" 
                         class="max-w-full h-auto">
                </div>

                <!-- Original Registration Button Position -->
                <div class="mt-6">
                    <button class="bg-[#F7F7F7] text-[#7d8fae] py-3 px-6 md:px-8 rounded-full font-bold text-lg md:text-xl hover:bg-[#cbc9c9]">
                        <a href="{{ route('formRegister') }}"> {{ __('Remplir le formulaire') }}</a>
                    </button>
                </div>

                <div class="m-4 text-[12px] text-[#9EAFCE]">
                    @if(!empty($appParameters->copyright))
                        Copyrights © {{ $appParameters->copyright }}. All Rights Reserved.
                    @else
                        Copyrights © {{ date('Y') }}. All Rights Reserved.
                    @endif
                </div>
            </div>

            <div class="flex-1 flex flex-col items-center text-center md:text-left space-y-6">
                <div class="w-full md:w-80 h-auto">
                    <img src="{{ asset('assets/images/build_your_home_amico_11.png') }}" alt="Illustration" class="max-w-full h-auto">
                </div>
                <p class="text-base md:text-lg text-white text-center py-12 font-['Fredoka_One','Roboto_Condensed']">
                    {{ __('Si vous n`avez pas de compte, remplissez dès maintenant le formulaire d`inscription et simplifiez la gestion de votre copropriété') }}
                </p>
                <div class="flex flex-row box-sizing-border">
                    @if(!empty($appParameters->facebook_link))
                        <a href="{{ $appParameters->facebook_link }}"
                            class="rounded-[15px] bg-[#9EAFCE] relative m-[0_20px_0_0] flex p-[7px] w-[20px] md:w-[30px] h-[20px] md:h-[30px] box-sizing-border">
                            <i class="fa-brands fa-facebook text-white"></i>
                        </a>
                    @endif
                    @if(!empty($appParameters->instagram_link))
                        <a href="{{ $appParameters->instagram_link }}"
                            class="rounded-[15px] bg-[#9EAFCE] relative m-[0_20px_0_0] flex p-[7px] w-[20px] md:w-[30px] h-[20px] md:h-[30px] box-sizing-border">
                            <i class="fa-brands fa-instagram text-white"></i>
                        </a>
                    @endif
                    @if(!empty($appParameters->linkedin_link))
                        <a href="{{ $appParameters->linkedin_link }}"
                            class="rounded-[15px] bg-[#9EAFCE] relative m-[0_20px_0_0] flex p-[7px] w-[20px] md:w-[30px] h-[20px] md:h-[30px] box-sizing-border">
                            <i class="fa-brands fa-linkedin text-white"></i>
                        </a>
                    @endif
                    @if(!empty($appParameters->twitter_link))
                        <a href="{{ $appParameters->twitter_link }}"
                            class="rounded-[15px] bg-[#9EAFCE] relative m-[0_20px_0_0] flex p-[7px] w-[20px] md:w-[30px] h-[20px] md:h-[30px] box-sizing-border">
                            <i class="fa-brands fa-twitter text-white"></i>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div id="errorModal" class="fixed z-50 inset-0 flex items-center justify-center hidden bg-black bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full relative">
            <div class="flex justify-between items-center">
                <h2 class="text-lg text-[#3C4C7C] font-semibold">{{ __('Erreur de connexion') }}</h2>
                <button type="button" id="closeModalBtn" class="text-gray-500 hover:text-gray-700 close-modal-btn"
                    aria-label="Close">&times;</button>
            </div>
            <div class="my-[2.5rem]">
                @if ($errors->has('residenceInactive'))
                    <p class="text-sm text-[#6F7D93]">
                        {{ __('Votre compte résidence est actuellement inactif...') }}
                    </p>
                @endif
            </div>
            <div>
                <button type="button" id="closeModalBtnFooter"
                        class="w-full bg-[#3C4C7C] hover:bg-[#3e569b] text-white py-1 px-6 rounded-full font-bold text-lg">OK</button>
            </div>
        </div>
    </div>

    <script>
        @if ($errors->has('residenceInactive'))
            document.getElementById('errorModal').classList.remove('hidden');
        @endif

        var errorModal = document.getElementById('errorModal');
        var closeModalBtn = document.getElementById('closeModalBtn');
        var closeModalBtnFooter = document.getElementById('closeModalBtnFooter');

        closeModalBtn.addEventListener('click', function() {
            errorModal.classList.add('hidden');
        });

        closeModalBtnFooter.addEventListener('click', function() {
            errorModal.classList.add('hidden');
        });

        window.addEventListener('click', function(e) {
            if (e.target === errorModal) {
                errorModal.classList.add('hidden');
            }
        });
    </script>

</body>
</html>

