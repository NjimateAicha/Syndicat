<div class="w-full flex justify-start"> <!-- Add this div to wrap the form -->
    <form method="post" action="{{ route($postUrl) }}" enctype="multipart/form-data" class="max-w-[330px]"> <!-- Move max-w to form -->
        @csrf

        <div class="shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] rounded-[20px] bg-[#FFFFFF] relative m-[0_0_198px_0] flex flex-col p-[16.5px_0_16px_0] box-sizing-border">
            <div class="m-[0_25px_26.5px_25px] inline-block self-start break-words font-['Inter'] font-semibold text-[14px] text-[#3C4C7C]">
                Ajouter Votre Déclaration
            </div>

            <div class="bg-[#F7F7F7] m-[0_0_24.5px_0] w-full h-[0px]"></div>
            <div class="m-[0_25px_19.5px_25px] inline-block self-start break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                Choisissez Type de Déclaration
            </div>

            <div class="m-[0_0_25px_0] flex flex-row justify-around self-start w-full box-sizing-border">
                <div class="flex flex-row box-sizing-border">
                    <div class="rounded-[4px] border-[1px_solid_#9EAFCE] m-[0_7px_0.5px_0] w-[20px] h-[20px]"></div>
                    <button id="nuisance" onclick="choseType(event)" type="button" class="">
                        <div class="m-[5.5px_0_0_0] inline-block break-words font-['Inter']  text-[12px] text-[#6F7D93]">Nuisance</div>
                    </button>
                </div>

                <div class="flex flex-row box-sizing-border">
                    <div class="rounded-[4px] border-[1px_solid_#9EAFCE] m-[0_7px_0.5px_0] w-[20px] h-[20px]"></div>
                    <button id="sinistre" type="button" onclick="choseType(event)" class="">
                        <div class="m-[5.5px_0_0_0] inline-block break-words font-['Inter']  text-[12px] text-[#6F7D93]">Sinistre</div>
                    </button>
                </div>
            </div>

            <input type="hidden" name="type" id="selectedType" /> <!-- Hidden input for selected type -->

            <div class="m-[0_25px_12.5px_25px] font-medium text-[12px] text-[#6F7D93]">Entrez l’objet de votre déclaration</div>
            <div class="relative m-[0_25px_29px_25px]">
                <input type="text" placeholder="Objet de votre déclaration" id="titre" name="titre" class="rounded-[8px] border-[1px solid #9EAFCE] bg-[#F1F1F1] p-[12.5px_15px] w-full text-[12px] text-[#A2A2A2]" />
            </div>

            <div class="m-[0_25px_12.5px_25px] font-medium text-[12px] text-[#6F7D93]">Entrez le lieu</div>
            <div class="relative m-[0_25px_29px_25px]">
                <input type="text" placeholder="Exemple: Immeuble D" id="lieu" name="lieu" class="rounded-[8px] border-[1px solid #9EAFCE] bg-[#F1F1F1] p-[12.5px_15px] w-full text-[12px] text-[#A2A2A2]" />
            </div>

            <div class="m-[0_25px_12.5px_25px] inline-block self-start break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">Décrivez de votre déclaration</div>
            <div class="relative m-[0_25px_29px_25px] items-center">
                <textarea placeholder="Contenu de votre déclaration" id="description" name="description" class="rounded-[8px] border-[1px_solid_#9EAFCE] bg-[#F1F1F1]  p-[12.5px_15px] inline-block break-words font-['Inter'] font-normal text-[12px] text-[#A2A2A2] box-sizing-border w-full"></textarea>
                <div class="relative flex items-center justify-end">
                    <!-- Label for image upload -->
                    <label for="file-input">
                        <img class="rotate-[45deg] cursor-pointer w-[15px]" src="../assets/vectors/vector_11_x2.svg" alt="Upload" />
                    </label>
                    <!-- File input -->
                    <input type="file" id="file-input" name="image" class="hidden" />
                </div>
            </div>

            <div class="bg-[#F7F7F7] m-[0_0_11px_0] w-[200px] h-[0px]"></div>

            <input type="hidden" value="{{ $residence }}" name="residence_id">

            <button type="submit" class="flex items-center justify-center px-3">
                <div class="rounded-[60px] border border-[#9EAFCE] bg-[#3C4C7C] flex items-center justify-center p-[10px_15px] text-white text-[12px] font-semibold">
                    Ajouter
                </div>
            </button>
        </div>
    </form>
</div>
