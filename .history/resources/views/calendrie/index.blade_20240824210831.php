@extends('layouts.main')

@section('content')
    {{-- navbar --}}
    <x-layouts.navbar :user="Auth::user()" route="calendrie.index" ></x-layouts.navbar>
        <div class="m-[0_5px_27px_20px] flex flex-row justify-between w-[1200px] box-sizing-border">
          <div class="m-[3px_8.5px_4px_0] inline-block w-[409px] break-words font-['Inter'] font-semibold text-[14px] text-[#3C4C7C]">
          Calendrier
          </div>
          <div class="rounded-[8px] bg-[linear-gradient(90deg,#9EAFCE,#697C9B)] relative flex flex-row p-[4px_15px_4px_0] w-[200px] box-sizing-border">
            <div class="m-[0.5px_12.6px_0.5px_0] inline-block break-words font-['Inter'] font-medium text-[12px] text-[#FFFFFF]">
            Ajouter un évenement
            </div>
            <div class="bg-[url('../assets/images/plus_1.png')] bg-[50%_50%] bg-cover bg-no-repeat w-[16px] h-[16px]">
            </div>
          </div>
        </div>
        <div class="relative flex box-sizing-border">
          <div class="relative flex flex-row box-sizing-border">
            <div class="rounded-[20px] bg-[#FFFFFF] relative m-[0_25px_0_0] flex p-[23px_0_63px_0] box-sizing-border">
              <div class="relative flex flex-col items-end box-sizing-border">
                <div class="m-[0_0_83px_1px] flex flex-row justify-between self-center w-[451px] box-sizing-border">
                  <div class="shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] rounded-[8px] bg-[#E9ECEE] relative flex flex-row p-[4.5px_10px_3px_0] w-[100px] box-sizing-border">
                    <div class="m-[0_11px_1.5px_0] inline-block break-words font-['Inter'] font-semibold text-[12px] text-[#3C4C7C]">
                    Juillet
                    </div>
                    <div class="bg-[url('../assets/images/arrow_down_sign_to_navigate_1.png')] bg-[50%_50%] bg-cover bg-no-repeat m-[4.5px_0_0_0] w-[12px] h-[12px]">
                    </div>
                  </div>
                  <div class="shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] rounded-[8px] bg-[#E9ECEE] relative flex flex-row p-[4.5px_12px_3px_0] w-[100px] box-sizing-border">
                    <div class="m-[0_10.6px_1.5px_0] inline-block break-words font-['Inter'] font-semibold text-[12px] text-[#3C4C7C]">
                    2024
                    </div>
                    <div class="bg-[url('../assets/images/arrow_down_sign_to_navigate_1.png')] bg-[50%_50%] bg-cover bg-no-repeat m-[4.5px_0_0_0] w-[12px] h-[12px]">
                    </div>
                  </div>
                </div>
                <div class="bg-[#F7F7F7] m-[0_0_10.5px_0] w-[820px] h-[0px]">
                </div>
                <div class="m-[0_15px_22.5px_15px] flex flex-row justify-between w-[708.7px] box-sizing-border">
                  <span class="m-[0_7.5px_0_0] w-[102px] break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                  1
                  </span>
                  <span class="break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                  2
                  </span>
                  <span class="break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                  3
                  </span>
                  <span class="break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                  4
                  </span>
                  <span class="break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                  5
                  </span>
                  <span class="break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                  6
                  </span>
                  <span class="m-[0_0px_0_0] break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                  7
                  </span>
                </div>
                <div class="rounded-[10px] bg-[#3C4C7C] m-[0_10px_68px_10px] w-[97px] h-[10px]">
                </div>
                <div class="bg-[#F7F7F7] m-[0_0_10.5px_0] w-[820px] h-[0px]">
                </div>
                <div class="m-[0_15px_27.5px_15px] flex flex-row justify-between w-[710.6px] box-sizing-border">
                  <span class="m-[0_7.5px_0_0] w-[102px] break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                  8
                  </span>
                  <span class="break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                  9
                  </span>
                  <span class="break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                  10
                  </span>
                  <span class="break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                  11
                  </span>
                  <span class="break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                  12
                  </span>
                  <span class="break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                  13
                  </span>
                  <span class="break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                  14
                  </span>
                </div>
                <div class="m-[0_0_5px_118px] flex flex-row justify-between self-center w-[448px] box-sizing-border">
                  <div class="flex flex-row w-[214px] box-sizing-border">
                    <div class="rounded-[10px] bg-[#3C4C7C] m-[0_20px_0_0] w-[97px] h-[10px]">
                    </div>
                    <div class="rounded-[10px] bg-[#3C4C7C] w-[97px] h-[10px]">
                    </div>
                  </div>
                  <div class="rounded-[10px] bg-[#3C4C7C] w-[97px] h-[10px]">
                  </div>
                </div>
                <div class="rounded-[10px] bg-[#3C4C7C] m-[0_0_48px_469px] self-center w-[97px] h-[10px]">
                </div>
                <div class="opacity-[0.82] bg-[#F7F7F7] m-[0_0_10.5px_0] w-[820px] h-[0px]">
                </div>
                <div class="m-[0_15px_26.5px_15px] flex flex-row justify-between w-[716.1px] box-sizing-border">
                  <span class="m-[0_7.5px_0_0] w-[102px] break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                  15
                  </span>
                  <span class="break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                  16
                  </span>
                  <span class="break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                  17
                  </span>
                  <span class="break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                  18
                  </span>
                  <span class="break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                  19
                  </span>
                  <span class="break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                  20
                  </span>
                  <span class="break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                  21
                  </span>
                </div>
                <div class="m-[0_10px_5px_10px] flex flex-row justify-between w-[682px] box-sizing-border">
                  <div class="rounded-[10px] bg-[#3C4C7C] m-[1px_0_0_0] w-[97px] h-[10px]">
                  </div>
                  <div class="flex flex-row w-[214px] box-sizing-border">
                    <div class="rounded-[10px] bg-[#3C4C7C] m-[0_20px_1px_0] w-[97px] h-[10px]">
                    </div>
                    <div class="rounded-[10px] bg-[#3C4C7C] m-[1px_0_0_0] w-[97px] h-[10px]">
                    </div>
                  </div>
                  <div class="rounded-[10px] bg-[#3C4C7C] m-[1px_0_0_0] w-[97px] h-[10px]">
                  </div>
                </div>
                <div class="rounded-[10px] bg-[#3C4C7C] m-[0_10px_5px_10px] w-[97px] h-[10px]">
                </div>
                <div class="rounded-[10px] bg-[#3C4C7C] m-[0_10px_33px_10px] w-[97px] h-[10px]">
                </div>
                <div class="m-[0_15px_0_11px] flex flex-row w-[fit-content] box-sizing-border">
                  <div class="m-[12.5px_20px_63px_0] flex flex-col items-end box-sizing-border">
                    <div class="m-[0_6px_27.5px_6px] inline-block break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                    22
                    </div>
                    <div class="rounded-[10px] bg-[#3C4C7C] w-[97px] h-[10px]">
                    </div>
                  </div>
                  <div class="m-[12.5px_20px_48px_0] flex flex-col items-end box-sizing-border">
                    <div class="m-[0_5px_27.5px_5px] inline-block break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                    23
                    </div>
                    <div class="rounded-[10px] bg-[#3C4C7C] m-[0_0_5px_0] w-[97px] h-[10px]">
                    </div>
                    <div class="rounded-[10px] bg-[#3C4C7C] w-[97px] h-[10px]">
                    </div>
                  </div>
                  <div class="m-[12.5px_97.2px_63px_0] flex flex-col items-end box-sizing-border">
                    <div class="m-[0_5px_27.5px_5px] inline-block break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                    24
                    </div>
                    <div class="rounded-[10px] bg-[#3C4C7C] w-[97px] h-[10px]">
                    </div>
                  </div>
                  <div class="m-[12.5px_102px_100.5px_0] inline-block break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                  25
                  </div>
                  <div class="m-[12.5px_15px_100.5px_0] inline-block break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                  26
                  </div>
                  <div class="bg-[#9EAFCE] relative m-[0_87.1px_0_0] flex flex-col items-end p-[12.5px_10px_18px_10px] box-sizing-border">
                    <div class="m-[0_5px_27.5px_5px] inline-block break-words font-['Inter'] font-medium text-[12px] text-[#FFFFFF]">
                    27
                    </div>
                    <div class="rounded-[10px] bg-[#FFFFFF] m-[0_0_5px_0] w-[97px] h-[10px]">
                    </div>
                    <div class="rounded-[10px] bg-[#FFFFFF] m-[0_0_5px_0] w-[97px] h-[10px]">
                    </div>
                    <div class="rounded-[10px] bg-[#FFFFFF] m-[0_0_5px_0] w-[97px] h-[10px]">
                    </div>
                    <div class="rounded-[10px] bg-[#FFFFFF] w-[97px] h-[10px]">
                    </div>
                  </div>
                  <div class="m-[12.5px_0_100.5px_0] inline-block break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                  28
                  </div>
                </div>
                <div class="bg-[#F7F7F7] m-[0_0_10.5px_0] w-[820px] h-[0px]">
                </div>
                <div class="m-[0_15px_27.5px_15px] flex flex-row justify-between w-[718px] box-sizing-border">
                  <span class="m-[0_7.5px_0_0] w-[102px] break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                  29
                  </span>
                  <span class="break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                  30
                  </span>
                  <span class="break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                  31
                  </span>
                  <span class="break-words font-['Inter'] font-medium text-[12px] text-[#E5E5E5]">
                  1
                  </span>
                  <span class="break-words font-['Inter'] font-medium text-[12px] text-[#E5E5E5]">
                  2
                  </span>
                  <span class="break-words font-['Inter'] font-medium text-[12px] text-[#E5E5E5]">
                  3
                  </span>
                  <span class="break-words font-['Inter'] font-medium text-[12px] text-[#E5E5E5]">
                  4
                  </span>
                </div>
                <div class="rounded-[10px] bg-[#3C4C7C] m-[0_467px_0_0] self-center w-[97px] h-[10px]">
                </div>
              </div>
              <div class="bg-[#F7F7F7] absolute left-[0px] right-[0px] bottom-[254px] h-[0px]">
              </div>
              <div class="bg-[#F7F7F7] absolute right-[115px] bottom-[0px] w-[640px] h-[0px]">
              </div>
              <div class="bg-[#F7F7F7] absolute right-[232px] bottom-[0px] w-[640px] h-[0px]">
              </div>
              <div class="bg-[#F7F7F7] absolute right-[349px] bottom-[0px] w-[640px] h-[0px]">
              </div>
              <div class="bg-[#F7F7F7] absolute left-[352px] bottom-[0px] w-[640px] h-[0px]">
              </div>
              <div class="bg-[#F7F7F7] absolute left-[235px] bottom-[0px] w-[640px] h-[0px]">
              </div>
              <div class="bg-[#F7F7F7] absolute left-[118px] bottom-[0px] w-[640px] h-[0px]">
              </div>
            </div>
            <div class="shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] rounded-[20px] bg-[#FFFFFF] relative m-[0_0_200px_0] flex flex-col p-[16.5px_25px_245.5px_15px] box-sizing-border">
              <div class="m-[0_0_39px_0] flex flex-row justify-between w-[340px] box-sizing-border">
                <span class="m-[0_8.5px_0_0] w-[310px] break-words font-['Inter'] font-semibold text-[14px] text-[#3C4C7C]">
                Samedi
                </span>
                <span class="break-words font-['Inter'] font-semibold text-[14px] text-[#3C4C7C]">
                27 Juillet 2024
                </span>
              </div>
              <div class="m-[0_0_0.5px_0] inline-block self-start break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
              Collecte de sang
              </div>
              <div class="bg-[url('../assets/images/edit_57.png')] bg-[50%_50%] bg-cover bg-no-repeat self-end w-[12px] h-[12px]">
              </div>
              <div class="m-[0_0_28px_0] inline-block self-start break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
              07:00 - 11:00
              </div>
              <div class="m-[0_0_0.5px_0] inline-block self-start break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
              Marche en groupe
              </div>
              <div class="bg-[url('../assets/images/edit_57.png')] bg-[50%_50%] bg-cover bg-no-repeat self-end w-[12px] h-[12px]">
              </div>
              <div class="m-[0_0_28px_0] inline-block self-start break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
              07:00 - 9:00
              </div>
              <div class="m-[0_0_0.5px_0] inline-block self-start break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
              Barbecue résidentiel
              </div>
              <div class="bg-[url('../assets/images/edit_57.png')] bg-[50%_50%] bg-cover bg-no-repeat self-end w-[12px] h-[12px]">
              </div>
              <div class="m-[0_0_28px_0] inline-block self-start break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
              13:00 - 14:15
              </div>
              <div class="m-[0_0_0.5px_0] inline-block self-start break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
              Soirée jeux de société
              </div>
              <div class="bg-[url('../assets/images/edit_57.png')] bg-[50%_50%] bg-cover bg-no-repeat self-end w-[12px] h-[12px]">
              </div>
              <span class="self-start break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
              20:30 - 22:45
              </span>
            </div>
          </div>
          <div class="bg-[#E9ECEE] absolute left-[1px] top-[70px] flex flex-row justify-between p-[22.5px_30.8px_22.5px_42.2px] w-[820px] box-sizing-border">
            <span class="m-[0_7.5px_0_0] w-[118px] break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
            Lundi
            </span>
            <span class="break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
            Mardi
            </span>
            <span class="break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
            Mercredi
            </span>
            <span class="break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
            Jeudi
            </span>
            <span class="break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
            Vendredi
            </span>
            <span class="break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
            Samedi
            </span>
            <span class="break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
            Dimanche
            </span>
          </div>
          <div class="bg-[#F7F7F7] absolute left-[0px] top-[70px] w-[820px] h-[0px]">
          </div>
          <div class="bg-[#F7F7F7] absolute top-[60px] right-[5px] w-[380px] h-[0px]">
          </div>
        </div>
      </div>
    </div>
    @endsection