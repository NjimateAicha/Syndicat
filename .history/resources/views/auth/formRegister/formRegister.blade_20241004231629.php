
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
            <h1 class="text-center mb-5 font-['Fredoka_One','Roboto_Condensed'] font-normal text-[48px] text-[#3C4C7C]  mt-8">
                Remplir le Formulaire</h1>
            <form class="space-y-4" action="{{ route('formRegister.store') }}" method="POST">
                @csrf <!-- This is necessary to avoid the 419 error -->
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <label
                            class="block mb-1
                    font-['Inter'] font-medium text-[16px] text-[#6F7D93]">Entrez
                            Votre Prénom</label>
                        <input type="text" name="first_name" placeholder="Prénom"
                            class="w-full h-16 px-6 py-2 border rounded-[25px] focus:outline-none focus:ring-2 focus:ring-indigo-700">
                    </div>
                    <div class="w-1/2">
                        <label
                            class="block mb-1
                    font-['Inter'] font-medium text-[16px] text-[#6F7D93]">Entrez
                            Votre Nom</label>
                        <input type="text" name="last_name" placeholder="Nom"
                            class="w-full h-16 px-6 py-2 border rounded-[25px] focus:outline-none focus:ring-2 focus:ring-indigo-700">
                    </div>
                </div>
                <div class="h-[0.75%]"></div>


                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <label
                            class="block mb-1
                    font-['Inter'] font-medium text-[16px] text-[#6F7D93]">Entrez
                            Votre Numéro de téléphone</label>
                        <div class="flex items-center">
                            <span class="p-3 flex items-center">🇲🇦</span>
                            <input type="text" name="phone" placeholder="Numéro de téléphone"
                                class="w-full h-16 px-6 py-2 border rounded-[25px] focus:outline-none focus:ring-2 focus:ring-indigo-700">
                        </div>
                    </div>
                    {{-- margin x 0.75% --}}

                    <div class="w-1/2">
                        <label
                            class="block mb-1
                    font-['Inter'] font-medium text-[16px] text-[#6F7D93]">Entrez
                            Votre Adresse E-mail</label>
                        <input type="email" name="email" placeholder="Exemple@synditchat.com"
                            class="w-full h-16 px-6 py-2 border rounded-[25px] focus:outline-none focus:ring-2 focus:ring-indigo-700">
                    </div>
                </div>
                <div class="h-[0.75%]"></div>


                <div class="flex space-x-4">
                    <div class="w-full">
                        <label
                            class="block mb-1
                    font-['Inter'] font-medium text-[16px] text-[#6F7D93]">
                            Entrez Votre Adresse
                        </label>
                        <div class="flex space-x-2">
                            <input type="text" name="address" placeholder="Nom du résidence, ville..."
                                class="w-1/3 h-16 px-6 py-2 border rounded-[25px] focus:outline-none focus:ring-2 focus:ring-indigo-700">
                            {{-- margin x 0.75% --}}

                            <input type="text" name="building_number" placeholder="Numéro d'immeuble"
                                class="w-1/3 h-16 px-6 py-2 border rounded-[25px] focus:outline-none focus:ring-2 focus:ring-indigo-700">
                            {{-- margin x 0.75% --}}
                            <input type="text" name="apartment_number" placeholder="Numéro d'appartement"
                                class="w-1/3 h-16 px-6 py-2 border rounded-[25px] focus:outline-none focus:ring-2 focus:ring-indigo-700">
                        </div>
                    </div>
                </div>
                <div class="h-[0.25%]"></div>

                <div class="flex items-center space-x-2">
                    <input type="checkbox" name="terms"
                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label class="text-gray-600">J'accepte les Conditions d'utilisation et la Politique de
                        confidentialité de Synditchat</label>
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
            </div>
        </div>

        <!-- Right Section -->
        <div class="w-full md:w-1/3 bg-[#7d8fae] text-white flex flex-col justify-center items-center text-center p-8">
            <div class="text-center space-y-6">
                <h2 class="font-bold mb-4 text-[48px]">Synditchat</h2>
                <p class="mb-8">votre solution complète pour la gestion de copropriété, assurant conformité,
                    transparence et communication fluide</p>
                <div class="w-80 h-auto mx-auto">
                    <img src="{{ asset('assets/images/build_your_home_amico_11.png') }}" alt="Illustration">
                </div>
                <p class="mb-8">Si vous avez déjà un compte, connectez-vous maintenant et profitez pleinement de tous
                    les avantages de SynditChat!</p>
                <button class="bg-[#F7F7F7] text-[#7d8fae] py-3 px-6 rounded-full font-bold text-xl hover:bg-[#cbc9c9]">
                    <a href="{{ route('login') }}">Se connecter</a>
                </button>
            </div>
        </div>
    </div>


</body>

</html>