@extends('layouts.main')

@section('content')
    <x-layouts.navbar :user="Auth::user()" route="reclamations.residence"></x-layouts.navbar>



    <div class="flex flex-col w-full">
        <!-- Header Section -->
        <div class="pb-[27px] flex flex-row justify-between w-full">
            <!-- Content for the first layout -->
            <div class="flex-1 text-white  rounded-lg">
                <div
                    class="m-[3px_8.5px_4px_0] inline-block w-[409px] break-words font-['Inter'] font-semibold text-[14px] text-[#3C4C7C]">
                    {{__('Sinistres et Nuisances Déclarés au Sein de la Résidence')}}
                </div>space-y-4
            </div>
            <div class="flex-1 text-white  rounded-lg flex justify-end">
                <x-reclamation.filter></x-reclamation.filter>
            </div>
        </div>

        <!-- First layout -->
        <div class="flex flex-row justify-between">
            <div id="reclamtions" class="flex flex-col items-center pr-[20px] w-full ">
                @if (isset($reclamations) && $reclamations->isNotEmpty())
                    @foreach ($reclamations as $post)
                        <x-reclamation.card-post :data="$post" :user="$user"></x-reclamation.card-post>
                    @endforeach
                @else
                    <p>No reclamations found.</p>
                    <script>
                        document.getElementById('reclamtions').classList.add('hidden');
                    </script>
                @endif
                <div class="mt-4 w-full flex justify-center">
                    {{ $reclamations->links('vendor.pagination.tailwind') }} <!-- Adjust pagination style if needed -->
                </div>
            </div>
            <!-- Content for the second layout (Form) -->

            @if (@$residence_id)
                <x-reclamation.form-ajoute-declaration postUrl="reclamations.store"
                    :residence="$residence_id"></x-reclamation.form-ajoute-declaration>
            @else
                <p>No resident found.</p>
            @endif

        </div>

    </div>

@endsection
