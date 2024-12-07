@extends('layouts.main')

@section('content')
    @php
        use App\Http\Controllers\TimeFunction;
    @endphp
    {{-- Navbar --}}
    <x-layouts.navbar :user="Auth::user()" route="inventaire.residence" />

    <div class="px-5 mb-6 flex flex-col sm:flex-row justify-between w-full">
        <div class="text-[14px] font-semibold text-[#3C4C7C]">
            Inventaire
        </div>
        <x-inventaire.filter></x-inventaire.filter>
    </div>

    <div class="mx-5 flex flex-col lg:flex-row w-full">
        <div class="flex flex-col w-full lg:pr-5">
            @foreach ($inventaires as $inventaire)
                <div class="flex flex-col w-full p-3">
                    <div class="bg-white rounded-lg shadow-md p-5">
                        <div class="flex flex-col sm:flex-row justify-between mb-5">
                            <div class="text-[12px] font-semibold text-[#6F7D93]">
                                {{ $inventaire->nom }}
                            </div>
                            @role('Super Admin|Admin|Manager principal|Manager')
                                <button type="button" class="editButton w-6 h-6 sm:w-4 sm:h-4">
                                    <i class="fa-regular fa-pen-to-square text-[#3c4c7c]"></i>
                                </button>
                            @endrole
                        </div>

                        <!-- Display details when not editing -->
                        <div class="detailsView grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div class="text-[12px] text-[#6F7D93] col-span-2">
                                {!! nl2br(e($inventaire->details)) !!}
                            </div>
                            <div class="text-right text-[12px] text-[#6F7D93]">
                                {!! nl2br(e($inventaire->date)) !!}
                            </div>
                        </div>

                        <!-- Editable form for details -->
                        @role('Super Admin|Admin|Manager principal|Manager')
                            <form class="editForm hidden" action="{{ route('inventaire.update', $inventaire->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                    <div class="col-span-2">
                                        <textarea name="details" rows="4" class="w-full border border-gray-300 rounded text-[12px] text-[#6F7D93]">{{ old('details', $inventaire->details) }}</textarea>
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
            <div class="mt-4 w-full flex justify-center">
                {{ $inventaires->links('vendor.pagination.tailwind') }}
            </div>
        </div>

        @role('Super Admin|Admin|Manager principal|Manager')
            <form method="POST" action="{{ route('inventaire.store') }}" class="w-full lg:w-1/3 bg-white rounded-lg shadow-md p-5">
                @csrf
                <div class="text-[14px] font-semibold text-[#3C4C7C] mb-4">
                    Ajouter Inventaire
                </div>

                {{-- Display the messages and errors --}}
                <x-error.message></x-error.message>

                <div class="bg-[#F7F7F7] h-1 mb-6"></div>

                <div class="text-[12px] font-medium text-[#6F7D93] mb-2">
                    Entrez Nom d’installation ou du produit
                </div>
                <input type="text" placeholder="Produit de Nettoyage “ Détergent Multi-Usage ”" name="nom" value="{{ old('nom') }}"
                    class="w-full border border-[#9EAFCE] bg-[#F1F1F1] rounded-lg p-3 text-[#A2A2A2] text-[12px] mb-4">

                <div class="text-[12px] font-medium text-[#6F7D93] mb-2">
                    Saisir Détails
                </div>
                <textarea placeholder="Marque : Synditchat" rows="3" name="details"
                    class="w-full border border-[#9EAFCE] bg-[#F1F1F1] rounded-lg p-3 text-[#A2A2A2] text-[12px] mb-4"></textarea>

                <div class="text-[12px] font-medium text-[#6F7D93] mb-2">
                    Saisir les dates
                </div>
                <textarea placeholder="Date d'achat : Juillet 2023&#10;Prochain achat : Janvier 2024" rows="3" name="date"
                    class="w-full border border-[#9EAFCE] bg-[#F1F1F1] rounded-lg p-3 text-[#A2A2A2] text-[12px] mb-4"></textarea>

                <input type="hidden" name="residence_id" value="{{ $residence->id }}">

                <div class="bg-[#F7F7F7] h-1 mb-6"></div>

                <button type="submit" class="w-full bg-[#3C4C7C] text-white text-[14px] font-bold rounded-full px-4 py-2">
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
