{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="nom" :value="__('nom')" />
            <x-text-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required autofocus autocomplete="nom" />
            <x-input-error :messages="$errors->get('nom')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

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
</head>

<body>
    <div class="bg-[#F7F7F7] flex flex-col items-end p-[80px_30px_15px_30px] w-[1512px] box-sizing-border">
        <img class="rotate-[-179.972deg] absolute top-[0px] right-[0px] w-[507px] h-[982px]"
            src="../assets/vectors/rectangle_16_x2.svg" />
        <div
            class="relative m-[0_0_14.5px_148.2px] flex flex-row justify-between self-center w-[1057.5px] box-sizing-border">
            <div
                class="m-[24px_28px_0_0] inline-block w-[1005px] break-words font-['Fredoka_One','Roboto_Condensed'] font-normal text-[48px] text-[#3C4C7C]">
                Remplir le Formulaire
            </div>
            <div
               
                Synditchat
                   
                @if (isset($appParameters))
                <h2 class="text-4xl font-bold text-white">{{ $appParameters->app_name ?? '' }}</h2>
                 @endif
            </div>
        </div>
        <div
            class="relative m-[0_28.2px_29px_28.2px] inline-block text-center break-words font-['Fredoka_One','Roboto_Condensed'] font-normal text-[20px] text-[#F7F7F7]">
            votre solution complète pour la gestion de copropriété, assurant conformité, transparence et communication
            fluide
        </div>
        <div class="relative m-[0_48px_34.5px_43px] flex flex-row w-[fit-content] box-sizing-border">
            <div class="m-[0_151px_1px_0] flex flex-col box-sizing-border">
                <div class="m-[0_0_10.5px_0] flex flex-row justify-between self-start w-[594.5px] box-sizing-border">
                    <span
                        class="m-[0_9.5px_0_0] w-[239px] break-words font-['Inter'] font-medium text-[16px] text-[#6F7D93]">
                        Entrez Votre Prénom
                    </span>
                    <span class="break-words font-['Inter'] font-medium text-[16px] text-[#6F7D93]">
                        Entrez Votre Nom
                    </span>
                </div>
                <div class="m-[0_0_50.5px_0] flex flex-row w-[860px] box-sizing-border">
                    <div
                        class="rounded-[20px] border-[1px_solid_#9EAFCE] bg-[#FFFFFF] relative m-[0_60px_0_0] flex flex-row justify-between p-[18px_20px_18px_30px] w-[400px] box-sizing-border">
                        <div
                            class="m-[2.5px_9.5px_2.5px_0] inline-block w-[239px] break-words font-['Inter'] font-normal text-[16px] text-[#A2A2A2]">
                            <input
                                class="m-[2.5px_9.5px_2.5px_0] inline-block w-[239px] break-words font-['Inter'] font-normal text-[16px] text-[#000000]"
                                placeholder="Prénom">
                        </div>
                        <div
                            class="bg-[url('../assets/images/user_112.png')] bg-[50%_50%] bg-cover bg-no-repeat w-[24px] h-[24px]">
                        </div>
                    </div>
                    <div
                        class="rounded-[20px] border-[1px_solid_#9EAFCE] bg-[#FFFFFF] relative flex flex-row justify-between p-[18px_20px_18px_30px] w-[400px] box-sizing-border">
                        <div
                            class="m-[2.5px_9.5px_2.5px_0] inline-block w-[239px] break-words font-['Inter'] font-normal text-[16px] text-[#A2A2A2]">
                            <input
                                class="m-[2.5px_9.5px_2.5px_0] inline-block w-[239px] break-words font-['Inter'] font-normal text-[16px] text-[#000000]"
                                placeholder="Nom">
                        </div>
                        <div
                            class="bg-[url('../assets/images/user_112.png')] bg-[50%_50%] bg-cover bg-no-repeat w-[24px] h-[24px]">
                        </div>
                    </div>
                </div>
                <div class="m-[0_0_10.5px_0] flex flex-row justify-between self-start w-[674.2px] box-sizing-border">
                    <span
                        class="m-[0_9.5px_0_0] w-[331px] break-words font-['Inter'] font-medium text-[16px] text-[#6F7D93]">
                        Entrez Votre Numéro de téléphone
                    </span>
                    <span class="break-words font-['Inter'] font-medium text-[16px] text-[#6F7D93]">
                        Entrez Votre Adresse E-mail
                    </span>
                </div>
                <div class="m-[0_0_50.5px_0] flex flex-row w-[860px] box-sizing-border">
                    <div
                        class="rounded-[20px] border-[1px_solid_#9EAFCE] bg-[#FFFFFF] relative m-[0_60px_0_0] flex flex-row justify-between p-[0_20px_0_10px] w-[400px] box-sizing-border">
                        <div class="flex flex-row w-[67px] box-sizing-border">
                            <div class="bg-[url('../assets/images/r_21.jpeg')] m-[15px_0_15px_0] w-[42px] h-[30px]">
                            </div>
                            <div
                                class="bg-[url('../assets/images/down_arrow_1.png')] bg-[50%_50%] bg-cover bg-no-repeat m-[25px_4px_15px_0] w-[20px] h-[20px]">
                            </div>
                            <input type="number"
                                class="m-[2.5px_9.5px_2.5px_0] inline-block w-[239px] break-words font-['Inter'] font-normal text-[16px] text-[#000000] [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                                placeholder="">
                        </div>
                        <div
                            class="bg-[url('../assets/images/telephone_41.png')] bg-[50%_50%] bg-cover bg-no-repeat m-[18px_0_18px_0] w-[24px] h-[24px]">
                        </div>
                    </div>
                    <div
                        class="rounded-[20px] border-[1px_solid_#9EAFCE] bg-[#FFFFFF] relative flex flex-row justify-between p-[18px_20px_18px_30px] w-[400px] box-sizing-border">
                        <div
                            class="m-[2.5px_9.5px_2.5px_0] inline-block w-[239px] break-words font-['Inter'] font-normal text-[16px] text-[#A2A2A2]">
                            <input type="email"
                                class="m-[2.5px_9.5px_2.5px_0] inline-block w-[239px] break-words font-['Inter'] font-normal text-[16px] text-[#000000]"
                                placeholder="Exemple@synditchat.com">
                        </div>
                        <div
                            class="bg-[url('../assets/images/mail_3.png')] bg-[50%_50%] bg-cover bg-no-repeat w-[24px] h-[24px]">
                        </div>
                    </div>
                </div>
                <div
                    class="m-[0_0_10.5px_0] inline-block self-start break-words font-['Inter'] font-medium text-[16px] text-[#6F7D93]">
                    Entrez Votre Adresse
                </div>
                <div class="flex flex-row gap-[0_25px] w-[fit-content] box-sizing-border">
                    <div
                        class="rounded-[20px] border-[1px_solid_#9EAFCE] bg-[#FFFFFF] relative p-[20.5px_30px_20.5px_30px] w-[370px] box-sizing-border">
                        <input class="break-words font-['Inter'] font-normal text-[16px] text-[#000000]" placeholder="Nom du résidence,ville...">
                    </div>
                    <div
                        class="rounded-[20px] border-[1px_solid_#9EAFCE] bg-[#FFFFFF] relative flex p-[20.5px_19.5px_20.5px_0] w-[220px] box-sizing-border">
                        <input class="break-words font-['Inter'] font-normal text-[16px] text-[#000000]" placeholder="Numéro d’immeuble">
                    </div>
                    <div
                        class="rounded-[20px] border-[1px_solid_#9EAFCE] bg-[#FFFFFF] relative flex p-[20.5px_21.2px_20.5px_21.2px] w-[220px] box-sizing-border">
                        <input class="break-words font-['Inter'] font-normal text-[16px] text-[#000000]" placeholder="Numéro d’appartement">
                    </div>
                </div>
            </div>
            <div
                class="bg-[url('../assets/images/build_your_home_amico_11.png')] bg-[50%_50%] bg-cover bg-no-repeat m-[20.5px_0_0_0] w-[350px] h-[350px]">
            </div>
        </div>
        <div class="relative m-[0_38px_59.5px_43px] flex flex-row justify-between w-[1371px] box-sizing-border">
            <div class="m-[7.5px_0_37.5px_0] flex flex-row box-sizing-border">
                <div class="rounded-[8px] border-[1px_solid_#3C4C7C] m-[0_10px_0_0] w-[24px] h-[24px]">
                </div>
                <div
                    class="m-[2.5px_0_2.5px_0] inline-block break-words font-['Inter'] font-medium text-[16px] text-[#6F7D93]">
                    J’accepte les Conditions d&#39;utilisation et la Politique de confidentialité de Synditchat
                </div>
            </div>
            <span
                class="text-center break-words font-['Fredoka_One','Roboto_Condensed'] font-normal text-[20px] text-[#F7F7F7]">
                Si vous avez déjà un compte, connectez-vous maintenant et profitez pleinement de tous les avantages de
                SynditChat!
            </span>
        </div>
        <div class="relative m-[0_103px_65px_103px] flex flex-row justify-between w-[1076px] box-sizing-border">
            <div
                class="rounded-[60px] border-[1px_solid_#9EAFCE] bg-[#3C4C7C] relative m-[0_0_6px_0] flex p-[13px_2px_13px_0] w-[400px] h-[fit-content] box-sizing-border">
                <span class="break-words font-['Inter'] font-bold text-[28px] text-[#FFFFFF]">
                    Envoyer
                </span>
            </div>
            <div
                class="rounded-[50px] bg-[#F7F7F7] relative m-[16px_0_0_0] flex p-[10.5px_0_10.5px_0] w-[240px] h-[fit-content] box-sizing-border">
                <span class="break-words font-['Inter'] font-bold text-[24px] text-[#3C4C7C]">
                    Se connecter
                </span>
            </div>
        </div>
        <div class="relative flex flex-row justify-between w-[1452px] box-sizing-border">
            <div
                class="m-[7.5px_7.5px_7.5px_0] inline-block w-[307px] break-words font-['Inter'] font-normal text-[12px] text-[#9EAFCE]">
                Copyrights © 2024, Synditchat. All Rights Reserved.
            </div>
            <div class="flex flex-row w-[230px] box-sizing-border">
                <div
                    class="rounded-[15px] bg-[#9EAFCE] relative m-[0_20px_0_0] flex p-[7px_7px_7px_7px] w-[30px] h-[30px] box-sizing-border">
                    <div
                        class="bg-[url('../assets/images/facebook_app_symbol.png')] bg-[50%_50%] bg-cover bg-no-repeat w-[16px] h-[16px]">
                    </div>
                </div>
                <div
                    class="rounded-[15px] bg-[#9EAFCE] relative m-[0_20px_0_0] flex p-[7px_7px_7px_7px] w-[30px] h-[30px] box-sizing-border">
                    <div
                        class="bg-[url('../assets/images/instagram_1.png')] bg-[50%_50%] bg-cover bg-no-repeat w-[16px] h-[16px]">
                    </div>
                </div>
                <div
                    class="rounded-[15px] bg-[#9EAFCE] relative m-[0_20px_0_0] flex p-[7px_7px_7px_7px] w-[30px] h-[30px] box-sizing-border">
                    <div
                        class="bg-[url('../assets/images/linkedin_1.png')] bg-[50%_50%] bg-cover bg-no-repeat w-[16px] h-[16px]">
                    </div>
                </div>
                <div
                    class="rounded-[15px] bg-[#9EAFCE] relative m-[0_20px_0_0] flex p-[7px_7px_7px_7px] w-[30px] h-[30px] box-sizing-border">
                    <div
                        class="bg-[url('../assets/images/twitter_3.png')] bg-[50%_50%] bg-cover bg-no-repeat w-[16px] h-[16px]">
                    </div>
                </div>
                <div
                    class="bg-[url('../assets/images/whatsapp_2.png')] bg-[50%_50%] bg-cover bg-no-repeat w-[30px] h-[30px]">
                </div>
            </div>
            <div
                class="m-[7.5px_0_7.5px_0] inline-block break-words font-['Inter'] font-normal text-[12px] text-[#F7F7F7]">
                Conformité de Sécurité Conditions d&#39;utilisation Politique de Confidentialité
            </div>
        </div>
    </div>
</body>

</html>
