@extends('layouts.main')

@section('content')
    {{-- Navbar --}}
    <x-layouts.navbar :user="Auth::user()" route="tchat.index"></x-layouts.navbar>

    <div class="flex w-full box-border">
        {{-- Left Section --}}
        <div class="flex flex-col items-center m-5">
            <div class="flex flex-row justify-between w-[360px] mb-7">
                <h2 class="font-['Inter'] font-semibold text-[14px] text-[#3C4C7C]">Discussions</h2>
                <div class="flex space-x-2">
                    <button class="rounded-[6px] bg-gradient-to-r from-[#9EAFCE] to-[#697C9B] p-[4px] w-[24px] h-[24px] flex justify-center items-center">
                        <img src="{{ asset('assets/images/chat_31.png') }}" class="w-[16px] h-[16px]" alt="Chat">
                    </button>
                    <button class="rounded-[6px] bg-gradient-to-r from-[#9EAFCE] to-[#697C9B] p-[4px] w-[24px] h-[24px] flex justify-center items-center">
                        <img src="{{ asset('assets/images/add_group_1.png') }}" class="w-[16px] h-[16px]" alt="Add Group">
                    </button>
                </div>
            </div>

            {{-- Conversation List --}}
            <div class="shadow-md rounded-[20px] bg-white p-[10px_0_22px_0] w-[380px]">
                <div class="relative flex flex-col box-border">
                    {{-- Search Input --}}
                    <input type="text" placeholder="Rechercher" 
                    class="rounded-[8px] border-[1px_solid_#9EAFCE] relative m-[0_20px_20px_20px] p-[12.5px_20px] w-[fit-content] box-sizing-border text-[12px] text-[#A2A2A2] font-['Inter'] font-normal">


                    {{-- Conversations --}}
                    <div class="flex flex-row items-center space-x-2 m-[0_30px_10px_30px]">
                        <div class="w-[30px] h-[30px] rounded-full bg-cover bg-center" style="background-image: url('{{ asset('assets/images/awesome_profile_picture_10734.jpeg') }}');"></div>
                        <p class="text-[#6F7D93] text-[12px] font-medium font-['Inter']">
                            <span>Khadija Dija D'accord Merci Pour l'idée...</span>
                        </p>
                    </div>
                    <div class="flex flex-row items-center space-x-2 border-t border-b border-[#9EAFCE] bg-[#E9ECEE] p-[10px_30px] w-full">
                        <div class="w-[30px] h-[30px] rounded-full bg-cover bg-center" style="background-image: url('{{ asset('assets/images/oip_133.jpeg') }}');"></div>
                        <p class="text-[#6F7D93] text-[12px] font-medium font-['Inter']">
                            <span>Hassan Bilal Non j'accepte pas pour le moment...</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Right Section --}}
        <div class="flex flex-col w-[781px] rounded-[20px] bg-white box-border">
            <div class="flex flex-row justify-between mb-5 p-5">
                <div class="flex items-center">
                    <div class="w-[40px] h-[40px] rounded-full bg-cover bg-center" style="background-image: url('{{ asset('assets/images/oip_133.jpeg') }}');"></div>
                    <p class="ml-2 text-[#3A416F] text-[12px] font-semibold font-['Inter']">
                        Hassan Bilal Résident Immeuble d'Appartement 09...
                    </p>
                </div>
                <div class="w-[24px] h-[24px] bg-cover bg-center" style="background-image: url('{{ asset('assets/images/dots_11.png') }}');"></div>
            </div>

            {{-- Message Section --}}
            <div class="bg-[#F7F7F7] w-full h-[1px] mb-4"></div>
            <div class="flex items-center space-x-2 m-5">
                <div class="w-[30px] h-[30px] rounded-full bg-cover bg-center" style="background-image: url('{{ asset('assets/images/r_95.jpeg') }}');"></div>
                <p class="text-[#6F7D93] text-[12px] font-medium font-['Inter']">
                    Oui, j'ai reçu l'invitation. Ça pourrait être sympa d'avoir une petite fête...
                </p>
            </div>
            <div class="flex justify-between items-center mt-10 px-10">
                <div class="relative w-full">
                    <input type="text" placeholder="Écrivez votre message ..." class="w-full rounded-[8px] border border-[#9EAFCE] bg-[#F1F1F1] p-3 text-[#A2A2A2] text-[12px] font-['Inter']">
                </div>
                <button class="ml-2 bg-[#3C4C7C] rounded-full text-white p-2 w-[100px] h-auto font-bold text-[12px]">
                    Envoyer
                </button>
            </div>
        </div>
    </div>
@endsection
