
@extends('layouts.main')
@php
    use App\Http\Controllers\TimeFunction;
@endphp
{{-- we use this to check if active type exsiste before check if its the type of the value of the option  --}}
{{-- {{ ($activeType ?? '') === "tous" ? 'selected' : '' }} --}}

@section('content')
    <div class="w-full">
        <x-layouts.navbar :user="Auth::user()" route="document.residence" />

        <div class="flex flex-col w-full px-6 space-y-4">
            <!-- First layout -->
            <div class="w-full rounded-lg flex justify-between items-center">
                <!-- Document Type Select -->
                <div class="flex-1">
                    <select class="m-1 font-semibold text-sm text-[#3C4C7C] border-2 border-[#3C4C7C] rounded p-1" onchange="window.location.href = this.value">
                        <option value="{{ route('document.type', ['type' => 'tous', 'residence' => $residence->id]) }}"    {{ ($activeType ?? '') === "tous" ? 'selected' : '' }}>

                            {{ __('all_documents') }}
                        </option>
                        @foreach ($types as $type)
                            <option value="{{ route('document.type', ['type' => $type, 'residence' => $residence->id]) }}"    {{ ($activeType ?? '') === $type ? 'selected' : '' }}>

                                {{ __($type) }}
                            </option>
                        @endforeach
                    </select>

                </div>

                <!-- Filter Component -->
                <div class="flex-1 flex justify-end">
                    <x-document.filter />
                </div>
            </div>
        </div>

        <!-- Second layout -->
        <div class="w-full p-4 rounded-lg">
            <div class="flex flex-row gap-5 w-full">
                <!-- PDF Reader -->
                @if ($documents && $documents->isNotEmpty())
                    <div class="flex-grow flex flex-col">
                        @foreach ($documents as $document)
                            <div class="rounded-[20px] bg-white relative p-4 w-full h-screen mb-3">
                                <div class="grid grid-cols-2">
                                    <!-- Title and Date -->
                                    <div class="text-left">
                                        <span class="font-normal text-xs text-[#6F7D93]">{{ $document->titre }}</span>
                                    </div>
                                    <div class="text-right">
                                        <span class="font-normal text-xs text-[#6F7D93]">
                                            {{ TimeFunction::formatDateToFrench($document->created_at) }}
                                        </span>
                                    </div>
                                </div>

                                <div class="p-5 w-full h-full">
                                    {{-- <embed id="pdf-viewer" src="{{ asset($document->fichier) }}" class="w-full h-full" /> --}}
                                        <embed id="pdf-viewer" src="{{ asset('storage/documents/' . $document->fichier) }}" class="w-full h-full" />

                                </div>
                                
                            </div>
                        @endforeach

                        <!-- Pagination -->
                        <div class="mt-4 w-full flex justify-center">
                            {{ $documents->links('vendor.pagination.tailwind') }}
                        </div>
                    </div>
                @endif

                <!-- Add PDF Form for Admin Roles -->
                @role('Super Admin|Admin|Manager principal|Manager')
                    <x-document.form-ajouter-document :residence="$residence->id" />
                @endrole
            </div>
        </div>
    </div>

    <script>
        function changePDF(pdflink, titre, date) {
            // Update the PDF viewer, title, and date
            document.getElementById('pdf-viewer').src = pdflink;
            document.getElementById('title').innerText = titre;

            const formattedDate = new Date(date).toLocaleDateString('fr-FR', {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            });
            document.getElementById('card-date').innerText = formattedDate;
        }
    </script>
@endsection


















{{-- @extends('layouts.main')
@php
    use App\Http\Controllers\TimeFunction;
@endphp

@section('content')
    <div class="w-full">
        <x-layouts.navbar :user="Auth::user()" route="document.residence"></x-layouts.navbar>

        <div class="flex flex-col w-full px-6 space-y-4 ">

            <!-- First layout -->
            <div class="w-full  rounded-lg flex flex-row justify-between items-center ">
                <!-- Content for the first layout -->
                <div class="flex-1 rounded-lg z-20">
                    <!-- <div x-data="{ open: false }" class="  flex flex-row justify-start  relative ">
                        <button @click="open = !open" type="button">
                            <div
                                class="relative m-[3px_8.5px_4px_0]  w-full break-words font-['Inter'] font-semibold text-[14px] text-[#3C4C7C] flex justify-between  border-2 border-[#3c4c7c] rounded p-1">
                                Touts les doucuments
                                <div
                                    class="bg-[url('../assets/images/arrow_down_sign_to_navigate_1.png')] bg-[50%_50%] bg-cover bg-no-repeat m-[7px_0_1px_0] w-[16px] h-[16px]">
                                </div>
                            </div>
                        </button>

                        <div x-show="open" @click.away="open = false"
                            class=" w-56 absolute  mt-2 origin-top-right rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                            style="display: none">
                            <a href="{{ route('document.type', ['type' => 'tous', 'residence' => $residence->id]) }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Tous
                            </a>
                            @foreach ($types as $type)
                                <a href="{{ route('document.type', ['type' => $type, 'residence' => $residence->id]) }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    {{ $type }}
                                </a>
                            @endforeach
                        </div>
                    </div> -->

                    <div class="flex flex-row justify-start ">
                        <select class="m-[3px_8.5px_4px_0]  break-words font-['Inter'] font-semibold text-[14px] text-[#3C4C7C] border-2 border-[#3c4c7c] rounded p-1"
                            onchange="window.location.href = this.value">
                            <option value="{{ route('document.type', ['type' => 'tous', 'residence' => $residence->id]) }}">
                                {{ __('all_documents') }}
                            </option>
                            @foreach ($types as $type)
                                <option value="{{ route('document.type', ['type' => $type, 'residence' => $residence->id]) }}">
                                    {{ __($type) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="flex-1 rounded-lg flex justify-end">

                <x-document.filter></x-reclamation.filter>


                </div>
            </div>
        </div>

        <!-- Second layout -->
        <div class="w-full p-4 rounded-lg ">
            <!-- Content for the second layout -->
                <div class="flex flex-row w-full box-sizing-border gap-5">
                    ---------------------------------------------PDF reader --------------------------------------------------------

                    @if ($documents && $documents->isNotEmpty())
                        <div class="flex flex-grow flex-col">
                            @foreach ($documents as $document )
                                <div
                                        class="rounded-[20px] bg-[#FFFFFF] relative m-[0_20px_0_0] p-[17.5px_20px_20px_15px] w-full h-screen box-sizing-border mb-3 ">

                                        --------------------------------------------------------------------------------------------------------------------------
                                        <div class="grid grid-cols-2">
                                            <div class="text-left	">
                                                <span class="break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]"
                                                    id="title">
                                                    {{ $document->titre }}
                                                </span>
                                            </div>

                                            <div class="text-right	">
                                                <span class="break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]"
                                                    id="card-date">
                                                    {{ TimeFunction::formatDateToFrench($document->created_at) }}
                                                </span>
                                            </div>
                                        </div>


                                        <div class="p-5 w-full h-full ">
                                            <embed id="pdf-viewer" src="{{ asset($document->fichier) }}" class="w-full h-full" />
                                        </div>

                                </div>
                            @endforeach
                            <div class="mt-4 w-full flex justify-center">
                                {{ $documents->links('vendor.pagination.tailwind') }} <!-- Adjust pagination style if needed -->
                            </div>
                        </div>
                    @endif

                    ---------------------------------------------add pdf --------------------------------------------------------

                    @role('Super Admin|Admin|Manager principal|Manager')
                        <x-document.form-ajouter-document :residence="$residence->id"></x-document.form-ajouter-document>
                    @endrole
                </div>
        </div>
    </div>





    <script>
        function changePDF(pdflink, titre, date) {
            // Set the PDF link
            document.getElementById('pdf-viewer').src = pdflink;

            // Set the title
            document.getElementById('title').innerHTML = titre;

            // Format the date
            const date_ = new Date(date);
            const formattedDate = date_.toLocaleDateString('fr-FR', {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            });

            // Set the formatted date
            document.getElementById('card-date').innerHTML = formattedDate;
        }
    </script>
    </div>


@endsection --}}
