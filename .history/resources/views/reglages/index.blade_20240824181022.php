@extends('layouts.main')

@section('content')
    {{-- navbar --}}
    <x-layouts.navbar :user="Auth::user()" route="inventaire.index" ></x-layouts.navbar>
    
    <div class="flex flex-row box-sizing-border">
        <div class="bg-[url('../assets/images/r_21.jpeg')] m-[10px_26.2px_10px_0] w-[42px] h-[30px]">
        </div>
        <div class="m-[6px_20px_6px_0] inline-block text-right break-words font-['Fredoka_One','Roboto_Condensed'] font-normal text-[16px] text-[#6F7D93]">
         Ayoub Daali<br />
        Admin
        </div>
        <div class="rounded-[50px] bg-[url('../assets/images/r_95.jpeg')] w-[50px] h-[50px]">
        </div>
      </div>
    </div>
    <div class="m-[0_5px_24px_20px] flex flex-row justify-between w-[1200px] box-sizing-border">
      <div class="m-[3px_8.5px_4px_0] inline-block w-[409px] break-words font-['Inter'] font-semibold text-[14px] text-[#3C4C7C]">
      Contacts utiles
      </div>
      <div class="rounded-[8px] bg-[linear-gradient(90deg,#9EAFCE,#697C9B)] relative flex flex-row p-[4px_14px_4px_13px] box-sizing-border">
        <div class="m-[0.5px_15px_0.5px_0] inline-block break-words font-['Inter'] font-medium text-[12px] text-[#FFFFFF]">
        Ajouter utilisateur
        </div>
        <div class="bg-[url('../assets/images/plus_1.png')] bg-[50%_50%] bg-cover bg-no-repeat w-[16px] h-[16px]">
        </div>
      </div>
    </div>
    <div class="flex flex-row w-[fit-content] box-sizing-border">
      <div class="shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] rounded-[20px] bg-[#FFFFFF] relative m-[3px_25px_0_0] flex flex-col p-[37.5px_0_15px_0] w-[820px] h-[fit-content] box-sizing-border">
        <div class="m-[0_20px_17.5px_20px] flex flex-row justify-between self-start w-[640.7px] box-sizing-border">
          <span class="m-[0_7.5px_0_0] w-[270px] break-words font-['Inter'] font-semibold text-[12px] text-[#6F7D93]">
          GESTIONNAIRE
          </span>
          <span class="break-words font-['Inter'] font-semibold text-[12px] text-[#6F7D93]">
          ADRESSE
          </span>
          <span class="break-words font-['Inter'] font-semibold text-[12px] text-[#6F7D93]">
          ROLE
          </span>
          <span class="m-[0_0px_0_0] break-words font-['Inter'] font-semibold text-[12px] text-[#6F7D93]">
          TELEPHONE
          </span>
        </div>
        <div class="bg-[#F7F7F7] m-[0_0_13px_0] w-[820px] h-[0px]">
        </div>
        <div class="m-[0_45.5px_15px_15px] flex flex-row justify-between w-[759.5px] box-sizing-border">
          <div class="flex flex-row box-sizing-border">
            <div class="rounded-[8px] bg-[url('../assets/images/r_95.jpeg')] m-[0_10px_0_0] w-[40px] h-[40px]">
            </div>
            <div class="m-[5px_0_2.5px_0] flex flex-col box-sizing-border">
              <div class="m-[0_0_2.5px_0] inline-block self-start break-words font-['Inter'] font-semibold text-[12px] text-[#3A416F]">
              Hassan BILAL
              </div>
              <span class="break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
              hassanBilal@synditchat.com
              </span>
            </div>
          </div>
          <div class="m-[5px_0_2.5px_0] flex flex-col items-center box-sizing-border">
            <div class="m-[0_20px_2.5px_0] inline-block break-words font-['Inter'] font-medium text-[12px] text-[rgba(58,65,111,0.8)]">
            Immeuble 13
            </div>
            <span class="break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
            Appartement 08
            </span>
          </div>
          <div class="rounded-[8px] bg-[linear-gradient(90deg,#80C637,#34B734)] relative m-[8px_0_8px_0] flex p-[6px_4px_6px_4px] box-sizing-border">
            <span class="break-words font-['Inter'] font-medium text-[10px] text-[#FFFFFF]">
            Manager Principale
            </span>
          </div>
          <div class="m-[12.5px_0_12.5px_0] inline-block break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
          06 43 39 25 56
          </div>
          <div class="m-[12.5px_0_12.5px_0] inline-block break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
          Supprimer
          </div>
        </div>
        <div class="bg-[#F7F7F7] m-[0_0_13px_0] w-[820px] h-[0px]">
        </div>
        <div class="m-[0_45.5px_15px_15px] flex flex-row justify-between w-[759.5px] box-sizing-border">
          <div class="flex flex-row box-sizing-border">
            <div class="rounded-[8px] bg-[url('../assets/images/r_95.jpeg')] m-[0_10px_0_0] w-[40px] h-[40px]">
            </div>
            <div class="m-[4px_0_2.5px_0] flex flex-col box-sizing-border">
              <div class="m-[0_0_3.5px_0] inline-block self-start break-words font-['Inter'] font-semibold text-[12px] text-[#3A416F]">
              Hassan BILAL
              </div>
              <span class="break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
              hassanBilal@synditchat.com
              </span>
            </div>
          </div>
          <div class="m-[4px_0_2.5px_0] flex flex-col box-sizing-border">
            <div class="m-[0_0_3.5px_0] inline-block self-start break-words font-['Inter'] font-medium text-[12px] text-[rgba(58,65,111,0.8)]">
            Immeuble 13
            </div>
            <span class="break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
            Appartement 09
            </span>
          </div>
          <div class="rounded-[8px] bg-[linear-gradient(90deg,#3A416F,#111A58)] relative m-[8px_0_8px_0] flex p-[6px_0_6px_0] w-[100px] h-[fit-content] box-sizing-border">
            <span class="break-words font-['Inter'] font-medium text-[10px] text-[#FFFFFF]">
            Manager
            </span>
          </div>
          <div class="m-[12.5px_0_12.5px_0] inline-block break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
          06 61 61 61 61
          </div>
          <div class="m-[12.5px_0_12.5px_0] inline-block break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
          Supprimer
          </div>
        </div>
        <div class="bg-[#F7F7F7] m-[0_0_13px_0] w-[820px] h-[0px]">
        </div>
        <div class="m-[0_45.5px_15px_15px] flex flex-row justify-between w-[759.5px] box-sizing-border">
          <div class="flex flex-row box-sizing-border">
            <div class="rounded-[8px] bg-[url('../assets/images/r_95.jpeg')] m-[0_10px_0_0] w-[40px] h-[40px]">
            </div>
            <div class="m-[5px_0_2.5px_0] flex flex-col box-sizing-border">
              <div class="m-[0_0_2.5px_0] inline-block self-start break-words font-['Inter'] font-semibold text-[12px] text-[#3A416F]">
              Hassan BILAL
              </div>
              <span class="break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
              hassanBilal@synditchat.com
              </span>
            </div>
          </div>
          <div class="m-[5px_0_2.5px_0] flex flex-col items-center box-sizing-border">
            <div class="m-[0_16.2px_2.5px_0] inline-block break-words font-['Inter'] font-medium text-[12px] text-[rgba(58,65,111,0.8)]">
            Immeuble 13
            </div>
            <span class="break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
            Appartement 11
            </span>
          </div>
          <div class="rounded-[8px] bg-[linear-gradient(90deg,#3A416F,#111A58)] relative m-[8px_0_8px_0] flex p-[6px_0_6px_0] w-[100px] h-[fit-content] box-sizing-border">
            <span class="break-words font-['Inter'] font-medium text-[10px] text-[#FFFFFF]">
            Manager
            </span>
          </div>
          <div class="m-[12.5px_0_12.5px_0] inline-block break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
          06 12 34 56 78
          </div>
          <div class="m-[12.5px_0_12.5px_0] inline-block break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
          Supprimer
          </div>
        </div>
        <div class="bg-[#F7F7F7] m-[0_0_13px_0] w-[820px] h-[0px]">
        </div>
        <div class="m-[0_45.5px_15px_15px] flex flex-row justify-between w-[759.5px] box-sizing-border">
          <div class="flex flex-row box-sizing-border">
            <div class="rounded-[8px] bg-[url('../assets/images/r_95.jpeg')] m-[0_10px_0_0] w-[40px] h-[40px]">
            </div>
            <div class="m-[5px_0_2.5px_0] flex flex-col box-sizing-border">
              <div class="m-[0_0_2.5px_0] inline-block self-start break-words font-['Inter'] font-semibold text-[12px] text-[#3A416F]">
              Hassan BILAL
              </div>
              <span class="break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
              hassanBilal@synditchat.com
              </span>
            </div>
          </div>
          <div class="m-[5px_0_2.5px_0] flex flex-col items-center box-sizing-border">
            <div class="m-[0_17.9px_2.5px_0] inline-block break-words font-['Inter'] font-medium text-[12px] text-[rgba(58,65,111,0.8)]">
            Immeuble 13
            </div>
            <span class="break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
            Appartement 12
            </span>
          </div>
          <div class="rounded-[8px] bg-[linear-gradient(90deg,#697C9B,#3A416F)] relative m-[8px_0_8px_0] flex p-[6px_0_6px_0] w-[100px] h-[fit-content] box-sizing-border">
            <span class="break-words font-['Inter'] font-medium text-[10px] text-[#FFFFFF]">
            Propriétaire
            </span>
          </div>
          <div class="m-[12.5px_0_12.5px_0] inline-block break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
          06 12 34 56 78
          </div>
          <div class="m-[12.5px_0_12.5px_0] inline-block break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
          Supprimer
          </div>
        </div>
        <div class="bg-[#F7F7F7] m-[0_0_13px_0] w-[820px] h-[0px]">
        </div>
        <div class="m-[0_45.5px_15px_15px] flex flex-row justify-between w-[759.5px] box-sizing-border">
          <div class="flex flex-row box-sizing-border">
            <div class="rounded-[8px] bg-[url('../assets/images/r_95.jpeg')] m-[0_10px_0_0] w-[40px] h-[40px]">
            </div>
            <div class="m-[5px_0_2.5px_0] flex flex-col box-sizing-border">
              <div class="m-[0_0_2.5px_0] inline-block self-start break-words font-['Inter'] font-semibold text-[12px] text-[#3A416F]">
              Hassan BILAL
              </div>
              <span class="break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
              hassanBilal@synditchat.com
              </span>
            </div>
          </div>
          <div class="m-[5px_0_2.5px_0] flex flex-col items-center box-sizing-border">
            <div class="m-[0_16.2px_2.5px_0] inline-block break-words font-['Inter'] font-medium text-[12px] text-[rgba(58,65,111,0.8)]">
            Immeuble 13
            </div>
            <span class="break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
            Appartement 11
            </span>
          </div>
          <div class="rounded-[8px] bg-[linear-gradient(90deg,#697C9B,#3A416F)] relative m-[3px_0_13px_0] flex p-[6px_0_6px_0] w-[100px] h-[fit-content] box-sizing-border">
            <span class="break-words font-['Inter'] font-medium text-[10px] text-[#FFFFFF]">
            Propriétaire
            </span>
          </div>
          <div class="m-[12.5px_0_12.5px_0] inline-block break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
          06 12 34 56 78
          </div>
          <div class="m-[12.5px_0_12.5px_0] inline-block break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
          Supprimer
          </div>
        </div>
        <div class="bg-[#F7F7F7] m-[0_0_13px_0] w-[820px] h-[0px]">
        </div>
        <div class="m-[0_45.5px_15px_15px] flex flex-row justify-between w-[759.5px] box-sizing-border">
          <div class="flex flex-row box-sizing-border">
            <div class="rounded-[8px] bg-[url('../assets/images/r_95.jpeg')] m-[0_10px_0_0] w-[40px] h-[40px]">
            </div>
            <div class="m-[5px_0_2.5px_0] flex flex-col box-sizing-border">
              <div class="m-[0_0_2.5px_0] inline-block self-start break-words font-['Inter'] font-semibold text-[12px] text-[#3A416F]">
              Hassan BILAL
              </div>
              <span class="break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
              hassanBilal@synditchat.com
              </span>
            </div>
          </div>
          <div class="m-[5px_0_2.5px_0] flex flex-col items-center box-sizing-border">
            <div class="m-[0_17.9px_2.5px_0] inline-block break-words font-['Inter'] font-medium text-[12px] text-[rgba(58,65,111,0.8)]">
            Immeuble 13
            </div>
            <span class="break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
            Appartement 12
            </span>
          </div>
          <div class="rounded-[8px] bg-[linear-gradient(90deg,#697C9B,#3A416F)] relative m-[8px_0_8px_0] flex p-[6px_0_6px_0] w-[100px] h-[fit-content] box-sizing-border">
            <span class="break-words font-['Inter'] font-medium text-[10px] text-[#FFFFFF]">
            Propriétaire
            </span>
          </div>
          <div class="m-[12.5px_0_12.5px_0] inline-block break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
          06 12 34 56 78
          </div>
          <div class="m-[12.5px_0_12.5px_0] inline-block break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
          Supprimer
          </div>
        </div>
        <div class="bg-[#F7F7F7] m-[0_0_13px_0] w-[820px] h-[0px]">
        </div>
        <div class="m-[0_45.5px_15px_15px] flex flex-row justify-between w-[759.5px] box-sizing-border">
          <div class="flex flex-row box-sizing-border">
            <div class="rounded-[8px] bg-[url('../assets/images/r_95.jpeg')] m-[0_10px_0_0] w-[40px] h-[40px]">
            </div>
            <div class="m-[5px_0_2.5px_0] flex flex-col box-sizing-border">
              <div class="m-[0_0_2.5px_0] inline-block self-start break-words font-['Inter'] font-semibold text-[12px] text-[#3A416F]">
              Hassan BILAL
              </div>
              <span class="break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
              hassanBilal@synditchat.com
              </span>
            </div>
          </div>
          <div class="m-[5px_0_2.5px_0] flex flex-col items-center box-sizing-border">
            <div class="m-[0_16.2px_2.5px_0] inline-block break-words font-['Inter'] font-medium text-[12px] text-[rgba(58,65,111,0.8)]">
            Immeuble 13
            </div>
            <span class="break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
            Appartement 11
            </span>
          </div>
          <div class="rounded-[8px] bg-[linear-gradient(90deg,#9EAFCE,#697C9B)] relative m-[8px_0_8px_0] flex p-[6px_0_6px_0] w-[100px] h-[fit-content] box-sizing-border">
            <span class="break-words font-['Inter'] font-medium text-[10px] text-[#FFFFFF]">
            Résident
            </span>
          </div>
          <div class="m-[12.5px_0_12.5px_0] inline-block break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
          06 12 34 56 78
          </div>
          <div class="m-[12.5px_0_12.5px_0] inline-block break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
          Supprimer
          </div>
        </div>
        <div class="bg-[#F7F7F7] m-[0_0_13px_0] w-[820px] h-[0px]">
        </div>
        <div class="m-[0_45.5px_15px_15px] flex flex-row justify-between w-[759.5px] box-sizing-border">
          <div class="flex flex-row box-sizing-border">
            <div class="rounded-[8px] bg-[url('../assets/images/r_95.jpeg')] m-[0_10px_0_0] w-[40px] h-[40px]">
            </div>
            <div class="m-[5px_0_2.5px_0] flex flex-col box-sizing-border">
              <div class="m-[0_0_2.5px_0] inline-block self-start break-words font-['Inter'] font-semibold text-[12px] text-[#3A416F]">
              Hassan BILAL
              </div>
              <span class="break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
              hassanBilal@synditchat.com
              </span>
            </div>
          </div>
          <div class="m-[5px_0_2.5px_0] flex flex-col items-center box-sizing-border">
            <div class="m-[0_17.9px_2.5px_0] inline-block break-words font-['Inter'] font-medium text-[12px] text-[rgba(58,65,111,0.8)]">
            Immeuble 13
            </div>
            <span class="break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
            Appartement 12
            </span>
          </div>
          <div class="rounded-[8px] bg-[linear-gradient(90deg,#9EAFCE,#697C9B)] relative m-[8px_0_8px_0] flex p-[6px_0_6px_0] w-[100px] h-[fit-content] box-sizing-border">
            <span class="break-words font-['Inter'] font-medium text-[10px] text-[#FFFFFF]">
            Résident
            </span>
          </div>
          <div class="m-[12.5px_0_12.5px_0] inline-block break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
          06 12 34 56 78
          </div>
          <div class="m-[12.5px_0_12.5px_0] inline-block break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
          Supprimer
          </div>
        </div>
        <div class="bg-[#F7F7F7] m-[0_0_13px_0] w-[820px] h-[0px]">
        </div>
        <div class="m-[0_45.5px_15px_15px] flex flex-row justify-between w-[759.5px] box-sizing-border">
          <div class="flex flex-row box-sizing-border">
            <div class="rounded-[8px] bg-[url('../assets/images/r_95.jpeg')] m-[0_10px_0_0] w-[40px] h-[40px]">
            </div>
            <div class="m-[5px_0_2.5px_0] flex flex-col box-sizing-border">
              <div class="m-[0_0_2.5px_0] inline-block self-start break-words font-['Inter'] font-semibold text-[12px] text-[#3A416F]">
              Hassan BILAL
              </div>
              <span class="break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
              hassanBilal@synditchat.com
              </span>
            </div>
          </div>
          <div class="m-[5px_0_2.5px_0] flex flex-col items-center box-sizing-border">
            <div class="m-[0_16.2px_2.5px_0] inline-block break-words font-['Inter'] font-medium text-[12px] text-[rgba(58,65,111,0.8)]">
            Immeuble 13
            </div>
            <span class="break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
            Appartement 11
            </span>
          </div>
          <div class="rounded-[8px] bg-[linear-gradient(90deg,#9EAFCE,#697C9B)] relative m-[8px_0_8px_0] flex p-[6px_0_6px_0] w-[100px] h-[fit-content] box-sizing-border">
            <span class="relative break-words font-['Inter'] font-medium text-[10px] text-[#FFFFFF]">
            Résident
            </span>
            <div class="rounded-[8px] bg-[linear-gradient(90deg,#9EAFCE,#697C9B)] absolute left-[50%] bottom-[0px] translate-x-[-50%] flex p-[6px_0_6px_0] w-[100px] box-sizing-border">
              <span class="break-words font-['Inter'] font-medium text-[10px] text-[#FFFFFF]">
              Résident
              </span>
            </div>
          </div>
          <div class="m-[12.5px_0_12.5px_0] inline-block break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
          06 12 34 56 78
          </div>
          <div class="m-[12.5px_0_12.5px_0] inline-block break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
          Supprimer
          </div>
        </div>
        <div class="bg-[#F7F7F7] m-[0_0_13px_0] w-[820px] h-[0px]">
        </div>
        <div class="m-[0_45.5px_0_15px] flex flex-row justify-between w-[759.5px] box-sizing-border">
          <div class="flex flex-row box-sizing-border">
            <div class="rounded-[8px] bg-[url('../assets/images/r_95.jpeg')] m-[0_10px_0_0] w-[40px] h-[40px]">
            </div>
            <div class="m-[5px_0_2.5px_0] flex flex-col box-sizing-border">
              <div class="m-[0_0_2.5px_0] inline-block self-start break-words font-['Inter'] font-semibold text-[12px] text-[#3A416F]">
              Hassan BILAL
              </div>
              <span class="break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
              hassanBilal@synditchat.com
              </span>
            </div>
          </div>
          <div class="m-[5px_0_2.5px_0] flex flex-col items-center box-sizing-border">
            <div class="m-[0_16.2px_2.5px_0] inline-block break-words font-['Inter'] font-medium text-[12px] text-[rgba(58,65,111,0.8)]">
            Immeuble 13
            </div>
            <span class="break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
            Appartement 11
            </span>
          </div>
          <div class="rounded-[8px] bg-[linear-gradient(90deg,#9EAFCE,#697C9B)] relative m-[8px_0_8px_0] flex p-[6px_0_6px_0] w-[100px] h-[fit-content] box-sizing-border">
            <span class="break-words font-['Inter'] font-medium text-[10px] text-[#FFFFFF]">
            Résident
            </span>
          </div>
          <div class="m-[12.5px_0_12.5px_0] inline-block break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
          06 12 34 56 78
          </div>
          <div class="m-[12.5px_0_12.5px_0] inline-block break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
          Supprimer
          </div>
        </div>
      </div>
      <div class="shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] rounded-[20px] bg-[#FFFFFF] relative m-[0_0_156px_0] flex p-[19.5px_15px_36.5px_25px] box-sizing-border">
        <div class="relative flex flex-col box-sizing-border">
          <div class="m-[0_0_56.5px_0] inline-block self-start break-words font-['Inter'] font-semibold text-[14px] text-[#3C4C7C]">
          Mon Profil
          </div>
          <div class="rounded-[80px] border-[1px_solid_#9EAFCE] bg-[url('../assets/images/r_95.jpeg')] m-[0_0_42.5px_10px] self-center w-[80px] h-[80px]">
          </div>
          <div class="m-[0_0_12px_0] flex flex-row justify-between self-start w-[240.1px] box-sizing-border">
            <span class="m-[0_7.5px_0_0] w-[239px] break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
            Nom 
            </span>
            <span class="break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
            Prénom
            </span>
          </div>
          <div class="m-[0_0_28px_0] flex flex-row justify-between self-start w-[231.3px] box-sizing-border">
            <span class="m-[0_7.5px_0_0] w-[239px] break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
            Daali
            </span>
            <span class="m-[0_0px_0_0] break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
            Ayoub
            </span>
          </div>
          <div class="m-[0_0_12px_0] flex flex-row justify-between self-start w-[271.8px] box-sizing-border">
            <span class="m-[0_7.5px_0_0] w-[179px] break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
            Immeuble
            </span>
            <span class="break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
            Appartement
            </span>
          </div>
          <div class="m-[0_1px_28px_1px] flex flex-row justify-between self-start w-[209.1px] box-sizing-border">
            <span class="m-[0_7.5px_0_0] w-[150px] break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
            D
            </span>
            <span class="m-[0_0px_0_0] break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
            27
            </span>
          </div>
          <div class="m-[0_0_12px_0] inline-block self-start break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
          Rôle
          </div>
          <div class="m-[0_0_28px_0] inline-block self-start break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
          Admin
          </div>
          <div class="m-[0_0_12px_0] inline-block self-start break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
          Adresse E-mail
          </div>
          <div class="m-[0_0_28px_0] inline-block self-start break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
          Daddaayoub775@gmail.com
          </div>
          <div class="m-[0_0_12px_0] flex flex-row justify-between w-[340px] box-sizing-border">
            <span class="m-[0_7.5px_0_0] w-[239px] break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
            Numéro de Télephone
            </span>
            <div class="bg-[url('../assets/images/edit_57.png')] bg-[50%_50%] bg-cover bg-no-repeat m-[1.5px_0_1.5px_0] w-[12px] h-[12px]">
            </div>
          </div>
          <div class="m-[0_0_28px_0] inline-block self-start break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
          +212643392556
          </div>
          <div class="flex flex-row justify-between w-[340px] box-sizing-border">
            <span class="m-[0_7.5px_0_0] w-[239px] break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
            Password
            </span>
            <div class="bg-[url('../assets/images/edit_57.png')] bg-[50%_50%] bg-cover bg-no-repeat m-[1.5px_0_1.5px_0] w-[12px] h-[12px]">
            </div>
          </div>
        </div>
        <div class="rounded-[44px] bg-[#9EAFCE] absolute top-[149px] right-[135px] flex p-[6px_6px_6px_6px] w-[24px] h-[24px] box-sizing-border">
          <img class="w-[12px] h-[12px]" src="../assets/vectors/vector_4_x2.svg" />
        </div>
      </div>
    </div>
  </div>
</div>
<div class="bg-[#F7F7F7] absolute top-[250px] right-[7px] w-[380px] h-[0px]">
</div>
</div>
</body>
</html>