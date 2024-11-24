<div id="paramterModal" class="fixed z-50 inset-0 flex items-center justify-center hidden bg-black bg-opacity-50">
    <form action="{{ route('parameters.upadate') }}" method="POST" enctype="multipart/form-data"
        class="bg-white rounded-lg shadow-lg p-6 max-w-lg w-full">
        @csrf
        <input type="hidden" name="role" value="Admin">

        <div class="flex justify-between items-center">
            <h2 class="text-lg text-[#3C4C7C] font-semibold">{{ __('Site Parameters') }}</h2>
            <button type="button" id="openModalBtnParamter" class="text-gray-500 hover:text-gray-700 close-modal-btn">
                &times;
            </button>
        </div>
        <div class="grid grid-cols-2 gap-x-3 gap-y-0 py-1">
            <!-- Site Name Input -->
            <div class="my-[1rem]">
                <label for="app_name" class="block text-sm text-[#6F7D93] font-semibold mb-2">
                    {{ __('Enter Site Name') }}
                </label>
                <input type="text" id="app_name" name="app_name"
                    class="border rounded-lg w-full py-2 px-3 text-gray-600 bg-[#f1f1f1] border-[#dce1e8]"
                    placeholder="Syndicat">
            </div>

            <!-- copyright Name Input -->
            <div class="my-[1rem]">
                <label for="copyright" class="block text-sm text-[#6F7D93] font-semibold mb-2">
                    {{ __('Enter Copyright Name') }}
                </label>
                <input type="text" id="copyright" name="copyright"
                    class="border rounded-lg w-full py-2 px-3 text-gray-600 bg-[#f1f1f1] border-[#dce1e8]"
                    placeholder="Syndicat.inc">
            </div>

            <!-- App Logo Upload -->
            <div class="my-[1rem] col-span-2">
                <label for="logo" class="block text-sm text-[#6F7D93] font-semibold mb-2">
                    {{ __('Upload Logo') }}
                </label>
                <input type="file" id="logo" name="logo" accept="image/*"
                    class="border rounded-lg w-full py-2 px-3 text-gray-600 bg-[#f1f1f1] border-[#dce1e8]">
            </div>

            <!-- Social Media Links -->
            <div class="my-[1rem]">
                <label for="facebook_link" class="block text-sm text-[#6F7D93] font-semibold mb-2">
                    {{ __('Facebook Link') }}
                </label>
                <input type="url" id="facebook_link" name="facebook_link"
                    class="border rounded-lg w-full py-2 px-3 text-gray-600 bg-[#f1f1f1] border-[#dce1e8]"
                    placeholder="https://facebook.com/yourpage">
            </div>

            <div class="my-[1rem]">
                <label for="twitter_link" class="block text-sm text-[#6F7D93] font-semibold mb-2">
                    {{ __('Twitter Link') }}
                </label>
                <input type="url" id="twitter_link" name="twitter_link"
                    class="border rounded-lg w-full py-2 px-3 text-gray-600 bg-[#f1f1f1] border-[#dce1e8]"
                    placeholder="https://twitter.com/yourprofile">
            </div>

            <div class="my-[1rem]">
                <label for="linkedin_link" class="block text-sm text-[#6F7D93] font-semibold mb-2">
                    {{ __('LinkedIn Lien') }}
                </label>
                <input type="url" id="linkedin_link" name="linkedin_link"
                    class="border rounded-lg w-full py-2 px-3 text-gray-600 bg-[#f1f1f1] border-[#dce1e8]"
                    placeholder="https://linkedin.com/in/yourprofile">
            </div>

            <div class="my-[1rem]">
                <label for="instagram_link" class="block text-sm text-[#6F7D93] font-semibold mb-2">
                    "{{ __('Instagram Link') }}"
                </label>
                <input type="url" id="instagram_link" name="instagram_link"
                    class="border rounded-lg w-full py-2 px-3 text-gray-600 bg-[#f1f1f1] border-[#dce1e8]"
                    placeholder="https://instagram.com/yourprofile">
            </div>

            <div class="my-[1rem] col-span-2">
                <label for="lan" class="block text-sm text-[#6F7D93] font-semibold mb-2">
                    {{ __('Upload JSON lan') }}
                </label>
                <input type="file" id="logo" name="lan" accept=""
                    class="border rounded-lg w-full py-2 px-3 text-gray-600 bg-[#f1f1f1] border-[#dce1e8]">
            </div>


        </div>


        <!-- Submit Button -->
        <div>
            <button type="submit"
                class="w-full bg-[#3C4C7C] hover:bg-[#3e569b] text-white py-1 px-6 rounded-full font-bold text-lg">
                {{ __('update parameter') }}
            </button>
        </div>
    </form>
</div>

<!-- Button to Open the Modal -->


<button id="openModalBtnParameter"
class="w-[150px] h-[40px] rounded-[8px] bg-[linear-gradient(90deg,#9EAFCE,#697C9B)] relative flex flex-row p-2 box-sizing-border hover:bg-[linear-gradient(90deg,#697C9B,#9EAFCE)] transition duration-300 ease-in-out transform hover:scale-105">
<span class="m-auto inline-block break-words font-['Inter'] font-medium text-[12px] text-[#FFFFFF]">
    {{ __('website caractersitique') }}

</span>
</button>


<!-- JavaScript to Handle Modal Toggle -->
<script>
    // Get the modal, open button, and close button
    const modalAdmin = document.getElementById('paramterModal');
    const openModalBtnParameter = document.getElementById('openModalBtnParameter');
    const openModalBtnParamter = document.getElementById('openModalBtnParamter');

    // Open the modal when the open button is clicked
    openModalBtnParameter.addEventListener('click', () => {
        modalAdmin.classList.remove('hidden');
        modalAdmin.classList.add('flex');
    });

    // Close the modal when the close button is clicked
    openModalBtnParamter.addEventListener('click', () => {
        modalAdmin.classList.remove('flex');
        modalAdmin.classList.add('hidden');
    });

    // Optional: Close the modal if user clicks outside the form
    window.addEventListener('click', (e) => {
        if (e.target === modalAdmin) {
            modalAdmin.classList.remove('flex');
            modalAdmin.classList.add('hidden');
        }
    });
</script>
