@extends('layouts.main')

@section('content')
@php
    use App\Http\Controllers\TimeFunction;
@endphp
    {{-- navbar --}}
    <x-layouts.navbar :user="Auth::user()" route="inventaire.residence" />

    <div class="px-5 mb-6 flex justify-between w-full max-w-7xl">
        <div class="text-[14px] font-semibold text-[#3C4C7C]">
            Inventaire
        </div>
        <a href="#" onclick="showPopup()"
            class="rounded-[8px] bg-gradient-to-r from-[#9EAFCE] to-[#697C9B] flex flex-row items-center px-[18px] py-[4px]">
            <span class="text-white text-[12px] font-medium mr-[17.9px]">Filter</span>
            <div class="w-[16px] h-[16px] bg-cover"
                style="background-image: url('{{ asset('assets/images/filter_11.png') }}');"></div>
        </a>
    </div>

    <div class="mx-5 flex w-full max-w-7xl">
        <div class="flex flex-col w-5/6 pr-5">
            @foreach ($inventaires as $inventaire )
            <div class="flex flex-col w-full p-3">
                <div class="bg-white rounded-lg shadow-md p-5">
                    <div class="flex justify-between mb-5">
                        <div class="text-[12px] font-semibold text-[#6F7D93]">
                            {{$inventaire->nom}}
                        </div>
                        @role('Super Admin|Admin|Manager principal|Manager')
                            <button type="button" class="editButton  w-4 h-4"><i class="fa-regular fa-pen-to-square" style="color: #3c4c7c"></i></button>
                        @endrole
                    </div>

                    <!-- Display details when not editing -->
                    <div class="detailsView  flex-wrap grid grid-cols-3 gap-4">
                        <div class="text-[12px] text-[#6F7D93] break-words col-span-2">
                            {!! nl2br(e($inventaire->details)) !!}
                        </div>
                        <div class="text-right text-[12px] text-[#6F7D93] whitespace-nowrap">
                            Date d’installation: {{ TimeFunction::formatDateToFrench_M_Y($inventaire->date_achat) }}<br />
                            Prochaine révision: {{ TimeFunction::formatDateToFrench_M_Y($inventaire->date_achat_prochain) }}
                        </div>
                    </div>

                    <!-- Editable form for details -->
                    @role('Super Admin|Admin|Manager principal|Manager')
                        <form class="editForm hidden" action="{{ route('inventaire.update', $inventaire->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class=" flex-wrap grid grid-cols-3 gap-4">
                                <div class="col-span-2">
                                    <textarea name="details" rows="4" class=" w-full border border-gray-300 rounded text-[12px] text-[#6F7D93]">{{ old('details', $inventaire->details) }}</textarea>
                                </div>
                                <div class="text-right col-span-1">
                                    <button type="submit" class="bg-blue-500 text-white text-[12px] px-3 py-1 rounded">Save</button>
                                    <button type="button" class="cancelButton bg-gray-400 text-white text-[12px] px-3 py-1 rounded">Cancel</button>
                                </div>
                            </div>
                        </form>
                    @endrole
                </div>
            </div>
            @endforeach
        </div>

        @role('Super Admin|Admin|Manager principal|Manager')
            <form   method="POST" action="{{route("inventaire.store")}}"     class="w-1/3 bg-white rounded-lg shadow-md p-5 h-fit">
                @csrf
                <div class="text-[14px] font-semibold text-[#3C4C7C] mb-4">
                    Ajouter Inventaire
                </div>

                {{-- display the messages and errors  --}}
                



                <div class="bg-[#F7F7F7] h-1 mb-6"></div>
                <div class="text-[12px] font-medium text-[#6F7D93] mb-2">
                    Entrez Nom d’installation ou du produit
                </div>
                <input type="text" placeholder="Produit de Nettoyage “ Détergent Multi-Usage ”" name="nom" value="{{old('nom')}}"
                    class="w-full border border-[#9EAFCE] bg-[#F1F1F1] rounded-lg p-3 text-[#A2A2A2] text-[12px] mb-4">

                <div class="text-[12px] font-medium text-[#6F7D93] mb-2">
                    Saisir Détails
                </div>

                <div class="w-full border border-[#9EAFCE] bg-[#F1F1F1] rounded-lg p-3 text-[#A2A2A2] text-[12px] mb-4 h-fit">
                    <textarea placeholder="Marque : Synditchat" rows="3" name="details"
                        class="bg-[#F1F1F1] border-none w-full mb-2 text-[#A2A2A2] text-[12px] cursor-default ">{{ old('details') }}</textarea>
                </div>


                <div class="text-[12px] font-medium text-[#6F7D93] mb-2">
                    Saisir les dates
                </div>
                <div class="border border-[#9EAFCE] bg-[#F1F1F1] rounded-lg p-4 mb-4">
                    <label class="block text-[#6F7D93] text-[12px] mb-1">Date d'achat</label>
                    <input type="date" name="date_achat" value="{{old('date_achat')}}"
                        class="w-full border border-[#9EAFCE] bg-white rounded-lg p-3 text-[#A2A2A2] text-[12px] mb-4"
                        >

                    <label class="block text-[#6F7D93] text-[12px] mb-1">Prochain achat</label>
                    <input type="date"  name="date_prochain_achat" value="{{old('date_prochain_achat')}}"
                        class="w-full border border-[#9EAFCE] bg-white rounded-lg p-3 text-[#A2A2A2] text-[12px]"
                        >
                </div>

                <input type="hidden"  name="residence_id" value="{{ $residence->id }}" >
                <div class="bg-[#F7F7F7] h-1 mb-6"></div>

                <button class="bg-[#3C4C7C] text-white text-[14px] font-bold rounded-full px-8 py-3" type="submit">
                    Ajouter
                </button>
            </form>
        @endrole
    </div>


    @role('Super Admin|Admin|Manager principal|Manager')
        <script>
            // Target all edit buttons
            document.querySelectorAll('.editButton').forEach((button, index) => {
                button.addEventListener('click', function() {
                    const detailsView = document.querySelectorAll('.detailsView')[index];
                    const editForm = document.querySelectorAll('.editForm')[index];
                    detailsView.classList.add('hidden');
                    editForm.classList.remove('hidden');
                });
            });

            // Target all cancel buttons
            document.querySelectorAll('.cancelButton').forEach((button, index) => {
                button.addEventListener('click', function() {
                    const detailsView = document.querySelectorAll('.detailsView')[index];
                    const editForm = document.querySelectorAll('.editForm')[index];
                    detailsView.classList.remove('hidden');
                    editForm.classList.add('hidden');
                });
            });
        </script>
    @endrole

@endsection


