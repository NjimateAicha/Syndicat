@extends('layouts.main')

@section('content')
    {{-- navbar --}}
    <x-layouts.navbar :user="Auth::user()" route="infocom.residence" />

    <div class="flex flex-col w-full">
        <!-- Header Section -->
        <div class="pb-[27px] flex flex-row justify-between w-full">
            <div class="font-semibold text-[14px] text-[#3C4C7C] mr-[8.5px]">Déclaration Sinistre et Nuisance</div>
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
                <!-- Add Declaration Section -->
                <form method="post" action="{{ route($postUrl) }}" enctype="multipart/form-data" class="w-full max-w-[330px]">
                    @csrf

                    <div class="shadow-[0px_4px_4px_rgba(0,0,0,0.25)] rounded-[20px] bg-[#FFFFFF] p-[16.5px_0_16px_0]">
                        <div class="m-[0_25px_26.5px_25px] font-semibold text-[14px] text-[#3C4C7C]">
                            Ajouter Votre Déclaration
                        </div>
                        <div class="bg-[#F7F7F7] h-[1px] mb-[24.5px] w-full"></div>

                        {{-- Type de Déclaration --}}
                        <div class="m-[0_25px_19.5px_25px] font-medium text-[12px] text-[#6F7D93]">
                            Choisissez Type de Déclaration
                        </div>
                        <div class="flex flex-row justify-around">
                            <button id="nuisance" type="button" onclick="choseType(event)" class="flex flex-row items-center">
                                <div class="rounded-[4px] border-[1px solid #9EAFCE] w-[20px] h-[20px]"></div>
                                <span class="m-[5.5px_0_0_0] text-[12px] text-[#6F7D93]">Nuisance</span>
                            </button>
                            <button id="sinistre" type="button" onclick="choseType(event)" class="flex flex-row items-center">
                                <div class="rounded-[4px] border-[1px solid #9EAFCE] w-[20px] h-[20px]"></div>
                                <span class="m-[5.5px_0_0_0] text-[12px] text-[#6F7D93]">Sinistre</span>
                            </button>
                        </div>
                        <input type="hidden" name="type" id="selectedType" />

                        {{-- Titre --}}
                        <div class="m-[0_25px_12.5px_25px] font-medium text-[12px] text-[#6F7D93]">
                            Entrez l’objet de votre déclaration
                        </div>
                        <div class="relative m-[0_25px_29px_25px]">
                            <input type="text" placeholder="Objet de votre déclaration" id="titre" name="titre"
                                class="rounded-[8px] border-[1px solid #9EAFCE] bg-[#F1F1F1] p-[12.5px_15px] w-full text-[12px] text-[#A2A2A2]" />
                        </div>

                        {{-- Lieu --}}
                        <div class="m-[0_25px_12.5px_25px] font-medium text-[12px] text-[#6F7D93]">
                            Entrez le lieu
                        </div>
                        <div class="relative m-[0_25px_29px_25px]">
                            <input type="text" placeholder="Exemple: Immeuble D" id="lieu" name="lieu"
                                class="rounded-[8px] border-[1px solid #9EAFCE] bg-[#F1F1F1] p-[12.5px_15px] w-full text-[12px] text-[#A2A2A2]" />
                        </div>

                        {{-- Description --}}
                        <div class="m-[0_25px_12.5px_25px] font-medium text-[12px] text-[#6F7D93]">
                            Décrivez votre déclaration
                        </div>
                        <div class="relative m-[0_25px_29px_25px]">
                            <textarea placeholder="Contenu de votre déclaration" id="description" name="description"
                                class="rounded-[8px] border-[1px solid #9EAFCE] bg-[#F1F1F1] p-[12.5px_15px] w-full text-[12px] text-[#A2A2A2] h-[100px] resize-none"></textarea>
                        </div>

                        {{-- Image Upload --}}
                        <div class="relative flex items-center justify-end">
                            <label for="file-input" class="cursor-pointer">
                                <img class="rotate-[45deg] w-[15px]" src="../assets/vectors/vector_11_x2.svg" alt="Upload" />
                            </label>
                            <input type="file" id="file-input" name="image" class="hidden" />
                        </div>

                        {{-- Submit Button --}}
                        <div class="flex flex-row justify-end px-[25px]">
                            <button type="submit"
                                class="rounded-[8px] bg-gradient-to-r from-[#9EAFCE] to-[#697C9B] p-[12.5px_17px] text-white text-[12px] font-semibold">
                                Ajouter
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
