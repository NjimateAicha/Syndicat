@extends('layouts.main')

@section('content')
    <x-layouts.navbar :user="Auth::user()" route="regelement.show" :residence="$residence"></x-layouts.navbar>

    <div class="flex flex-col w-full p-4 space-y-4 bg-white shadow-lg rounded-[20px] mb-6">

        <!-- First layout -->
        <div class="w-full rounded-lg flex flex-row justify-between items-center">
            <div class="flex-1 text-white p-2 rounded-lg">
                <p class="m-[3px_8.5px_4px_0] inline-block break-words font-['Inter'] font-semibold text-[14px] text-[#3C4C7C] title-selector">
                    {{ __('ReglementInterieurTitle', ['nomResidence' => $residence->nomResidence]) }}
                </p>
            </div>
            <div class="flex-1 text-white p-2 rounded-lg flex items-center justify-end">
                @role('Super Admin|Admin|Manager principal|Manager')
                <a id="edit-button" href="{{ route('regelement.edit', ['residence' => $residence->id]) }}">
                    <button
                        class="rounded-[8px] bg-[linear-gradient(90deg,#9EAFCE,#697C9B)] flex flex-row p-[4px_12px_4px_15px] box-border hover:bg-[linear-gradient(90deg,#697C9B,#9EAFCE)] transition duration-300 ease-in-out transform hover:scale-105">
                        <span class="m-[0.5px_9.4px_0.5px_0] inline-block break-words font-['Inter'] font-medium text-[12px] text-[#FFFFFF]">
                            {{ __('EditButton') }}
                        </span>
                        <img src="{{ asset('assets/images/edit_41.png') }}" class="w-[16px] h-[16px] ml-2" />
                    </button>
                </a>
                @endrole
            </div>
        </div>

        <!-- Second layout -->
        <div class="w-full">
            <!-- Content for the second layout -->
            <div id="editor-container" style="border: none; white-space: pre-wrap;" class="p-5 font-['Inter'] font-normal text-[#6F7D93]">
                
            </div>
        </div>

    </div>

    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var quill = new Quill('#editor-container', {
                theme: 'snow',
                modules: {
                    toolbar: false // Disable the toolbar
                },
                readOnly: true // Set the editor to read-only mode
            });
            quill.clipboard.dangerouslyPasteHTML(`{!! $residence->description !!}`);
        });
    </script>

@endsection
