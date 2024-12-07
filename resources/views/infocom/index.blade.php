@extends('layouts.main')

@section('content')
    <x-layouts.navbar :user="Auth::user()" route="infocom.residence" />

    <div class="flex flex-col w-full p-4">
        <!-- Header Section -->
        <div class="pb-6 flex flex-col sm:flex-row justify-between w-full">
            <div class="font-semibold text-lg sm:text-base text-[#3C4C7C] mb-4 sm:mb-0">{{ __('Info`Com') }}</div>
            <x-infocoms.filter />
        </div>

        <!-- Content Section -->
        <div class="flex flex-col sm:flex-row justify-between gap-6">
            <!-- Info List Section -->
            <div class="flex flex-col w-full sm:pr-5">
                @foreach ($infoComsUser as $infocom)
                    <div class="bg-white rounded-lg mb-4 p-4 shadow-sm w-full">
                        <div class="flex justify-between mb-4">
                            <span class="font-semibold text-sm text-[#6F7D93] truncate w-2/3">{{ $infocom->titre }}</span>
                            <span class="text-sm text-[#6F7D93]">{{ $infocom->created_at->format('d/m/Y') }}</span>
                        </div>
                        <span class="text-sm text-[#6F7D93]">{{ $infocom->description }}</span>
                    </div>
                @endforeach

                @foreach ($infoComs as $infocom)
                    <div class="bg-white rounded-lg mb-4 p-4 shadow-sm w-full">
                        <div class="flex justify-between mb-4">
                            <span class="font-semibold text-sm text-[#6F7D93] truncate w-2/3">{{ $infocom->titre }}</span>
                            <span class="text-sm text-[#6F7D93]">{{ $infocom->created_at->format('d/m/Y') }}</span>
                        </div>
                        <span class="text-sm text-[#6F7D93]">{{ $infocom->description }}</span>
                    </div>
                @endforeach
            </div>

            <!-- Add Info Section -->
            @role('Super Admin|Admin|Manager principal|Manager')
                <form 
                    class="shadow-lg rounded-lg bg-white p-6 w-full sm:w-1/3"
                    method="POST" action="{{ route('infocom.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="text-lg font-semibold text-[#3C4C7C] mb-6">{{ __('Ajouter Un Info`Com') }}</div>

                    <div class="text-sm font-medium text-[#6F7D93] mb-3">{{ __('Select Recipient') }}</div>
                    <div class="border border-gray-300 rounded-lg bg-gray-100 px-4 py-3 mb-5 h-32 overflow-y-auto">
                        <label class="flex items-center space-x-2 mb-3">
                            <input type="checkbox" id="select-all" class="w-4 h-4 text-blue-600">
                            <span class="text-sm text-gray-600">{{ __('Send to All Users') }}</span>
                        </label>
                        <div class="flex flex-col space-y-2">
                            @foreach ($users as $user)
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" name="user_ids[]" value="{{ $user->id }}" class="user-checkbox w-4 h-4 text-blue-600">
                                    <span class="text-sm text-gray-600">{{ $user->name . ' ' . $user->prenom }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="text-sm font-medium text-[#6F7D93] mb-3">{{ __('Enter Title') }}</div>
                    <input type="text" name="titre" class="border border-gray-300 rounded-lg w-full px-4 py-2 mb-5 text-sm bg-gray-100" placeholder="{{ __('Example Title') }}">

                    <div class="text-sm font-medium text-[#6F7D93] mb-3">{{ __('Enter Description') }}</div>
                    <textarea name="description" class="border border-gray-300 rounded-lg w-full px-4 py-2 h-32 mb-5 text-sm bg-gray-100 resize-none" placeholder="{{ __('Example Description') }}"></textarea>

                    <input type="hidden" name="residence_id" value="{{ $residence->id }}">
                    
                    <button type="submit" class="w-full bg-[#3C4C7C] text-white font-semibold rounded-lg py-3">
                        {{ __('Envoyer') }}
                    </button>
                </form>
            @endrole
        </div>
    </div>

    <script>
        document.getElementById('select-all').addEventListener('change', function () {
            const userCheckboxes = document.querySelectorAll('.user-checkbox');
            userCheckboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });
    </script>
@endsection
