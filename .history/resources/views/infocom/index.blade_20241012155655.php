@extends('layouts.main')

@section('content')
    <x-layouts.navbar :user="Auth::user()" route="infocom.residence" />

    <div class="flex flex-col w-full">
        <!-- Header Section -->
        <div class="pb-[27px] flex flex-row justify-between w-full">
            <div class="font-semibold text-[14px] text-[#3C4C7C] mr-[8.5px]">{{ __('Info`Com') }}</div>
            <x-infocoms.filter></x-infocoms.filter>
        </div>

        <!-- Content Section -->
        <div class="flex flex-row justify-between">
            <div class="flex flex-col items-center pr-[20px] w-full ">

                <!-- Add Info Section -->
                @foreach ($infoComsUser as $infocom)
                    <div
                        class="bg-white rounded-[20px] mb-[10px] p-[17.5px_20px_25px_15px] w-full flex flex-col items-center ">
                        <div class="flex flex-row justify-between w-full mb-[22.5px]">
                            <span class="w-[270px] font-semibold text-[12px] text-[#6F7D93]">{{ $infocom->titre }}</span>
                            <span class="text-[12px] text-[#6F7D93]">{{ $infocom->created_at->format('d/m/Y') }}</span>
                        </div>
                        <span class="text-[12px] text-[#6F7D93] mb-[15px]">{{ $infocom->description }}</span>
                    </div>
                @endforeach

                @foreach ($infoComs as $infocom)
                    <div
                        class="bg-white rounded-[20px] mb-[10px] p-[17.5px_20px_25px_15px] w-full flex flex-col items-center ">
                        <div class="flex flex-row justify-between w-full mb-[22.5px]">
                            <span class="w-[270px] font-semibold text-[12px] text-[#6F7D93]">{{ $infocom->titre }}</span>
                            <span class="text-[12px] text-[#6F7D93]">{{ $infocom->created_at->format('d/m/Y') }}</span>
                        </div>
                        <span class="text-[12px] text-[#6F7D93] mb-[15px]">{{ $infocom->description }}</span>
                    </div>
                @endforeach

            </div>

            <!-- Add Info Section -->
            @role('Super Admin|Admin|Manager principal|Manager')
                <form
                    class="shadow-[0px_4px_4px_rgba(0,0,0,0.25)] rounded-[20px] bg-white p-[16.5px_0_18px_0] flex flex-col w-full max-w-[330px]"
                    method="POST" action="{{ route('infocom.store') }}" enctype="multipart/form-data">
                    @csrf

            <div class="text-[14px] font-semibold text-[#3C4C7C] mb-[26.5px] px-[25px]">{{ __('Ajouter Un Info`Com') }}</div>

                    <div class="bg-[#F7F7F7] h-[1px] mb-[24.5px] w-full max-w-[380px] mx-auto"></div>

                    <div class="text-[12px] font-medium text-[#6F7D93] mb-[12.5px] px-[25px]">{{ __('SelectRecipient') }}</div>

                    {{-- <div
                        class="border border-[#9EAFCE] rounded-[8px] bg-[#F1F1F1] flex flex-row justify-between px-[15px] py-[12.5px] mb-[19.5px] mx-[25px] max-w-[330px]">
                        <select name="user_id" class="bg-transparent text-[12px] text-[#A2A2A2] w-full focus:outline-none">
                            <option value="all">Send to All Users</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name . ' ' . $user->prenom }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="border border-[#9EAFCE] rounded-lg bg-[#F1F1F1] px-4 py-3 mb-5 mx-6 max-w-[330px] h-[100px] overflow-y-scroll">
                        <label class="flex items-center space-x-2 mb-3">
                            <input type="checkbox" id="select-all" class="w-4 h-4 text-[#9EAFCE] border-gray-300 rounded focus:ring-[#9EAFCE]">
                            <span class="text-sm text-[#A2A2A2]">{{ __('Send to All Users') }}</span>
                        </label>

                        <div class="flex flex-col space-y-2 max-h-[150px] overflow-y-auto">
                            @foreach ($users as $user)
                                <label class="flex items-center space-x-2 mb-2">
                                    <input type="checkbox" name="user_ids[]" value="{{ $user->id }}" class="user-checkbox w-4 h-4 text-[#9EAFCE] border-gray-300 rounded focus:ring-[#9EAFCE]">
                                    <span class="text-sm text-[#A2A2A2]">{{ $user->name . ' ' . $user->prenom }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>


                    <div class="text-[12px] font-medium text-[#6F7D93] mb-[12.5px] px-[25px]">{{ __('EnterTitle') }}</div>
                    <div class="border border-[#9EAFCE] rounded-[8px] bg-[#F1F1F1] p-[12.5px] mb-[19.5px] mx-[25px]">
                        <input type="text" name="titre"
                            class="bg-transparent text-[12px] text-[#A2A2A2] w-full focus:outline-none"
                            placeholder="{{ __('ExampleTitle') }}">
                    </div>

                    <div class="text-[12px] font-medium text-[#6F7D93] mb-[12.5px] px-[25px]">{{ __('EnterDescription') }}</div>
                    <div class="border border-[#9EAFCE] rounded-[8px] bg-[#F1F1F1] p-[17px_15px] mb-[40px] mx-[25px]">
                        <textarea name="description"
                            class="bg-transparent text-[12px] text-[#A2A2A2] w-full h-[100px] resize-none overflow-hidden focus:outline-none"
                            placeholder="{{ __('ExampleDescription') }}"></textarea>
                    </div>
                    <input type="hidden" name="residence_id" value="{{ $residence->id }}">

                    {{-- <div class="flex flex-row justify-end px-[25px]"> --}}
                        <button type="submit">
                            <div class="rounded-[60px] border-[1px_solid_#9EAFCE] bg-[#3C4C7C] relative m-[0_25px_0_25px] flex p-[11.5px_0_11.5px_0] box-border justify-center">
                                <span class="break-words font-['Inter'] font-bold text-[14px] text-[#FFFFFF]">{{ __('Envoyer') }}</span>
                            </div>
                        </button>
                    {{-- </div> --}}
                    
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
