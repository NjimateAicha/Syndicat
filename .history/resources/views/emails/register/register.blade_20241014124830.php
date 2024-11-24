<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulaire d'inscription</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body class="bg-[#F7F7F7] flex flex-col items-center min-h-screen">
    <div class="w-full flex justify-end">
        <div class="absolute top-5 right-5">
            <form action="{{ route('locale.change') }}" method="POST" class="inline-block">
                @csrf
                <select name="locale" onchange="this.form.submit()" class="border border-gray-300 rounded-md py-1 px-2 bg-white text-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-transparent text-sm">
                    <option value="en"{{ app()->getLocale() == 'en' ? ' selected' : '' }}>En</option>
                    <option value="fr"{{ app()->getLocale() == 'fr' ? ' selected' : '' }}>Fr</option>
                </select>
            </form>
        </div>
    </div>
    <div class="w-3/4 max-w-6xl p-8"> {{-- bg-white rounded-lg shadow-lg --}}
        {{-- <h2 class="text-center mb-8 font-['Fredoka_One','Roboto_Condensed'] font-normal text-[48px] text-[#3C4C7C]">
            Bienvenue chez Synditchat
        </h2> --}}
        @if (isset($appParameters))
             <h2 class="text-center mb-8 font-['Fredoka_One','Roboto_Condensed'] font-normal text-[48px] text-[#3C4C7C]">
                {{ $appParameters->app_name ?? '' }}</h2>
           @endif
        <div class="flex items-center justify-center mb-8">
            
            <img src="{{ asset('assets/images/avatar.png')?? 'https://via.placeholder.com/60' }}" alt="User Profile"
                class="h-24 w-24 rounded-full border-2 mr-6">
            <div class="text-gray-700 font-['Fredoka_One','Roboto_Condensed'] font-normal text-[14px] leading-[1.786]">
                @if (in_array($role, ['Résident', 'Manager', 'Manager principal']))
                    <p><strong> {{ __ }}Résidence :</strong> {{ $residence->nomResidence }}</p>
                @endif
                <p><strong>Rôle :</strong> {{ $role }}</p>
                <p><strong>Email :</strong> {{ $email }}</p>
            </div>
        </div>

        <form action="{{ route('register.user.store') }}" method="POST" class="flex flex-col space-y-4">
            @csrf
            <!-- Hidden inputs to handle role and email -->
            <input type="hidden" name="email" value="{{ $email }}">
            <input type="hidden" name="role" value="{{ $role }}">
            <input type="hidden" name="token" value="{{ $token }}">
            @if (in_array($role, ['Résident','Propriétaire', 'Manager', 'Manager principal','Admin']))
                <input type="hidden" name="residence_id" value="{{ $residence->id }}">
            @endif

            <div class="flex flex-col sm:flex-row sm:space-x-10" style="margin-bottom: 0.5rem;">
                <div class="flex-1 flex flex-col">
                    <span class="mb-2 font-['Inter'] font-medium text-[16px] text-[#6F7D93]">
                        Entrez Votre Prénom
                    </span>
                    <div
                        class="flex items-center border rounded-[20px] focus:outline-none focus:ring-2 focus:ring-indigo-700">
                        <input type="text" name="prenom" placeholder="Prénom"
                            class="w-full h-12 px-4 py-2 border rounded-[20px] focus:outline-none focus:ring-2 focus:ring-indigo-700">
                        <i class="fa-solid fa-user text-gray-400 mr-3 ml-3"></i>
                    </div>
                </div>
                <div class="flex-1 flex flex-col">
                    <span class="mb-2 font-['Inter'] font-medium text-[16px] text-[#6F7D93]">
                        Entrez Votre Nom
                    </span>
                    <div
                        class="flex items-center border rounded-[20px] focus:outline-none focus:ring-2 focus:ring-indigo-700">
                        <input type="text" name="nom" placeholder="Nom"
                            class="w-full h-12 px-4 py-2 border rounded-[20px] focus:outline-none focus:ring-2 focus:ring-indigo-700">
                        <i class="fa-solid fa-user text-gray-400 mr-3 ml-3"></i>
                    </div>

                </div>
            </div>

            <div class="flex flex-col space-y-4 sm:space-y-0" style="margin-bottom: 0.5rem;">
                <span class="mb-2 font-['Inter'] font-medium text-[16px] text-[#6F7D93]">
                    Entrez Votre Numéro de téléphone
                </span>
                <div class="flex flex-col sm:flex-row sm:space-x-10 space-y-4 sm:space-y-0">
                    <div class="flex-1 flex flex-col">
                        <div
                            class="flex items-center border rounded-[20px] focus:outline-none focus:ring-2 focus:ring-indigo-700">
                            <img src="https://flagcdn.com/w320/ma.png" alt="Moroccan flag" class="h-5 w-7 ml-3">
                            <input type="text" name="telephone" placeholder="Numéro de téléphone"
                                class="w-full h-12 px-4 py-2 border-0 rounded-[20px] focus:outline-none">
                            <i class="fas fa-phone text-gray-400 mr-3 ml-3"></i>
                        </div>
                    </div>

                    <div class="flex-1 flex flex-col sm:flex-row sm:space-x-10 space-y-4 sm:space-y-0">
                        <div class="flex-1 flex flex-col">
                            <input type="text" name="immeuble" placeholder="Numéro d'immeuble"
                                class="w-full h-12 px-4 py-2 border rounded-[20px] focus:outline-none focus:ring-2 focus:ring-indigo-700">
                        </div>
                        <div class="flex-1 flex flex-col">
                            <input type="text" name="appartement" placeholder="Numéro d'appartement"
                                class="w-full h-12 px-4 py-2 border rounded-[20px] focus:outline-none focus:ring-2 focus:ring-indigo-700">
                        </div>
                    </div>
                </div>

            </div>

            <div class="flex flex-col space-y-4 sm:space-y-0" style="margin-bottom: 0.5rem;">
                <span class="mb-2 font-['Inter'] font-medium text-[16px] text-[#6F7D93]">
                    Entrez Votre Mot de Passe
                </span>
                <div class="flex flex-col sm:flex-row sm:space-x-10 space-y-4 sm:space-y-0">
                    <div class="flex-1 flex flex-col">
                        <div class="flex items-center border rounded-[20px] focus:outline-none focus:ring-2 focus:ring-indigo-700">
                            <input type="password" name="password" placeholder="Mot de passe"
                            class="w-full h-12 px-4 py-2 border rounded-[20px] focus:outline-none focus:ring-2 focus:ring-indigo-700">
                            <i class="fa-solid fa-lock text-gray-400 mr-3 ml-3"></i>
                        </div>
                        
                    </div>
                    <div class="flex-1 flex flex-col">
                        <div class="flex items-center border rounded-[20px] focus:outline-none focus:ring-2 focus:ring-indigo-700">
                            <input type="password" name="password_confirmation" placeholder="Confirmer mot de passe"
                            class="w-full h-12 px-4 py-2 border rounded-[20px] focus:outline-none focus:ring-2 focus:ring-indigo-700">
                            <i class="fa-solid fa-lock text-gray-400 mr-3 ml-3"></i>
                        </div>
                        
                    </div>
                </div>
            </div>


            <div class="text-center mt-8">
                <button type="submit"
                    class="text-white font-semibold py-2 px-4 hover:bg-[#3e569b] rounded-[40px] border border-[#9EAFCE] bg-[#3C4C7C] relative mx-auto mt-5 w-[300px]">
                    <span class="break-words font-['Inter'] font-bold text-[20px] text-[#FFFFFF]">
                        Confirmer
                    </span>
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
</body>

</html>
