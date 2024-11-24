@extends('layouts.main')

@section('content')
    {{-- navbar --}}
    <x-layouts.navbar :user="Auth::user()" route="infocom.index" ></x-layouts.navbar>

    <div class="flex flex-col box-sizing-border">
        <div class="m-[0_0_27px_20px] flex flex-row justify-between w-[1200px] box-sizing-border">
            <div class="m-[3px_8.5px_4px_0] inline-block w-[409px] break-words font-['Inter'] font-semibold text-[14px] text-[#3C4C7C]">
                Info’Com
            </div>
            <div class="rounded-[8px] bg-[linear-gradient(90deg,#9EAFCE,#697C9B)] relative flex flex-row p-[4px_18px_4px_19px] box-sizing-border">
                <div class="m-[0.5px_17.9px_0.5px_0] inline-block break-words font-['Inter'] font-medium text-[12px] text-[#FFFFFF]">
                    Filter
                </div>
                <div class="bg-[url('{{ asset('assets/images/filter_11.png') }}')] bg-[50%_50%] bg-cover bg-no-repeat w-[16px] h-[16px]"></div>
            </div>
        </div>

        <div class="m-[0_0_10px_0] flex flex-row w-[fit-content] box-sizing-border">
            <div class="m-[0_20px_0_0] flex flex-col items-center box-sizing-border">
                <div class="rounded-[20px] bg-[#FFFFFF] relative m-[0_0_10px_0] flex flex-col items-center p-[17.5px_20px_25px_15px] w-[fit-content] box-sizing-border">
                    <div class="m-[0_0_22.5px_0] flex flex-row justify-between w-[785px] box-sizing-border">
                        <span class="m-[0_7.5px_0_0] w-[270px] break-words font-['Inter'] font-semibold text-[12px] text-[#6F7D93]">
                            Coupure d’eau prévue le : 23/07/2024
                        </span>
                        <span class="break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
                            10 Juillet 2024
                        </span>
                    </div>
                    <span class="m-[0_23.9px_0_15px] break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
                        Nous invitons tous les habitants à prendre les dispositions nécessaires pour s&#39;y préparer. Veuillez vous assurer d&#39;avoir suffisamment d&#39;eau potable et d&#39;eau pour les usages domestiques. Nous vous remercions de votre compréhension et de votre coopération.
                    </span>
                </div>

                <!-- Ajoutez d'autres blocs d'info comme ci-dessus -->

                <div class="rounded-[20px] bg-[#FFFFFF] relative m-[0_0_10px_0] flex flex-col items-center self-start p-[17.5px_20px_25px_15px] w-[fit-content] box-sizing-border">
                    <div class="m-[0_0_22.5px_0] flex flex-row justify-between w-[785px] box-sizing-border">
                        <span class="m-[0_7.5px_0_0] w-[270px] break-words font-['Inter'] font-semibold text-[12px] text-[#6F7D93]">
                            Coupure d’eau prévue le : 01/06/2024
                        </span>
                        <span class="break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
                            22 Mai 2024
                        </span>
                    </div>
                    <span class="m-[0_23.9px_0_15px] break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
                        Nous invitons tous les habitants à prendre les dispositions nécessaires pour s&#39;y préparer. Veuillez vous assurer d&#39;avoir suffisamment d&#39;eau potable et d&#39;eau pour les usages domestiques. Nous vous remercions de votre compréhension et de votre coopération.
                    </span>
                </div>

                <div class="rounded-[20px] bg-[#FFFFFF] relative flex flex-row justify-between self-start p-[17.5px_20px_17.5px_15px] w-[820px] box-sizing-border">
                    <span class="m-[0_7.5px_0_0] w-[526px] break-words font-['Inter'] font-semibold text-[12px] text-[#6F7D93]">
                        Réparation finie de l’éclairage Parking sous sol
                    </span>
                    <span class="break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
                        18 Mai 2024
                    </span>
                </div>
            </div>

         
    </div>
@endsection
