<div class="w-full max-w-[330px]">
    @role('Super Admin|Admin|Manager principal|Manager')
    <form method="post" action="{{ route($postUrl) }}" enctype="multipart/form-data">
        @csrf

        <div class="shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] rounded-[20px] bg-[#FFFFFF] relative m-[0_0_198px_0] flex flex-col p-[16.5px_0_16px_0] box-sizing-border">
            <div
                class="m-[0_25px_26.5px_25px] inline-block self-start break-words font-['Inter'] font-semibold text-[14px] text-[#3C4C7C]">
                Ajouter Votre Déclaration
            </div>
             {{-- display the messages and errors  --}}
             {{-- <div class="px-2">
                <x-error.message ></x-error.message>

             </div> --}}

            <div class="bg-[#F7F7F7] m-[0_0_24.5px_0] w-full h-[0px]">
            </div>
            <div
                class="m-[0_25px_19.5px_25px] inline-block self-start break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                Choisissez Type de Déclaration
            </div>
            <div class="m-[0_0_25px_0] flex flex-row justify-around self-start w-full box-sizing-border ">
                <div class="flex flex-row box-sizing-border">
                    <div class="rounded-[4px] border-[1px_solid_#9EAFCE] m-[0_7px_0.5px_0] w-[20px] h-[20px]">
                    </div>
                    <button id="nuisance" onclick="choseType(event)" type="button" class="">
                        <div
                            class="m-[5.5px_0_0_0] inline-block break-words font-['Inter']  text-[12px] text-[#6F7D93]">
                            Nuisance
                        </div>
                    </button>

                </div>
                <div class="flex flex-row box-sizing-border">
                    <div class="rounded-[4px] border-[1px_solid_#9EAFCE] m-[0_7px_0.5px_0] w-[20px] h-[20px]">
                    </div>
                    <button id="sinistre" type="button" onclick="choseType(event)" class="">
                        <div
                            class="m-[5.5px_0_0_0] inline-block break-words font-['Inter']  text-[12px] text-[#6F7D93]">
                            Sinistre
                        </div>
                    </button>

                </div>
            </div>

            <input type="hidden" name="type" id="selectedType" /> <!-- Hidden input for selected type -->


            <div class="m-[0_25px_12.5px_25px] font-medium text-[12px] text-[#6F7D93]">
                Entrez l’objet de votre déclaration
            </div>
            <div class="relative m-[0_25px_29px_25px]">
                <input type="text" placeholder="Objet de votre déclaration" id="titre" name="titre"
                    class="rounded-[8px] border-[1px solid #9EAFCE] bg-[#F1F1F1] p-[12.5px_15px] w-full text-[12px] text-[#A2A2A2]" />
            </div>
            <div class="m-[0_25px_12.5px_25px] font-medium text-[12px] text-[#6F7D93]">
                Entrez le lieu
            </div>
            <div class="relative m-[0_25px_29px_25px]">
                <input type="text" placeholder="Exemple: Immeuble D" id="lieu" name="lieu"
                    class="rounded-[8px] border-[1px solid #9EAFCE] bg-[#F1F1F1] p-[12.5px_15px] w-full text-[12px] text-[#A2A2A2]" />
            </div>
           
            <div
                class="m-[0_25px_12.5px_25px] inline-block self-start break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                Descrivez de votre déclaration
            </div>
            <div class="relative m-[0_25px_29px_25px] items-center">
                <textarea placeholder="Centenu de votre déclaration" id="description" name="description"
                    class="rounded-[8px] border-[1px_solid_#9EAFCE] bg-[#F1F1F1]  p-[12.5px_15px] inline-block break-words font-['Inter'] font-normal text-[12px] text-[#A2A2A2] box-sizing-border w-full"></textarea>
                <div class="relative flex items-center justify-end">
                    <!-- Label for image upload -->
                    <label for="file-input">
                        <img class="rotate-[45deg] cursor-pointer w-[15px]" src="../assets/vectors/vector_11_x2.svg"
                            alt="Upload" />
                    </label>
                    <!-- File input (must not be hidden using "display: none") -->
                    <input type="file" id="file-input" name="image" class="hidden" />
                </div>
            </div>
            <div class="bg-[#F7F7F7] m-[0_0_11px_0] w-[200px] h-[0px]">
            </div>

            <input type="hidden" value="{{ $residence }}" name="residence_id">

            <button type="submit" class="flex items-center justify-center px-3">
                <div
                    class="rounded-[60px] border border-[#9EAFCE] bg-[#3C4C7C] flex items-center justify-center p-[11.5px_0_11.5px_0] max-w-[300px] w-full">
                    <span class="break-words font-['Inter'] font-bold text-[14px] text-[#FFFFFF]">
                        Envoyer
                    </span>
                </div>
            </button>


        </div>
    </form>
    @endrole
    
    @role('Super Admin|Admin|Manager principal|Manager')

    <script>
        let selectedButtonId = null;

        function choseType(event) {
            const button = event.target.closest('button');
            const divInside = button.querySelector('div');
            const mainColor = "#6F7D93";
            const selectColor = "#000000";

            // Remove styles from previously selected button
            if (selectedButtonId && selectedButtonId !== button.id) {
                const previousButton = document.getElementById(selectedButtonId);
                const previousDiv = previousButton.querySelector('div');
                previousDiv.classList.remove('font-bold');
                previousDiv.classList.add('font-normal');
                previousDiv.style.color = mainColor;
            }

            // Toggle styles for the current button
            if (button.id !== selectedButtonId) {

                selectedButtonId = button.id;
                divInside.classList.add('font-bold');
                divInside.classList.remove('font-normal');
                divInside.style.color = selectColor;
                document.getElementById('selectedType').value = selectedButtonId; // Update hidden input with selected type
            }
        }
    </script>
</div>
