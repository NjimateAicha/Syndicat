@extends('layouts.main')
<!-- main -->
@section('content')
{{-- navbar --}}
@include('layouts.navbar')
  <body>
      <div class="flex flex-col box-sizing-border">
        
        <div class="m-[0_0_27px_20px] flex flex-row justify-between w-[1200px] box-sizing-border">
          <div class="m-[3px_8.5px_4px_0] inline-block w-[409px] break-words font-['Inter'] font-semibold text-[14px] text-[#3C4C7C]">
          Info’Com
          </div>
          <div class="rounded-[8px] bg-[linear-gradient(90deg,#9EAFCE,#697C9B)] relative flex flex-row p-[4px_18px_4px_19px] box-sizing-border">
            <div class="m-[0.5px_17.9px_0.5px_0] inline-block break-words font-['Inter'] font-medium text-[12px] text-[#FFFFFF]">
            Filter
            </div>
            <div class="bg-[url('../assets/images/filter_11.png')] bg-[50%_50%] bg-cover bg-no-repeat w-[16px] h-[16px]">
            </div>
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
            <div class="rounded-[20px] bg-[#FFFFFF] relative m-[0_0_10px_0] flex flex-col items-center p-[17.5px_20px_16px_15px] w-[fit-content] box-sizing-border">
              <div class="m-[0_0_23.5px_0] flex flex-row justify-between w-[785px] box-sizing-border">
                <span class="m-[0_7.5px_0_0] w-[526px] break-words font-['Inter'] font-semibold text-[12px] text-[#6F7D93]">
                Des travaux de peinture des escaliers sont prévus : le 16/07/2024
                </span>
                <span class="break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
                10 Juillet 2024
                </span>
              </div>
              <span class="m-[0_37.8px_0_15px] break-words font-['Inter'] font-normal text-[12px] leading-[1.3] text-[#6F7D93]">
              Nous invitons tous les habitants à prendre les dispositions nécessaires pour s&#39;y préparer. Veuillez éviter d&#39;utiliser les escaliers pendant cette période et utiliser les ascenseurs ou autres alternatives si possible. Nous vous remercions de votre compréhension et de votre coopération.
              </span>
            </div>
            
           
            
            
          </div>
          <div class="shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] rounded-[20px] bg-[#FFFFFF] relative m-[0_0_46px_0] flex flex-col p-[16.5px_0_18px_0] box-sizing-border">
            <div class="m-[0_25px_26.5px_25px] inline-block self-start break-words font-['Inter'] font-semibold text-[14px] text-[#3C4C7C]">
            Ajouter Un Info’Com
            </div>
            <div class="bg-[#F7F7F7] m-[0_0_24.5px_0] w-[380px] h-[0px]">
            </div>
            <div class="m-[0_25px_12.5px_25px] inline-block self-start break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
            Sélectionnez destinataire 
            </div>
            <div class="rounded-[8px] border-[1px_solid_#9EAFCE] bg-[#F1F1F1] relative m-[0_25px_19.5px_25px] flex flex-row justify-between p-[12.5px_15px_9px_15px] w-[330px] box-sizing-border">
              <div class="m-[0_7.5px_3.5px_0] inline-block w-[239px] break-words font-['Inter'] font-normal text-[12px] text-[#A2A2A2]">
              Sélectionnez un ou plusieurs
              </div>
              <div class="bg-[url('../assets/images/arrow_down_sign_to_navigate_11.png')] bg-[50%_50%] bg-cover bg-no-repeat m-[2.5px_0_0_0] w-[16px] h-[16px]">
              </div>
            </div>
            <div class="m-[0_25px_12.5px_25px] inline-block self-start break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
            Entrez le titre 
            </div>
            <div class="rounded-[8px] border-[1px_solid_#9EAFCE] bg-[#F1F1F1] relative m-[0_25px_19.5px_25px] p-[12.5px_15px_12.5px_15px] w-[fit-content] box-sizing-border">
              <span class="break-words font-['Inter'] font-normal text-[12px] text-[#A2A2A2]">
              Exemple : Coupure d’eau prévue le : 23/07/2024
              </span>
            </div>
            <div class="m-[0_25px_12.5px_25px] inline-block self-start break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
            Saisir une description
            </div>
            <div class="rounded-[8px] border-[1px_solid_#9EAFCE] bg-[#F1F1F1] relative m-[0_25px_40px_25px] flex p-[17px_0.9px_103px_15px] box-sizing-border">
              <span class="break-words font-['Inter'] font-normal text-[12px] text-[#A2A2A2]">
              ( Facultatif ) Exemple: Nous invitons tous les habitants<br />
               à prendre les dispositions nécessaires pour ...
              </span>
            </div>
            <div class="bg-[#F7F7F7] m-[0_0_16px_0] w-[380px] h-[0px]">
            </div>
            <div class="rounded-[60px] border-[1px_solid_#9EAFCE] bg-[#3C4C7C] relative m-[0_25px_0_25px] flex p-[11.5px_0_11.5px_0] w-[330px] box-sizing-border">
              <span class="break-words font-['Inter'] font-bold text-[14px] text-[#FFFFFF]">
              Envoyer
              </span>
            </div>
          </div>
        </div>
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
  </body>
</html>