@extends('layouts.main')

@section('content')
    {{-- navbar --}}
    @include('layouts.navbar')
        <div class="m-[0_0_27px_20px] flex flex-row justify-between w-[1200px] box-sizing-border">
          <div class="m-[3px_8.5px_4px_0] inline-block w-[409px] break-words font-['Inter'] font-semibold text-[14px] text-[#3C4C7C]">
          Inventaire
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
          <div class="m-[0_20px_0_0] flex flex-col items-center w-[820px] box-sizing-border">
            <div class="rounded-[20px] bg-[#FFFFFF] relative m-[0_0_10px_0] flex flex-col items-center p-[17px_14px_11.5px_15px] w-[820px] box-sizing-border">
              <div class="m-[0_0_20.5px_0] flex flex-row justify-between w-[791px] box-sizing-border">
                <div class="m-[0.5px_7.5px_0.5px_0] inline-block w-[304px] break-words font-['Inter'] font-semibold text-[12px] text-[#6F7D93]">
                Système de Sécurité “ Caméras de Surveillance ”
                </div>
                <div class="bg-[url('../assets/images/edit_57.png')] bg-[50%_50%] bg-cover bg-no-repeat w-[16px] h-[16px]">
                </div>
              </div>
              <div class="m-[0_16px_0_15px] flex flex-row justify-between w-[760px] box-sizing-border">
                <span class="m-[0_22.5px_0_0] w-[592px] break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
                Marque : Hikvision<br />
                Nombre de caméras : 25<br />
                Zones couvertes : Entrées, sorties, parkings, couloirs principaux
                </span>
                <div class="m-[7.5px_0_7.5px_0] inline-block text-right break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
                Date d’instalation : Mars 2024<br />
                Prochaine révision : Mars 2025<br />
                
                </div>
              </div>
            </div>
            <div class="rounded-[20px] bg-[#FFFFFF] relative m-[0_0_10px_0] flex flex-col items-center p-[17px_14px_12.5px_15px] w-[820px] box-sizing-border">
              <div class="m-[0_0_19.5px_0] flex flex-row justify-between w-[791px] box-sizing-border">
                <div class="m-[0.5px_7.5px_0.5px_0] inline-block w-[526px] break-words font-['Inter'] font-semibold text-[12px] text-[#6F7D93]">
                Produit de Nettoyage “ Détergent Multi-Usage ”
                </div>
                <div class="bg-[url('../assets/images/edit_57.png')] bg-[50%_50%] bg-cover bg-no-repeat w-[16px] h-[16px]">
                </div>
              </div>
              <div class="m-[0_16px_0_15px] flex flex-row justify-between w-[760px] box-sizing-border">
                <span class="m-[0_22.5px_0_0] w-[592px] break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
                Marque : Sanytol<br />
                Quantité : 250 L<br />
                Utilisation : Nettoyage des sols, des surfaces communes, des ascenseurs
                </span>
                <div class="m-[7.5px_0_7.5px_0] inline-block text-right break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
                Date d’achat : Mars 2024<br />
                Prochaine achat : Août 2024<br />
                
                </div>
              </div>
            </div>
            <div class="rounded-[20px] bg-[#FFFFFF] relative m-[0_0_10px_0] flex flex-col items-center p-[17px_14px_25px_15px] w-[820px] box-sizing-border">
              <div class="m-[0_0_17px_0] flex flex-row justify-between w-[791px] box-sizing-border">
                <div class="m-[0.5px_7.5px_0.5px_0] inline-block w-[315px] break-words font-['Inter'] font-semibold text-[12px] text-[#6F7D93]">
                Produits de Réparation “ Plâtre et Enduit “
                </div>
                <div class="bg-[url('../assets/images/edit_57.png')] bg-[50%_50%] bg-cover bg-no-repeat w-[16px] h-[16px]">
                </div>
              </div>
              <div class="m-[0_16px_0_15px] flex flex-row justify-between w-[760px] box-sizing-border">
                <div class="m-[5px_15px_0_0] inline-block w-[473px] break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
                Marque : Weber<br />
                Utilisation : Réparation des fissures, entretien des murs
                </div>
                <div class="m-[0_0_5px_0] inline-block text-right break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
                Date d&#39;achat : Juillet 2023<br />
                Prochain achat : Janvier 2024
                </div>
              </div>
            </div>
            <div class="rounded-[20px] bg-[#FFFFFF] relative m-[0_0_10px_0] flex flex-col items-center p-[17px_14px_19px_15px] w-[820px] box-sizing-border">
              <div class="m-[0_0_28px_0] flex flex-row justify-between w-[791px] box-sizing-border">
                <div class="m-[0.5px_7.5px_0.5px_0] inline-block w-[304px] break-words font-['Inter'] font-semibold text-[12px] text-[#6F7D93]">
                Chauffage et Climatisation “ Chauffage Central “
                </div>
                <div class="bg-[url('../assets/images/edit_57.png')] bg-[50%_50%] bg-cover bg-no-repeat w-[16px] h-[16px]">
                </div>
              </div>
              <div class="m-[0_16px_0_15px] flex flex-row justify-between w-[760px] box-sizing-border">
                <span class="m-[0_15px_0_0] w-[592px] break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
                MType : Chaudière à gaz<br />
                Marque : Viessmann Vitodens 200-W
                </span>
                <span class="text-right break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
                Date d’instalation : Octobre 2023<br />
                Prochaine révision : Octobre 2025<br />
                
                </span>
              </div>
            </div>
            <div class="rounded-[20px] bg-[#FFFFFF] relative flex flex-col items-center p-[17px_14px_20px_15px] w-[820px] box-sizing-border">
              <div class="m-[0_0_27px_0] flex flex-row justify-between w-[791px] box-sizing-border">
                <div class="m-[0.5px_7.5px_0.5px_0] inline-block w-[526px] break-words font-['Inter'] font-semibold text-[12px] text-[#6F7D93]">
                Salles de Fitness et Bien-être “ Équipements de Gymnastique “
                </div>
                <div class="bg-[url('../assets/images/edit_57.png')] bg-[50%_50%] bg-cover bg-no-repeat w-[16px] h-[16px]">
                </div>
              </div>
              <div class="m-[0_16px_0_15px] flex flex-row justify-between w-[760px] box-sizing-border">
                <span class="m-[0_15px_0_0] w-[592px] break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
                Marques : Technogym, Life Fitness<br />
                Types d&#39;équipements : Tapis de course, vélos elliptiques, haltères, machines de musculation
                </span>
                <span class="text-right break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
                Dernière révision : Juillet 2023<br />
                Prochaine révision : Mars 2025<br />
                
                </span>
              </div>
            </div>
          </div>
          <div class="shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] rounded-[20px] bg-[#FFFFFF] relative m-[0_0_36px_0] flex flex-col p-[16.5px_0_18px_0] w-[380px] box-sizing-border">
            <div class="m-[0_25px_26.5px_25px] inline-block self-start break-words font-['Inter'] font-semibold text-[14px] text-[#3C4C7C]">
            Ajouter Inventaire
            </div>
            <div class="bg-[#F7F7F7] m-[0_0_24.5px_0] w-[380px] h-[0px]">
            </div>
            <div class="m-[0_25px_12.5px_25px] inline-block self-start break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
            Entrez Nom d’installation ou du produit
            </div>
            <div class="rounded-[8px] border-[1px_solid_#9EAFCE] bg-[#F1F1F1] relative m-[0_25px_19.5px_25px] p-[12.5px_15px_12.5px_15px] w-[fit-content] box-sizing-border">
              <span class="break-words font-['Inter'] font-normal text-[12px] text-[#A2A2A2]">
              Produit de Nettoyage “ Détergent Multi-Usage ”
              </span>
            </div>
            <div class="m-[0_25px_12.5px_25px] inline-block self-start break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
            Saisir Détails
            </div>
            <div class="rounded-[8px] border-[1px_solid_#9EAFCE] bg-[#F1F1F1] relative m-[0_25px_19.5px_25px] p-[12.5px_15px_42.5px_15px] w-[fit-content] box-sizing-border">
              <span class="break-words font-['Inter'] font-normal text-[12px] text-[#A2A2A2]">
              Marque : Synditchat<br />
              Quantité : 250 L<br />
              Utilisation : Nettoyage des sols, des surfaces ...
              </span>
            </div>
            <div class="m-[0_25px_12.5px_25px] inline-block self-start break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
            Saisir les datee
            </div>
            <div class="rounded-[8px] border-[1px_solid_#9EAFCE] bg-[#F1F1F1] relative m-[0_25px_50px_25px] p-[15px_15px_35px_15px] w-[fit-content] box-sizing-border">
              <span class="break-words font-['Inter'] font-normal text-[12px] text-[#A2A2A2]">
              Date d&#39;achat : Juillet 2023<br />
              Prochain achat : Janvier 2024
              </span>
            </div>
            <div class="bg-[#F7F7F7] m-[0_0_16px_0] w-[380px] h-[0px]">
            </div>
            <div class="rounded-[60px] border-[1px_solid_#9EAFCE] bg-[#3C4C7C] relative m-[0_25px_0_25px] flex p-[11.5px_0_11.5px_0] w-[330px] box-sizing-border">
              <span class="break-words font-['Inter'] font-bold text-[14px] text-[#FFFFFF]">
              Ajouter
              </span>
            </div>
          </div>
        </div>
        <div class="rounded-[20px] bg-[#FFFFFF] relative m-[0_0_7px_0] flex flex-col items-center self-start p-[17px_14px_25px_15px] w-[820px] box-sizing-border">
          <div class="m-[0_0_17px_0] flex flex-row justify-between w-[791px] box-sizing-border">
            <div class="m-[0.5px_7.5px_0.5px_0] inline-block w-[315px] break-words font-['Inter'] font-semibold text-[12px] text-[#6F7D93]">
            Produits de Maintenance “ Lubrifiant Multi-Usage “
            </div>
            <div class="bg-[url('../assets/images/edit_57.png')] bg-[50%_50%] bg-cover bg-no-repeat w-[16px] h-[16px]">
            </div>
          </div>
          <div class="m-[0_16px_0_15px] flex flex-row justify-between w-[760px] box-sizing-border">
            <div class="m-[5px_15px_0_0] inline-block w-[473px] break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
            Marque : WD-40<br />
            Utilisation : Entretien des portes, fenêtres, mécanismes d&#39;ascenseurs
            </div>
            <div class="m-[0_0_5px_0] inline-block text-right break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
            Date d&#39;achat : Juin 2023<br />
            Prochain achat : Novembre 2024
            </div>
          </div>
        </div>
        <div class="rounded-[20px] bg-[#FFFFFF] relative flex flex-col items-center self-start p-[17px_14px_12.5px_15px] w-[820px] box-sizing-border">
          <div class="m-[0_0_19.5px_0] flex flex-row justify-between w-[791px] box-sizing-border">
            <div class="m-[0.5px_7.5px_0.5px_0] inline-block w-[526px] break-words font-['Inter'] font-semibold text-[12px] text-[#6F7D93]">
            Produit de Nettoyage “ Détergent Multi-Usage ”
            </div>
            <div class="bg-[url('../assets/images/edit_57.png')] bg-[50%_50%] bg-cover bg-no-repeat w-[16px] h-[16px]">
            </div>
          </div>
          <div class="m-[0_16px_0_15px] flex flex-row justify-between w-[760px] box-sizing-border">
            <span class="m-[0_22.5px_0_0] w-[592px] break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
            Marque : Sanytol<br />
            Quantité : 250 L<br />
            Utilisation : Nettoyage des sols, des surfaces communes, des ascenseurs
            </span>
            <div class="m-[7.5px_0_7.5px_0] inline-block text-right break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
            Date d’achat : Mars 2023<br />
            Prochaine achat : Mars 2024<br />
            
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>