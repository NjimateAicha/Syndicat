    @role('Super Admin|Admin|Manager principal|Manager| Propriétaire|Résident')
        <form method="post" action="{{ route($postUrl) }}" enctype="multipart/form-data" class="min-w-[350px]">
            @csrf

            <div
                class="shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] rounded-[20px] bg-[#FFFFFF] relative m-[0_0_198px_0] flex flex-col p-[16.5px_0_16px_0] box-sizing-border">
                <div
                    class="m-[0_25px_26.5px_25px] inline-block self-start break-words font-['Inter'] font-semibold text-[14px] text-[#3C4C7C]">
                    {{ __('Ajouter Votre Déclaration') }}
                </div>
                {{-- display the messages and errors  --}}
                {{-- <div class="px-2">
                <x-error.message ></x-error.message>

             </div> --}}

                <div class="bg-[#F7F7F7] m-[0_0_24.5px_0] w-full h-[0px]">
                </div>
                <div
                    class="m-[0_25px_19.5px_25px] inline-block self-start break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                    {{ __('Choisissez Type de Déclaration') }}
                </div>

                <div class="m-[0_0_25px_25px] flex flex-row flex-start self-start w-full box-sizing-border gap-[30px]">
                    <div class="flex flex-row box-sizing-border items-center">
                        <!-- Ajout de items-center pour aligner verticalement -->
                        <input type="checkbox" id="nuisance" name="type[]" value="nuisance"
                            onclick="updateSelectedTypes()" />
                        <label for="nuisance"
                            class="ml-2 inline-block break-words font-['Inter'] text-[12px] text-[#6F7D93]">
                            <!-- Ajout de margin-left -->
                            {{ __('nuisance') }}
                        </label>
                    </div>
                    <div class="flex flex-row box-sizing-border items-center">
                        <!-- Ajout de items-center pour aligner verticalement -->
                        <input type="checkbox" id="sinistre" name="type[]" value="sinistre"
                            onclick="updateSelectedTypes()" />
                        <label for="sinistre"
                            class="ml-2 inline-block break-words font-['Inter'] text-[12px] text-[#6F7D93]">
                            <!-- Ajout de margin-left -->
                            {{ __('sinistre') }}
                        </label>
                    </div>
                </div>

                <input type="hidden" name="type" id="selectedType" /> <!-- Hidden input for selected type -->


                <div class="m-[0_25px_12.5px_25px] font-medium text-[12px] text-[#6F7D93]">
                    {{ __('Entrez l’objet de votre déclaration') }} </div>
                <div class="relative m-[0_25px_29px_25px]">
                    <input type="text" placeholder="{{__('Objet de votre déclaration')}}" id="titre" name="titre"
                        class="border border-[#9EAFCE] rounded-[8px]  bg-[#F1F1F1] p-[12.5px_15px] w-full text-[12px] text-[#A2A2A2]" />
                </div>
                <div class="m-[0_25px_12.5px_25px] font-medium text-[12px] text-[#6F7D93]">
                    {{ __('Entrez le lieu') }}
                </div>
                <div class="relative m-[0_25px_29px_25px]">
                    <input type="text" placeholder="{{__('Exemple: Immeuble D')}}" id="lieu" name="lieu"
                        class="rounded-[8px] border border-[#9EAFCE] bg-[#F1F1F1] p-[12.5px_15px] w-full text-[12px] text-[#A2A2A2]" />
                </div>

                <div
                    class="m-[0_25px_12.5px_25px] inline-block self-start break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                    {{ __('Descrivez déclaration') }}
                </div>
                <div class="relative m-[0_25px_29px_25px] items-center">
                    <textarea placeholder="{{__('Centenu de votre déclaration')}}" id="description" name="description"
                        class="rounded-[8px] border border-[#9EAFCE] bg-[#F1F1F1]  p-[12.5px_15px] inline-block break-words font-['Inter'] font-normal text-[12px] text-[#A2A2A2] box-sizing-border w-full"></textarea>
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
                            {{ __('Envoyer') }}
                        </span>
                    </div>
                </button>


            </div>
        </form>
    @endrole

    @role('Super Admin|Admin|Manager principal|Manager')
        <script>
            // function updateSelectedTypes() {
            //     const selectedTypes = [];
            //     const checkboxes = document.querySelectorAll('input[name="type[]"]:checked');

            //     checkboxes.forEach((checkbox) => {
            //         selectedTypes.push(checkbox.value);
            //     });

            //     document.getElementById('selectedType').value = selectedTypes.join(','); // Join selected types with commas
            // }
            function updateSelectedTypes() {
            const nuisanceCheckbox = document.getElementById('nuisance');
            const sinistreCheckbox = document.getElementById('sinistre');
            const selectedTypeInput = document.getElementById('selectedType');

            if (nuisanceCheckbox.checked) {
                sinistreCheckbox.disabled = true;  // Disable sinistre checkbox
                selectedTypeInput.value = 'nuisance';  // Set selected type
            } else if (sinistreCheckbox.checked) {
                nuisanceCheckbox.disabled = true;  // Disable nuisance checkbox
                selectedTypeInput.value = 'sinistre';  // Set selected type
            } else {
                nuisanceCheckbox.disabled = false;  // Enable both checkboxes
                sinistreCheckbox.disabled = false;
                selectedTypeInput.value = '';  // Clear selected type
            }
        }
            
        </script>
    @endrole
