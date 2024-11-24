@extends('layouts.main')

@section('content')
    {{-- navbar --}}
    <x-layouts.navbar :user="Auth::user()" route="tchat.index" ></x-layouts.navbar>
        <div class="flex flex-row w-[fit-content] box-sizing-border">
          <div class="m-[19px_20px_0_0] flex flex-col items-center box-sizing-border">
            <div class="m-[0_0_27px_20px] flex flex-row justify-between w-[360px] box-sizing-border">
              <div class="m-[3px_8.5px_4px_0] inline-block w-[409px] break-words font-['Inter'] font-semibold text-[14px] text-[#3C4C7C]">
              Discussions
              </div>
              <div class="flex flex-row w-[58px] box-sizing-border">
                <div class="rounded-[6px] bg-[linear-gradient(90deg,#9EAFCE,#697C9B)] relative m-[0_10px_0_0] flex p-[4px_4px_4px_4px] w-[24px] h-[24px] box-sizing-border">
                  <div class="bg-[url('../assets/images/chat_31.png')] bg-[50%_50%] bg-cover bg-no-repeat w-[16px] h-[16px]">
                  </div>
                </div>
                <div class="rounded-[6px] bg-[linear-gradient(90deg,#9EAFCE,#697C9B)] relative flex p-[4px_4px_4px_4px] w-[24px] h-[24px] box-sizing-border">
                  <div class="bg-[url('../assets/images/add_group_1.png')] bg-[50%_50%] bg-cover bg-no-repeat w-[16px] h-[16px]">
                  </div>
                </div>
              </div>
            </div>
            <div class="shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] rounded-[20px] bg-[#FFFFFF] relative flex p-[10px_0_22px_0] box-sizing-border">
              <div class="rounded-[6px] bg-[#F1F1F1] absolute right-[0px] bottom-[33px] flex flex-col items-center p-[9px_1px_0_1px] box-sizing-border">
                <div class="bg-[url('../assets/images/arrow_down_sign_to_navigate_1.png')] bg-[50%_50%] bg-cover bg-no-repeat m-[0_0_30px_0] w-[10px] h-[10px]">
                </div>
                <div class="rounded-[6px] bg-[#9EAFCE] m-[0_2px_289px_2px] w-[6px] h-[291px]">
                </div>
                <div class="bg-[url('../assets/images/arrow_down_sign_to_navigate_1.png')] bg-[50%_50%] bg-cover bg-no-repeat w-[10px] h-[10px]">
                </div>
              </div>
              <div class="relative flex flex-col box-sizing-border">
                <div class="rounded-[8px] border-[1px_solid_#9EAFCE] relative m-[0_20px_20px_20px] p-[12.5px_20px_12.5px_20px] w-[fit-content] box-sizing-border">
                  <span class="break-words font-['Inter'] font-normal text-[12px] text-[#A2A2A2]">
                  Rechercher
                  </span>
                </div>
                <div class="m-[0_30px_10px_30px] flex flex-row self-start w-[fit-content] box-sizing-border">
                  <div class="rounded-[138px] bg-[url('../assets/images/awesome_profile_picture_10734.jpeg')] bg-[50%_50%] bg-cover bg-no-repeat m-[0_10px_0_0] w-[30px] h-[30px]">
                  </div>
                  <p class="break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                  <span class="khadija-dija-daccord-merci-pour-lide-sub-0"></span><span></span>
                  </p>
                </div>
                <div class="border-t-[1px_solid_#9EAFCE] border-b-[1px_solid_#9EAFCE] bg-[#E9ECEE] relative m-[0_0_10px_0] flex flex-row p-[10px_0_10px_30px] w-[380px] box-sizing-border">
                  <div class="rounded-[100px] bg-[url('../assets/images/oip_133.jpeg')] m-[0_10px_0_0] w-[30px] h-[30px]">
                  </div>
                  <p class="break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                  <span class="hassan-bilal-non-jaccepte-pas-pour-le-moments-sub-0"></span><span></span>
                  </p>
                </div>
                <div class="m-[0_30px_20px_30px] flex flex-row self-start w-[fit-content] box-sizing-border">
                  <div class="rounded-[200px] bg-[url('../assets/images/image.jpeg')] bg-[50%_50%] bg-cover bg-no-repeat m-[0_10px_0_0] w-[30px] h-[30px]">
                  </div>
                  <p class="break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                  <span class="taha-guermaha-merci-pour-linfo-sub-0"></span><span></span>
                  </p>
                </div>
                <div class="m-[0_30px_20px_30px] flex flex-row self-start w-[fit-content] box-sizing-border">
                  <div class="rounded-[200px] bg-[url('../assets/images/profile_414.png')] bg-[50%_50%] bg-cover bg-no-repeat m-[0_10px_0_0] w-[30px] h-[30px]">
                  </div>
                  <p class="break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                  <span class="driss-daddas-daccord-merci-pour-lide-sub-0"></span><span></span>
                  </p>
                </div>
                <div class="m-[0_30px_20px_30px] flex flex-row self-start w-[fit-content] box-sizing-border">
                  <div class="rounded-[15px] bg-[#D9D9D9] relative m-[0_10px_0_0] flex p-[5px_5px_5px_5px] w-[30px] h-[30px] box-sizing-border">
                    <div class="bg-[url('../assets/images/group_1.png')] bg-[50%_50%] bg-cover bg-no-repeat w-[20px] h-[20px]">
                    </div>
                  </div>
                  <p class="break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                  <span class="group-happyness-vous-je-suis-l-sub-0"></span><span class="group-happyness-vous-je-suis-l-sub-6"></span><span></span>
                  </p>
                </div>
                <div class="m-[0_30px_20px_30px] flex flex-row self-start w-[fit-content] box-sizing-border">
                  <div class="bg-[url('../assets/images/logo_1.png')] bg-[50%_50%] bg-cover bg-no-repeat m-[0_10px_0_0] w-[30px] h-[30px]">
                  </div>
                  <p class="break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                  <span class="travels-program-daccord-merci-pour-lide-sub-0"></span><span></span>
                  </p>
                </div>
                <div class="m-[0_30px_19px_30px] flex flex-row self-start w-[fit-content] box-sizing-border">
                  <div class="rounded-[200px] bg-[url('../assets/images/profile_414.png')] bg-[50%_50%] bg-cover bg-no-repeat m-[1px_10px_0_0] w-[30px] h-[30px]">
                  </div>
                  <p class="m-[0_0_1px_0] break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                  <span class="hassa-hsina-daccord-merci-pour-lide-sub-0"></span><span></span>
                  </p>
                </div>
                <div class="m-[0_30px_20px_30px] flex flex-row self-start w-[fit-content] box-sizing-border">
                  <div class="rounded-[138px] bg-[url('../assets/images/awesome_profile_picture_10734.jpeg')] bg-[50%_50%] bg-cover bg-no-repeat m-[0_10px_0_0] w-[30px] h-[30px]">
                  </div>
                  <p class="break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                  <span class="asma-sousou-daccord-merci-pour-lide-sub-0"></span><span></span>
                  </p>
                </div>
                <div class="m-[0_30px_20px_30px] flex flex-row self-start w-[fit-content] box-sizing-border">
                  <div class="rounded-[15px] bg-[#D9D9D9] relative m-[0_10px_0_0] flex p-[5px_5px_5px_5px] w-[30px] h-[30px] box-sizing-border">
                    <div class="bg-[url('../assets/images/group_1.png')] bg-[50%_50%] bg-cover bg-no-repeat w-[20px] h-[20px]">
                    </div>
                  </div>
                  <p class="break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                  <span class="group-solidarit-daccord-merci-pour-lide-sub-0"></span><span></span>
                  </p>
                </div>
                <div class="m-[0_30px_20px_30px] flex flex-row self-start w-[fit-content] box-sizing-border">
                  <div class="rounded-[200px] bg-[url('../assets/images/oip_34.jpeg')] bg-[50%_50%] bg-cover bg-no-repeat m-[0_10px_0_0] w-[30px] h-[30px]">
                  </div>
                  <p class="break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                  <span class="salma-salima-daccord-merci-pour-lide-sub-0"></span><span></span>
                  </p>
                </div>
                <div class="m-[0_30px_20px_30px] flex flex-row self-start w-[fit-content] box-sizing-border">
                  <div class="rounded-[200px] bg-[url('../assets/images/image.jpeg')] bg-[50%_50%] bg-cover bg-no-repeat m-[0_10px_0_0] w-[30px] h-[30px]">
                  </div>
                  <p class="break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                  <span class="anass-khalil-daccord-merci-pour-lide-sub-0"></span><span></span>
                  </p>
                </div>
                <div class="m-[0_30px_20px_30px] flex flex-row self-start w-[fit-content] box-sizing-border">
                  <div class="rounded-[15px] bg-[#D9D9D9] relative m-[0_10px_0_0] flex p-[5px_5px_5px_5px] w-[30px] h-[30px] box-sizing-border">
                    <div class="bg-[url('../assets/images/group_1.png')] bg-[50%_50%] bg-cover bg-no-repeat w-[20px] h-[20px]">
                    </div>
                  </div>
                  <p class="break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                  <span class="football-daccord-merci-pour-lide-sub-0"></span><span></span>
                  </p>
                </div>
                <div class="m-[0_30px_20px_30px] flex flex-row self-start w-[fit-content] box-sizing-border">
                  <div class="rounded-[200px] bg-[url('../assets/images/profile_414.png')] bg-[50%_50%] bg-cover bg-no-repeat m-[0_10px_0_0] w-[30px] h-[30px]">
                  </div>
                  <p class="break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                  <span class="said-siyada-daccord-merci-pour-lide-sub-0"></span><span></span>
                  </p>
                </div>
                <div class="m-[0_30px_0_30px] flex flex-row self-start w-[fit-content] box-sizing-border">
                  <div class="rounded-[200px] bg-[url('../assets/images/image.jpeg')] bg-[50%_50%] bg-cover bg-no-repeat m-[0_10px_0_0] w-[30px] h-[30px]">
                  </div>
                  <p class="break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                  <span class="yahya-yahyaoui-daccord-merci-pour-lide-sub-0"></span><span></span>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="rounded-[20px] bg-[#FFFFFF] relative flex flex-col p-[15px_0_17px_0] box-sizing-border">
            <div class="m-[0_10px_15px_29px] flex flex-row justify-between w-[781px] box-sizing-border">
              <div class="flex flex-row box-sizing-border">
                <div class="rounded-[100px] bg-[url('../assets/images/oip_133.jpeg')] m-[0_10px_0_0] w-[40px] h-[40px]">
                </div>
                <p class="m-[5px_0_5px_0] break-words font-['Inter'] font-semibold text-[12px] text-[#3A416F]">
                <span class="hassan-bilal-rsident-immeuble-dappartement-09-sub-0"></span><span class="hassan-bilal-rsident-immeuble-dappartement-09-sub-4"></span><span></span>
                </p>
              </div>
              <div class="bg-[url('../assets/images/dots_11.png')] bg-[50%_50%] bg-cover bg-no-repeat m-[8px_0_8px_0] w-[24px] h-[24px]">
              </div>
            </div>
            <div class="bg-[#F7F7F7] m-[0_0_17px_0] w-[820px] h-[0px]">
            </div>
            <div class="m-[0_15px_0_15px] flex flex-row self-start w-[fit-content] box-sizing-border">
              <div class="rounded-[100px] bg-[url('../assets/images/oip_133.jpeg')] m-[0_4px_0_0] w-[30px] h-[30px]">
              </div>
              <p class="m-[7.5px_0_7.5px_0] break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
              <span class="hassan-bilal-27-juillet-20241030-sub-0"></span><span></span>
              </p>
            </div>
            <div class="m-[0_49px_15px_49px] inline-block self-start break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
            Salut Claire ! As-tu vu la notification sur le groupe de la résidence concernant la coupure d&#39;eau prévue pour demain ?
            </div>
            <div class="m-[0_15px_0_15px] flex flex-row self-start w-[fit-content] box-sizing-border">
              <div class="rounded-[50px] bg-[url('../assets/images/r_95.jpeg')] m-[0_4px_0_0] w-[30px] h-[30px]">
              </div>
              <p class="m-[7.5px_0_7.5px_0] break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
              <span class="moi-27-juillet-20241039-sub-0"></span><span></span>
              </p>
            </div>
            <div class="m-[0_78.6px_15px_49px] inline-block break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
            Salut Marc ! Je vais bien, merci. Et toi ? Oui, je l&#39;ai vue ce matin. Apparemment, c&#39;est prévu pour toute la journée du 23/07/2024. C&#39;est vraiment embêtant, surtout avec la chaleur qu&#39;il fait ces jours-ci. Tu as déjà pensé à ce que tu vas faire pour te préparer ?
            </div>
            <div class="m-[0_15px_0_15px] flex flex-row self-start w-[fit-content] box-sizing-border">
              <div class="rounded-[100px] bg-[url('../assets/images/oip_133.jpeg')] m-[0_4px_0_0] w-[30px] h-[30px]">
              </div>
              <p class="m-[7.5px_0_7.5px_0] break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
              <span class="hassan-bilal-27-juillet-20241047-sub-0"></span><span></span>
              </p>
            </div>
            <div class="m-[0_49px_10px_49px] inline-block self-start break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
            Je vais bien aussi, merci ! Oui, c&#39;est vraiment pas de chance. Pour me préparer, je pensais remplir quelques bouteilles et seaux d&#39;eau ce soir. Comme ça, on aura de quoi faire pour boire, cuisiner et se laver les mains. Et toi, tu as des idées ?
            </div>
            <div class="m-[0_15px_0_15px] flex flex-row self-start w-[fit-content] box-sizing-border">
              <div class="rounded-[50px] bg-[url('../assets/images/r_95.jpeg')] m-[0_4px_0_0] w-[30px] h-[30px]">
              </div>
              <p class="m-[7.5px_0_7.5px_0] break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
              <span class="moi-27-juillet-20241049-sub-0"></span><span></span>
              </p>
            </div>
            <div class="m-[0_68.6px_18px_49px] inline-block break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
             C&#39;est une bonne idée. Je vais faire pareil. Je vais aussi remplir la baignoire, ça peut toujours servir pour tirer la chasse d&#39;eau ou pour d&#39;autres besoins ménagers. Il faut aussi penser à faire la lessive et prendre une douche ce soir pour éviter les problèmes demain.
            </div>
            <div class="m-[0_15px_0_15px] flex flex-row self-start w-[fit-content] box-sizing-border">
              <div class="rounded-[100px] bg-[url('../assets/images/oip_133.jpeg')] m-[0_4px_0_0] w-[30px] h-[30px]">
              </div>
              <p class="m-[7.5px_0_7.5px_0] break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
              <span class="hassan-bilal-27-juillet-20241054-sub-0"></span><span></span>
              </p>
            </div>
            <div class="m-[0_49px_15px_49px] inline-block self-start break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
            Excellente suggestion. Je n&#39;avais pas pensé à la baignoire. Je vais le faire aussi. Et as-tu aussi vu qu&#39;ils vont repeindre les escaliers le 22/07/2024 ? C&#39;était vraiment nécessaire, mais ça risque de compliquer nos déplacements.
            </div>
            <div class="m-[0_15px_0_15px] flex flex-row self-start w-[fit-content] box-sizing-border">
              <div class="rounded-[50px] bg-[url('../assets/images/r_95.jpeg')] m-[0_4px_0_0] w-[30px] h-[30px]">
              </div>
              <p class="m-[7.5px_0_7.5px_0] break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
              <span class="moi-27-juillet-20241058-sub-0"></span><span></span>
              </p>
            </div>
            <div class="m-[0_72.5px_15px_49px] inline-block break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
            Oui, j&#39;ai vu ça. Les escaliers en avaient vraiment besoin. J&#39;espère juste que les travaux ne vont pas prendre trop de temps. Il va falloir utiliser l&#39;ascenseur plus souvent, mais avec tous les résidents qui font pareil, ça risque d&#39;être un peu chaotique. Peut-être qu&#39;ils organiseront les travaux pour qu&#39;une partie des escaliers reste accessible ?
            </div>
            <div class="m-[0_15px_0_15px] flex flex-row self-start w-[fit-content] box-sizing-border">
              <div class="rounded-[100px] bg-[url('../assets/images/oip_133.jpeg')] m-[0_4px_0_0] w-[30px] h-[30px]">
              </div>
              <p class="m-[7.5px_0_7.5px_0] break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
              <span class="hassan-bilal-27-juillet-20241101-sub-0"></span><span></span>
              </p>
            </div>
            <div class="m-[0_49px_15px_49px] inline-block self-start break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
            Espérons-le. Je pense que les ouvriers feront de leur mieux pour minimiser les désagréments. En tout cas, ça fera du bien d&#39;avoir des escaliers neufs. D&#39;ailleurs, as-tu reçu l&#39;invitation pour le mariage du 24 juin ? Ils vont organiser la fête dans la cour de la résidence.
            </div>
            <div class="m-[0_15px_0_15px] flex flex-row self-start w-[fit-content] box-sizing-border">
              <div class="rounded-[50px] bg-[url('../assets/images/r_95.jpeg')] m-[0_4px_0_0] w-[30px] h-[30px]">
              </div>
              <p class="m-[7.5px_0_7.5px_0] break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
              <span class="moi-27-juillet-20241108-sub-0"></span><span></span>
              </p>
            </div>
            <div class="m-[0_77.3px_68px_49px] inline-block break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
            Oui, j&#39;ai reçu l&#39;invitation. Ça pourrait être sympa d&#39;avoir une petite fête, mais j&#39;espère que ça ne durera pas trop tard dans la nuit. Certains d&#39;entre nous doivent travailler le lendemain. J&#39;espère que les organisateurs seront respectueux du voisinage.
            </div>
            <div class="m-[0_20px_0_20px] flex flex-row w-[fit-content] box-sizing-border">
              <div class="rounded-[8px] border-[1px_solid_#9EAFCE] bg-[#F1F1F1] relative m-[0_20px_0_0] p-[12.5px_15px_12.5px_15px] w-[660px] box-sizing-border">
                <span class="break-words font-['Inter'] font-normal text-[12px] text-[#A2A2A2]">
                Ecrivez votre message ...
                </span>
              </div>
              <div class="rounded-[30px] bg-[#3C4C7C] relative m-[5px_0_5px_0] flex p-[7.5px_0_7.5px_0] w-[100px] h-[fit-content] box-sizing-border">
                <span class="break-words font-['Inter'] font-bold text-[12px] text-[#FFFFFF]">
                Envoyer
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
@endsection