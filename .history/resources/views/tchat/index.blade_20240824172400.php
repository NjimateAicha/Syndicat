@extends('layouts.main')

@section('content')
    {{-- navbar --}}
    @include('layouts.navbar')
    
    <div class="flex flex-row w-fit box-border">
        {{-- Sidebar --}}
        <div class="m-5 flex flex-col items-center box-border">
            <div class="flex justify-between w-[360px] mb-7">
                <h2 class="font-semibold text-[14px] text-[#3C4C7C]">Discussions</h2>
                <div class="flex space-x-2">
                    <div class="rounded bg-gradient-to-r from-[#9EAFCE] to-[#697C9B] p-1 w-6 h-6">
                        <div class="bg-[url('../assets/images/chat_31.png')] bg-cover w-4 h-4"></div>
                    </div>
                    <div class="rounded bg-gradient-to-r from-[#9EAFCE] to-[#697C9B] p-1 w-6 h-6">
                        <div class="bg-[url('../assets/images/add_group_1.png')] bg-cover w-4 h-4"></div>
                    </div>
                </div>
            </div>
            
            <div class="shadow-md rounded-2xl bg-white p-5 relative box-border">
                <div class="rounded bg-[#F1F1F1] absolute right-0 bottom-8 p-2 flex flex-col items-center">
                    <div class="bg-[url('../assets/images/arrow_down_sign_to_navigate_1.png')] bg-cover w-2.5 h-2.5 mb-8"></div>
                    <div class="rounded bg-[#9EAFCE] h-[291px] w-1.5 mb-8"></div>
                    <div class="bg-[url('../assets/images/arrow_down_sign_to_navigate_1.png')] bg-cover w-2.5 h-2.5"></div>
                </div>
                
                <div class="relative flex flex-col box-border">
                    <div class="rounded border border-[#9EAFCE] p-3.5 mb-5 w-fit">
                        <span class="text-[12px] text-[#A2A2A2]">Rechercher</span>
                    </div>

                    @foreach ($discussions as $discussion)
                        <div class="flex items-center mb-2.5 space-x-2.5 w-fit box-border {{ $loop->first ? 'border-t border-b border-[#9EAFCE] bg-[#E9ECEE] p-2.5' : '' }}">
                            <div class="rounded-full bg-cover w-7.5 h-7.5" style="background-image: url('{{ $discussion->profile_picture }}')"></div>
                            <p class="text-[12px] text-[#6F7D93]">{{ $discussion->name }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        
        {{-- Main Content --}}
        <div class="flex-grow">
            {{-- Your main content goes here --}}
        </div>
    </div>
@endsection
