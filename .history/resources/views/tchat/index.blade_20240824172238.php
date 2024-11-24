@extends('layouts.main')

@section('content')
    {{-- Navbar --}}
    @include('layouts.navbar')

    <div class="flex flex-row w-fit box-border">
        <div class="m-5 flex flex-col items-center box-border">
            <div class="flex flex-row justify-between w-90 m-0 box-border">
                <h2 class="font-semibold text-sm text-[#3C4C7C]">
                    Discussions
                </h2>
                <div class="flex flex-row">
                    <div class="rounded-md bg-gradient-to-r from-[#9EAFCE] to-[#697C9B] flex items-center justify-center w-6 h-6 m-0 mr-2 p-1">
                        <img src="{{ asset('assets/images/chat_31.png') }}" alt="Chat" class="w-4 h-4">
                    </div>
                    <div class="rounded-md bg-gradient-to-r from-[#9EAFCE] to-[#697C9B] flex items-center justify-center w-6 h-6 p-1">
                        <img src="{{ asset('assets/images/add_group_1.png') }}" alt="Add Group" class="w-4 h-4">
                    </div>
                </div>
            </div>

            <div class="shadow-md rounded-lg bg-white flex p-5 box-border relative">
                <div class="rounded-md bg-[#F1F1F1] absolute right-0 bottom-8 flex flex-col items-center p-2">
                    <div class="bg-[url('../assets/images/arrow_down_sign_to_navigate_1.png')] bg-center bg-cover bg-no-repeat mb-8 w-2.5 h-2.5"></div>
                    <div class="rounded-md bg-[#9EAFCE] w-1.5 h-72 mb-8"></div>
                    <div class="bg-[url('../assets/images/arrow_down_sign_to_navigate_1.png')] bg-center bg-cover bg-no-repeat w-2.5 h-2.5"></div>
                </div>
                <div class="flex flex-col box-border w-full">
                    <div class="rounded-lg border border-[#9EAFCE] m-5 p-3 box-border">
                        <span class="text-xs text-[#A2A2A2]">Rechercher</span>
                    </div>
                    {{-- Example of a chat row --}}
                    <div class="flex flex-row m-5 box-border">
                        <div class="rounded-full bg-[url('../assets/images/awesome_profile_picture_10734.jpeg')] bg-center bg-cover w-7.5 h-7.5 mr-2"></div>
                        <p class="text-sm text-[#6F7D93]">Khadija Dija - D'accord, merci pour l'idée</p>
                    </div>
                    <div class="border-t border-b border-[#9EAFCE] bg-[#E9ECEE] flex flex-row p-2.5 box-border">
                        <div class="rounded-full bg-[url('../assets/images/oip_133.jpeg')] bg-cover w-7.5 h-7.5 mr-2"></div>
                        <p class="text-sm text-[#6F7D93]">Hassan Bilal - Non, j'accepte pas pour le moment</p>
                    </div>
                    {{-- Add more chat rows as needed --}}
                </div>
            </div>
        </div>
    </div>
@endsection
