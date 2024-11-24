<div x-data="{ open: false }">

    <!-- Button to open the modal -->
    <button @click="open = true" class="rounded-[8px] bg-gradient-to-r from-[#9EAFCE] to-[#697C9B] relative flex flex-row p-[4px_18px_4px_19px]">
        <div class="mr-2 font-['Inter'] font-medium text-[12px] text-white">
            Filter
        </div>
        <div class="bg-[url('../assets/images/filter_11.png')] bg-center bg-cover bg-no-repeat w-[16px] h-[16px]"></div>
    </button>

    <form action="{{ route('reclamations.residence', request()->route('residence') ?? Auth::user()->residence->id) }}" method="GET">

            <!-- Modal -->
        <div x-show="open" @click.away="open = false" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50" style="display: none;">
            <div class="bg-white rounded-lg shadow-lg w-96 p-6">
                <h2 class="text-lg font-bold mb-4">Filter Options</h2>
                <div class="grid grid-cols-2 gap-4 p-4 m-2 rounded-lg">
                    <!-- Option 1: A-Z -->
                    <div class="flex items-center">
                        <input type="radio" id="alpha" name="order" value="alphabetical_asc" class="peer hidden">
                        <label for="alpha" class="flex items-center gap-2 peer-checked:text-black peer-checked:bg-sky-700 p-2 rounded bg-sky-500 cursor-pointer w-full">
                            <i class="fa-solid fa-arrow-up-a-z"></i> A-Z
                        </label>
                    </div>

                    <!-- Option 2: Z-A -->
                    <div class="flex items-center">
                        <input type="radio" id="reverse" name="order" value="alphabetical_desc" class="peer hidden">
                        <label for="reverse" class="flex items-center gap-2 peer-checked:text-black peer-checked:bg-sky-700 p-2 rounded bg-sky-500 cursor-pointer w-full">
                            <i class="fa-solid fa-arrow-up-z-a"></i> Z-A
                        </label>
                    </div>

                    <!-- Option 3: 1-10 -->
                    <div class="flex items-center">
                        <input type="radio" id="num" name="order" value="numeric_asc" class="peer hidden">
                        <label for="num" class="flex items-center gap-2 peer-checked:text-black peer-checked:bg-sky-700 p-2 rounded bg-sky-500 cursor-pointer w-full">
                            <i class="fa-solid fa-arrow-up-1-9"></i> 1-10
                        </label>
                    </div>

                    <!-- Option 4: 10-1 -->
                    <div class="flex items-center">
                        <input type="radio" id="num_rev" name="order" value="numeric_desc" class="peer hidden">
                        <label for="num_rev" class="flex items-center gap-2 peer-checked:text-black peer-checked:bg-sky-700 p-2 rounded bg-sky-500 cursor-pointer w-full">
                            <i class="fa-solid fa-arrow-down-9-1"></i> 10-1
                        </label>
                    </div>
                </div>

                <!-- Search by Name -->
                <div>
                    <label for="name" class="sr-only">Search by Name</label>
                    <input type="text" name="name" placeholder="Enter name" class="p-3 bg-gray-100 border border-gray-300 rounded-lg w-full text-black">
                </div>

                <!-- Action Buttons -->
                <div class="mt-4 flex justify-end gap-2">
                    <button type="submit" class="bg-blue-600 px-4 py-2 rounded-lg text-white">Search</button>
                    <button @click="open = false" type="button" class="bg-gray-500 px-4 py-2 rounded-lg text-white">Close</button>
                </div>
            </div>
        </div>
    </form>
</div>
