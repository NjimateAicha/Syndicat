@extends('layouts.main')

@section('content')
    @php
        use App\Http\Controllers\TimeFunction;
    @endphp
    {{-- navbar --}}
    <x-layouts.navbar :user="Auth::user()" route="inventaire.residence" />

    <div class="px-5 mb-6 flex justify-between w-full ">
        <div class="text-[14px] font-semibold text-[#3C4C7C]">
            Inventaire
        </div>
        <x-inventaire.filter></x-inventaire.filter>
    </div>

    <div class="mx-5 flex w-full ">
        <div class="flex flex-col w-5/6 pr-5">
            @foreach ($inventaires as $inventaire)
                <div class="flex flex-col w-full p-3">
                    <div class="bg-white rounded-lg shadow-md p-5">
                        <div class="flex justify-between mb-5">
                            <div class="text-[12px] font-semibold text-[#6F7D93]">
                                {{ $inventaire->nom }}
                            </div>
                            @role('Super Admin|Admin|Manager principal|Manager')
                                <button type="button" class="editButton  w-4 h-4"><i class="fa-regular fa-pen-to-square"
                                        style="color: #3c4c7c"></i></button>
                            @endrole
                        </div>

                        <!-- Display details when not editing -->
                        <div class="detailsView  flex-wrap grid grid-cols-3 gap-4">
                            <div class="text-[12px] text-[#6F7D93] break-words col-span-2">
                                {!! nl2br(e($inventaire->details)) !!}
                            </div>
                            <div class="text-right text-[12px] text-[#6F7D93] whitespace-nowrap">
                                {!! nl2br(e($inventaire->date)) !!}

                            </div>
                        </div>

                        <!-- Editable form for details -->
                        @role('Super Admin|Admin|Manager principal|Manager')
                            <form class="editForm hidden" action="{{ route('inventaire.update', $inventaire->id) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class=" flex-wrap grid grid-cols-3 gap-4">
                                    <div class="col-span-2">
                                        <textarea name="details" rows="4" class=" w-full border border-gray-300 rounded text-[12px] text-[#6F7D93]">{{ old('details', $inventaire->details) }}</textarea>
                                    </div>
                                    <div class="text-right col-span-1">
                                        <button type="submit"
                                            class="bg-blue-500 text-white text-[12px] px-3 py-1 rounded">Save</button>
                                        <button type="button"
                                            class="cancelButton bg-gray-400 text-white text-[12px] px-3 py-1 rounded">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        @endrole
                    </div>
                </div>
            @endforeach
            <div class="mt-4 w-full flex justify-center">
                {{ $inventaires->links('vendor.pagination.tailwind') }}
            </div>
        </div>

        @role('Super Admin|Admin|Manager principal|Manager')
            <form method="POST" action="{{ route('inventaire.store') }}" class="w-1/3 bg-white rounded-lg shadow-md p-5 h-fit">
                @csrf
                <div class="text-[14px] font-semibold text-[#3C4C7C] mb-4">
                    Ajouter Inventaire
                </div>

                {{-- display the messages and errors  --}}
                <x-error.message></x-error.message>



                <div class="bg-[#F7F7F7] h-1 mb-6"></div>
                <div class="text-[12px] font-medium text-[#6F7D93] mb-2">
                    Entrez Nom d’installation ou du produit
                </div>
                <input type="text" placeholder="Produit de Nettoyage “ Détergent Multi-Usage ”" name="nom"
                    value="{{ old('nom') }}"
                    class="w-full border border-[#9EAFCE] bg-[#F1F1F1] rounded-lg p-3 text-[#A2A2A2] text-[12px] mb-4">

                <div class="text-[12px] font-medium text-[#6F7D93] mb-2">
                    Saisir Détails
                </div>
{{-- <div class="w-full border border-[#9EAFCE] bg-[#F1F1F1] rounded-lg p-3 text-[#A2A2A2] text-[12px] mb-4 h-fit">
                    <textarea placeholder="Marque : Synditchat" rows="3" name="details"
                        class="bg-[#F1F1F1] border-none w-full mb-2 text-[#A2A2A2] text-[12px]  ">{{ old('details') }}</textarea>
                </div>


                <div class="text-[12px] font-medium text-[#6F7D93] mb-2">
                    Saisir les dates
                </div>
                <div class="w-full border border-[#9EAFCE] bg-[#F1F1F1] rounded-lg p-3 text-[#A2A2A2] text-[12px] mb-4 h-fit">
                    <textarea placeholder="Date d'achat : Juillet 2023
Prochain achat : Janvier 2024" rows="3" name="date"
                        class="bg-[#F1F1F1] border-none w-full mb-2 text-[#A2A2A2] text-[12px]  ">{{ old('date') }}</textarea>
                </div> --}}

                <div class="border border-[#9EAFCE] bg-[#F1F1F1] rounded-lg p-3 transition-all duration-200 ease-in-out focus-within:border-black">
                    <textarea placeholder="Marque : Synditchat" rows="3" name="details"
                        class="bg-[#F1F1F1] border-none w-full mb-2 text-[#A2A2A2] text-[12px] focus:outline-none resize-none"
                        >{{ old('details') }}</textarea>
                </div>

                <div class="text-[12px] font-medium text-[#6F7D93] mb-2 mt-2">
                    Saisir les dates
                </div>

                <div class="border border-[#9EAFCE] bg-[#F1F1F1] rounded-lg transition-all duration-200 ease-in-out focus-within:border-black">
                    <textarea placeholder="Date d'achat : Juillet 2023 &#10; Prochain achat : Janvier 2024" rows="3" name="date"
                        class="bg-[#F1F1F1] border-none w-full mb-2 text-[#A2A2A2] text-[12px] focus:outline-none resize-none pl-2"
                        >{{ old('date') }}</textarea>
                </div>

                <input type="hidden" name="residence_id" value="{{ $residence->id }}">
                <div class="bg-[#F7F7F7] h-1 mb-6"></div>

                <button type="submit">
                    <div
                        class="rounded-[60px] border-[1px_solid_#9EAFCE] bg-[#3C4C7C] relative flex p-[12.5px_0_12.5px_0] w-full min-w-[160px] box-sizing-border justify-center">
                        <span class="break-words font-['Inter'] font-bold text-[12px] text-[#FFFFFF]">
                            {{__('Ajouter un commentaire')}}
                        </span>
                    </div>
                </button>
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
