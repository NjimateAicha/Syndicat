<div x-data="{ open: false }">

    <!-- Button to open the modal -->
    <button @click="open = true"
        class="rounded-[8px] bg-gradient-to-r from-[#9EAFCE] to-[#697C9B] relative flex flex-row p-[4px_18px_4px_19px]">
        <div class="mr-2 font-['Inter'] font-medium text-[12px] text-white">
            {{ __('Filtrer') }}
        </div>
        <div
            class="bg-[url('{{ asset('../assets/images/filter_11.png') }}')] bg-center bg-cover bg-no-repeat w-[16px] h-[16px]">
        </div>
    </button>

    <form action="{{ route('infocom.residence', request()->route('residence') ?? Auth::user()->residence->id) }}" method="GET">
        <!-- Modal -->
        <div x-show="open" @click.away="open = false"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50" style="display: none;">
            <div class="bg-white rounded-lg shadow-lg w-96 p-6">
                <h2 class="text-lg font-bold mb-4">{{ __('Options de Filtrage') }}</h2>
                
                <div class="grid grid-cols-2 gap-4 p-4 m-2 rounded-lg">
                    
                    <!-- Option 1: A-Z -->
                    <div class="flex items-center">
                        <input type="radio" id="alpha" name="order" value="alphabetical_asc" class="peer hidden">
                        <label for="alpha"
                            class="rounded-[8px] bg-[linear-gradient(90deg,#9EAFCE,#697C9B)] flex flex-row box-border 
                            hover:bg-[linear-gradient(90deg,#697C9B,#9EAFCE)] transition duration-300 ease-in-out transform hover:scale-105
                            items-center gap-2 peer-checked:text-white p-2 cursor-pointer w-full">
                            <i class="fa-solid fa-sort-alpha-down"></i>
                            <span
                                class="m-[0.5px_9.4px_0.5px_0] inline-block break-words font-['Inter'] font-medium text-[12px]">
                                {{ __('Trier par Nom (A-Z)') }}
                            </span>
                        </label>
                    </div>

                    <!-- Option 2: Z-A -->
                    <div class="flex items-center">
                        <input type="radio" id="reverse" name="order" value="alphabetical_desc" class="peer hidden">
                        <label for="reverse"
                            class="rounded-[8px] bg-[linear-gradient(90deg,#9EAFCE,#697C9B)] flex flex-row box-border 
                            hover:bg-[linear-gradient(90deg,#697C9B,#9EAFCE)] transition duration-300 ease-in-out transform hover:scale-105
                            items-center gap-2 peer-checked:text-white p-2 cursor-pointer w-full">
                            <i class="fa-solid fa-sort-alpha-up-alt"></i>
                            <span
                                class="m-[0.5px_9.4px_0.5px_0] inline-block break-words font-['Inter'] font-medium text-[12px]">
                                {{ __('Trier par Nom (Z-A)') }}

                            </span>
                        </label>
                    </div>

                    <!-- Option 3: 1-10 -->
                    <div class="flex items-center">
                        <input type="radio" id="num_rev" name="order" value="numeric_desc" class="peer hidden">
                        <label for="num_rev"
                            class="rounded-[8px] bg-[linear-gradient(90deg,#9EAFCE,#697C9B)] flex flex-row box-border 
                            hover:bg-[linear-gradient(90deg,#697C9B,#9EAFCE)] transition duration-300 ease-in-out transform hover:scale-105
                            items-center gap-2 peer-checked:text-white p-2 cursor-pointer w-full">
                            <i class="fa-solid fa-sort-numeric-down"></i>
                            <span
                                class="m-[0.5px_9.4px_0.5px_0] inline-block break-words font-['Inter'] font-medium text-[12px]">
                                {{ __('Trier par Date (Plus récent)') }}

                            </span>
                        </label>
                    </div>

                    <!-- Option 4: 10-1 -->
                    <div class="flex items-center">
                        <input type="radio" id="num" name="order" value="numeric_asc" class="peer hidden">
                        <label for="num"
                            class="rounded-[8px] bg-[linear-gradient(90deg,#9EAFCE,#697C9B)] flex flex-row box-border 
                            hover:bg-[linear-gradient(90deg,#697C9B,#9EAFCE)] transition duration-300 ease-in-out transform hover:scale-105
                            items-center gap-2 peer-checked:text-white p-2 cursor-pointer w-full">
                            <i class="fa-solid fa-sort-numeric-up-alt"></i>
                            <span
                                class="m-[0.5px_9.4px_0.5px_0] inline-block break-words font-['Inter'] font-medium text-[12px]">
                                {{ __('Trier par Date (Plus ancien)') }}
                            </span>
                        </label>
                    </div>
                </div>

                <!-- Search by Name -->
                <div>
                    <label for="name" class="sr-only">{{ __('Search by title') }}</label>
                    <input type="text" name="titre" placeholder="Enter title"
                        class="p-3 bg-gray-100 border border-gray-300 rounded-lg w-full text-black">
                </div>

                <!-- Action Buttons -->
                <div class="mt-4 flex justify-end gap-2">
                    <button type="submit"
                        class="bg-blue-600 px-4 py-2 rounded-lg text-white
                        rounded-[8px] bg-[linear-gradient(90deg,#9EAFCE,#697C9B)] 
                        box-border hover:bg-[linear-gradient(90deg,#697C9B,#9EAFCE)] transition duration-300 ease-in-out transform hover:scale-105">
                        {{ __('Search') }}</button>
                        
                    <button @click="open = false" type="button"
                        class="bg-gray-500 px-4 py-2 text-white
                        rounded-[8px] bg-[linear-gradient(90deg,#9EAFCE,#697C9B)]
                        box-border hover:bg-[linear-gradient(90deg,#697C9B,#9EAFCE)] transition duration-300 ease-in-out transform hover:scale-105">
                        {{ __('Close') }}</button>
                </div>
            </div>
        </div>
    </form>
</div>
