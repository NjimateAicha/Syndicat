
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
                                        <embed id="pdf-viewer" src="{{ asset('storage/' . $document->fichier) }}" class="w-full h-full" />

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










