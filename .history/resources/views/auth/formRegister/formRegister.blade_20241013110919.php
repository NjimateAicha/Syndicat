<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulaire d&#39;inscription</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="flex flex-col md:flex-row min-h-screen">
        <!-- Left Section -->
        <div class="w-full md:w-2/3 bg-gray-100 p-8 flex flex-col justify-between min-h-screen">
            <h1
                class="text-center mb-5 font-['Fredoka_One','Roboto_Condensed'] font-normal text-[48px] text-[#3C4C7C]  mt-8">
                {{ __('Remplir le Formulaire') }}
                </h1>
            <form class="space-y-4" action="{{ route('formRegister') }}" method="POST">
    @csrf <!-- This is necessary to avoid the 419 error -->
    <div class="flex space-x-4">
        <div class="w-1/2">
            <label class="block mb-1 font-['Inter'] font-medium text-[16px] text-[#6F7D93]">
                {{ __('Entrez Votre Prénom') }}
                
            </label>
            <input type="text" name="first_name" placeholder="Prénom"
                   value="{{ old('first_name') }}"
                   class="w-full h-16 px-6 py-2 border rounded-[25px] focus:outline-none focus:ring-2 focus:ring-indigo-700">
            @error('first_name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="w-1/2">
            <label class="block mb-1 font-['Inter'] font-medium text-[16px] text-[#6F7D93]">
                {{ __('Entrez Votre Nom') }}
              
            </label>
            <input type="text" name="last_name" placeholder="Nom"
                   value="{{ old('last_name') }}"
                   class="w-full h-16 px-6 py-2 border rounded-[25px] focus:outline-none focus:ring-2 focus:ring-indigo-700">
            @error('last_name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="flex space-x-4">
        <div class="w-1/2">
            <label class="block mb-1 font-['Inter'] font-medium text-[16px] text-[#6F7D93]">
                {{ __('Entrez Votre Numéro de téléphone') }}
                
            </label>
            <div class="flex items-center">
                <span class="p-3 flex items-center">🇲🇦</span>
                <input type="text" name="phone" placeholder="Numéro de téléphone"
                       value="{{ old('phone') }}"
                       class="w-full h-16 px-6 py-2 border rounded-[25px] focus:outline-none focus:ring-2 focus:ring-indigo-700">
            </div>
            @error('phone')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="w-1/2">
            <label class="block mb-1 font-['Inter'] font-medium text-[16px] text-[#6F7D93]">
                {{ __('Entrez Votre Adresse E-mail') }}
               
            </label>
            <input type="email" name="email" placeholder="Exemple@synditchat.com"
                   value="{{ old('email') }}"
                   class="w-full h-16 px-6 py-2 border rounded-[25px] focus:outline-none focus:ring-2 focus:ring-indigo-700">
            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="flex space-x-4">
        <div class="w-full">
            <label class="block mb-1 font-['Inter'] font-medium text-[16px] text-[#6F7D93]">
                {{ __('Entrez Votre Adresse') }}
               
            </label>
            <div class="flex space-x-2">
                <input type="text" name="address" placeholder="Nom du résidence, ville..."
                       value="{{ old('address') }}"
                       class="w-1/3 h-16 px-6 py-2 border rounded-[25px] focus:outline-none focus:ring-2 focus:ring-indigo-700">
                <input type="text" name="building_number" placeholder="Numéro d'immeuble"
                       value="{{ old('building_number') }}"
                       class="w-1/3 h-16 px-6 py-2 border rounded-[25px] focus:outline-none focus:ring-2 focus:ring-indigo-700">
                <input type="text" name="apartment_number" placeholder="Numéro d'appartement"
                       value="{{ old('apartment_number') }}"
                       class="w-1/3 h-16 px-6 py-2 border rounded-[25px] focus:outline-none focus:ring-2 focus:ring-indigo-700">
            </div>
            @error('address')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="flex items-center space-x-2">
        <input type="checkbox" name="terms" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
               {{ old('terms') ? 'checked' : '' }}> <!-- Retain old checkbox value -->
        <label class="text-gray-600">
            {{ __('J`accepte les Conditions d`utilisation et la Politique de confidentialité de Synditchat') }}
            </label>
        @error('terms')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="text-center">
        <button type="submit"
                class="text-white font-semibold py-2 px-4 hover:bg-[#3e569b] rounded-[40px] border border-[#9EAFCE] bg-[#3C4C7C] relative mx-auto mt-5 w-[300px]">
            <span class="break-words font-['Inter'] font-bold text-[20px] text-[#FFFFFF]">Envoyer</span>
        </button>
    </div>
</form>

            <div class="w-full flex flex-row justify-between mt-6">
                <div class="m-4 inline-block break-words font-['Inter'] font-normal text-[12px] text-[#9EAFCE]">
                    @if(!empty($appParameters->copyright))
                    
                        Copyrights © {{ $appParameters->copyright }}. All Rights Reserved.
                    @else
                        Copyrights © {{ date('Y') }}. All Rights Reserved.
                    @endif


                </div>
                <div class="flex flex-row box-sizing-border">
                    @if(!empty($appParameters->facebook_link))
                        <a href="{{ $appParameters->facebook_link }}"
                            class="rounded-[15px] bg-[#9EAFCE] relative m-[0_20px_0_0] flex p-[7px] w-[30px] h-[30px] box-sizing-border">
                            <i class="fa-brands fa-facebook text-white"></i>
                        </a>
                    @endif

                    @if(!empty($appParameters->instagram_link))
                        <a href="{{ $appParameters->instagram_link }}"
                            class="rounded-[15px] bg-[#9EAFCE] relative m-[0_20px_0_0] flex p-[7px] w-[30px] h-[30px] box-sizing-border">
                            <i class="fa-brands fa-instagram text-white"></i>
                        </a>
                    @endif

                    @if(!empty($appParameters->linkedin_link))
                        <a href="{{ $appParameters->linkedin_link }}"
                            class="rounded-[15px] bg-[#9EAFCE] relative m-[0_20px_0_0] flex p-[7px] w-[30px] h-[30px] box-sizing-border">
                            <i class="fa-brands fa-linkedin text-white"></i>
                        </a>
                    @endif

                    @if(!empty($appParameters->twitter_link))
                        <a href="{{ $appParameters->twitter_link }}"
                            class="rounded-[15px] bg-[#9EAFCE] relative m-[0_20px_0_0] flex p-[7px] w-[30px] h-[30px] box-sizing-border">
                            <i class="fa-brands fa-twitter text-white"></i>
                        </a>
                    @endif
                </div>

            </div>
        </div>

        <!-- Right Section -->
        <div class="w-full md:w-1/3 bg-[#7d8fae] text-white flex flex-col justify-center items-center text-center p-8">
            <div class="absolute top-5 right-5">
                <form action="{{ route('locale.change') }}" method="POST" class="inline-block">
                    @csrf
                    <select name="locale" onchange="this.form.submit()" class="border border-gray-300 rounded-md py-1 px-2 bg-white text-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-transparent text-sm">
                        <option value="en"{{ app()->getLocale() == 'en' ? ' selected' : '' }}>En</option>
                        <option value="fr"{{ app()->getLocale() == 'fr' ? ' selected' : '' }}>Fr</option>
                    </select>
                </form>
            </div>
            <div class="text-center space-y-6">
                
                
                
                <h2 class="font-bold mb-4 text-[48px]">{{ $appParameters->app_name ?? '' }}</h2>
            
                <p class="mb-8">
                    {{ __('votre solution complète pour la gestion de copropriété, assurant conformité,transparence et communication fluide') }}
                    </p>
                <div class="w-80 h-auto mx-auto">
                    <img src="{{ asset('assets/images/build_your_home_amico_11.png') }}" alt="Illustration">
                </div>
                <p class="mb-8">

                    {{ __('Si vous avez déjà un compte, connectez-vous maintenant et profitez pleinement de tous les avantages de SynditChat!') }}
                    </p>
                <button
                    class="bg-[#F7F7F7] text-[#7d8fae] py-3 px-6 rounded-full font-bold text-xl hover:bg-[#cbc9c9]">
                    <a href="{{ route('login') }}">

                        {{ __('Se connecter') }}
                       </a>
                </button>
            </div>
        </div>
    </div>

    <!-- Modal Structure -->
    <div id="successModal" class="fixed z-50 inset-0 flex items-center justify-center hidden bg-black bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full">
            <div class="flex justify-between items-center">
                <h2 class="text-lg text-[#3C4C7C] font-semibold">
                    {{ __('Félécitation !') }}
                    </h2>
                <button type="button" id="closeModalBtn" class="text-gray-500 hover:text-gray-700 close-modal-btn"
                    aria-label="Close">
                    &times;
                </button>
            </div>
            <div class="my-[2.5rem]">
                <p class="block text-sm text-[#6F7D93] font-semibold mb-2">
                    {{ __(' Votre formulaire a été soumis avec succès. Nous vous remercions pour votre inscription.
                     Notre équipe examinera vos informations et vous contactera dans les plus brefs délais pour finaliser votre enregistrement.
                     Bienvenue parmi nous!') }}
                  </p>
            </div>
            <div>
                <button type="button" id="closeModalBtnFooter"
                    class="w-full bg-[#3C4C7C] hover:bg-[#3e569b] text-white py-1 px-6 rounded-full font-bold text-lg">Ok</button>
            </div>
        </div>
    </div>

    <script>
        // Check if the session has a 'success' message and trigger the modal
        @if (session('success'))
            document.getElementById('successModal').classList.remove('hidden');
        @endif

        // Get modal and close button elements
        var successModal = document.getElementById('successModal');
        var closeModalBtn = document.getElementById('closeModalBtn');
        var closeModalBtnFooter = document.getElementById('closeModalBtnFooter');

        // Close modal when clicking the close button in the header
        closeModalBtn.addEventListener('click', function() {
            successModal.classList.add('hidden');
        });

        // Close modal when clicking the close button in the footer
        closeModalBtnFooter.addEventListener('click', function() {
            successModal.classList.add('hidden');
        });

        // Close modal when clicking outside the modal content (overlay area)
        window.addEventListener('click', function(e) {
            if (e.target === successModal) {
                successModal.classList.add('hidden');
            }
        });
    </script>
</body>

</html>
