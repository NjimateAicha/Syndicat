@extends('layouts.main')

@section('content')
    {{-- navbar --}}
    @include('layouts.navbar')

    <div class="flex flex-row w-full">
        <!-- Sidebar -->
        <div class="sidebar bg-gray-100 w-[250px] p-5">
            <ul>
                <li><a href="#">Lien 1</a></li>
                <li><a href="#">Lien 2</a></li>
                <li><a href="#">Lien 3</a></li>
                <!-- Ajoutez d'autres liens ici -->
            </ul>
        </div>

        <!-- Contenu principal -->
        <div class="main-content flex-1 p-5">
            <div class="m-[0_5px_27px_20px] flex flex-row justify-between w-[1200px] box-sizing-border">
                <div class="m-[3px_8.5px_4px_0] inline-block w-[409px] break-words font-['Inter'] font-semibold text-[14px] text-[#3C4C7C]">
                    Calendrier
                </div>
                <div class="rounded-[8px] bg-[linear-gradient(90deg,#9EAFCE,#697C9B)] relative flex flex-row p-[4px_15px_4px_0] w-[200px] box-sizing-border">
                    <div class="m-[0.5px_12.6px_0.5px_0] inline-block break-words font-['Inter'] font-medium text-[12px] text-[#FFFFFF]">
                        Ajouter un évenement
                    </div>
                    <div class="bg-[url('../assets/images/plus_1.png')] bg-[50%_50%] bg-cover bg-no-repeat w-[16px] h-[16px]"></div>
                </div>
            </div>
            <div class="relative flex box-sizing-border">
                <div class="relative flex flex-row box-sizing-border">
                    <div class="rounded-[20px] bg-[#FFFFFF] relative m-[0_25px_0_0] flex p-[23px_0_63px_0] box-sizing-border">
                        <div class="relative flex flex-col items-end box-sizing-border">
                            <!-- Reste du contenu du calendrier -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
