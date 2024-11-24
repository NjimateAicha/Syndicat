@extends('layouts.main')

@section('content')
    {{-- navbar --}}
    {{-- <x-layouts.navbar :user="Auth::user()" route="infocom.index"></x-layouts.navbar> --}}
    <x-layouts.navbar :user="Auth::user()" route="infocom.residence" />
    

    <div class="flex flex-col w-full">
        <!-- Header Section -->
        <div class="pb-[27px] flex flex-row justify-between w-full">
            <div class="font-semibold text-[14px] text-[#3C4C7C] mr-[8.5px]">Info’Com</div>
            <a href="#" onclick=""
                class="rounded-[8px] bg-gradient-to-r from-[#9EAFCE] to-[#697C9B] flex flex-row items-center px-[18px] py-[4px]">
                <span class="text-white text-[12px] font-medium mr-[17.9px]">Filter</span>
                <div class="w-[16px] h-[16px] bg-cover"
                    style="background-image: url('{{ asset('assets/images/filter_11.png') }}');"></div>
            </a>

        </div>

        <!-- Content Section -->
        <div class="flex flex-row justify-between">
            <div class="flex flex-col items-center pr-[20px] w-full ">
                <!-- Info Block 1 -->
                @foreach ($infoComs as $infocom)
                    <div
                        class="bg-white rounded-[20px] mb-[10px] p-[17.5px_20px_25px_15px] w-full flex flex-col items-center ">
                        <div class="flex flex-row justify-between w-full mb-[22.5px]">
                            <span class="w-[270px] font-semibold text-[12px] text-[#6F7D93]">{{ $infocom->titre }}:>
                              
                            <span class="text-[12px] text-[#6F7D93]">{{ $infocom->created_at->format('d/m/Y') }}</span>
                        </div>
                        <span class="text-[12px] text-[#6F7D93] mb-[15px]">
                            {{ $infocom->description }}
                        </span>
                    </div>
                @endforeach

            </div>

            <!-- Add Info Section -->
            @role('Super Admin|Admin|Manager principal|Manager')

            <form
                class="shadow-[0px_4px_4px_rgba(0,0,0,0.25)] rounded-[20px] bg-white p-[16.5px_0_18px_0] flex flex-col w-full max-w-[330px]"
                method="POST" action="{{ route('infocom.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Title -->
                <div class="text-[14px] font-semibold text-[#3C4C7C] mb-[26.5px] px-[25px]">Ajouter Un Info’Com</div>

                <!-- Divider -->
                <div class="bg-[#F7F7F7] h-[1px] mb-[24.5px] w-full max-w-[380px] mx-auto"></div>

                <!-- Select Destinataire -->
                <div class="text-[12px] font-medium text-[#6F7D93] mb-[12.5px] px-[25px]">Sélectionnez destinataire</div>

                <div
                    class="border border-[#9EAFCE] rounded-[8px] bg-[#F1F1F1] flex flex-row justify-between px-[15px] py-[12.5px] mb-[19.5px] mx-[25px] max-w-[330px]">
                    <select name="user_id" class="bg-transparent text-[12px] text-[#A2A2A2] w-full focus:outline-none">
                        <option value="all">Send to All Users</option> <!-- 'all' will be sent -->
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name . ' ' . $user->prenom }}</option>
                        @endforeach
                    </select>
                </div>


                <!-- Enter Title -->
                <div class="text-[12px] font-medium text-[#6F7D93] mb-[12.5px] px-[25px]">Entrez le titre</div>
                <div class="border border-[#9EAFCE] rounded-[8px] bg-[#F1F1F1] p-[12.5px] mb-[19.5px] mx-[25px]">
                    <input type="text" name="titre"
                        class="bg-transparent text-[12px] text-[#A2A2A2] w-full focus:outline-none"
                        placeholder="Exemple : Coupure d’eau prévue le : 23/07/2024">
                </div>

                <!-- Enter Description -->
                <div class="text-[12px] font-medium text-[#6F7D93] mb-[12.5px] px-[25px]">Saisir une description</div>
                <div class="border border-[#9EAFCE] rounded-[8px] bg-[#F1F1F1] p-[17px_15px] mb-[40px] mx-[25px]">
                    <textarea name="description"
                        class="bg-transparent text-[12px] text-[#A2A2A2] w-full h-[100px] resize-none overflow-hidden focus:outline-none"
                        placeholder="Exemple : Nous invitons tous les habitants à prendre les dispositions nécessaires..."></textarea>
                </div>
                <input type="hidden" name="residence_id" value="{{ $residence->id }}">

                <!-- Submit Button -->
                <div class="flex flex-row justify-end px-[25px]">
                    <button type="submit"
                        class="rounded-[8px] bg-gradient-to-r from-[#9EAFCE] to-[#697C9B] p-[12.5px_17px] text-white text-[12px] font-semibold">
                        Ajouter
                    </button>
                </div>
            </form>
            @endrole


        </div>
    </div>
@endsection
