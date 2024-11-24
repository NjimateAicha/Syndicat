@php
    use App\Models\Residence;

    if ($user->hasAnyRole(['Super Admin', 'Admin'])) {
        $residence_all = Residence::all();
    } else {
        $residence_all = $user->residences;
    }
@endphp
{{-- @if ($residencePassed)
<p>Current Residence: {{ $residencePassed->id }}</p>
@else
<p>No residence selected.</p>
@endif --}}
{{-- @php
echo $user
@endphp --}}
<div class="relative flex flex-row justify-between w-full p-5 bg-white rounded-[20px] mb-7 box-border">
    <div class="flex">
        {{-- @if ($residence_all) --}}
        @role('Super Admin|Admin')
            <div
                class="shadow-md rounded-[8px] bg-[#E9ECEE] relative flex flex-row justify-between p-2 box-border
         w-80 h-[60px] break-words font-['Fredoka_One','Roboto_Condensed'] font-normal text-[20px] text-[#6F7D93]">
                <select onchange="location = this.value;"
                    class="w-full bg-transparent text-[#6F7D93] font-normal text-[20px]">
                    @foreach ($residence_all as $residence)
                        <option value="{{ route($route, $residence->id) }}"
                            {{ (request()->route('residence') && request()->route('residence')->id == $residence->id) ||
                            (!request()->route('residence') && $user->residence && $user->residence->id == $residence->id)
                                ? 'selected'
                                : '' }}>
                            {{__('Résidence')}} : {{ $residence->nomResidence }}
                        </option>
                    @endforeach
                </select>
            </div>


            @if (Route::is('reglages.show'))
                <!-- Select bar HTML code -->
                @php
                    $residencePassed = $residence;
                @endphp
                <form action="{{ route('residence.update-status', $residencePassed->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <select name="active"
                        class="box-border rounded-[8px] p-2 w-30 h-[60px] bg-[#E9ECEE] font-['Fredoka_One','Roboto_Condensed'] text-[#6F7D93] font-normal text-[20px] ml-4"
                        onchange="this.form.submit()">
                        <option value="0" {{ $residencePassed->active == 0 ? 'selected' : '' }}>{{__('Active')}}</option>
                        <option value="1" {{ $residencePassed->active == 1 ? 'selected' : '' }}>{{__('Inactive')}}</option>
                    </select>
                </form>

                <!-- Button to open modal -->
                <button id="openModalButton"
                    class=" py-2 px-4 flex items-center box-border rounded-[8px] p-2 w-30 h-[60px] bg-[#E9ECEE] font-['Fredoka_One','Roboto_Condensed'] text-[#6F7D93] font-normal text-[20px] ml-4">
                    {{__('Ajouter Résidence')}} +
                </button>

                <!-- Modal -->
                <div id="modal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center hidden">
                    <div class="bg-white rounded-lg shadow-lg w-full max-w-sm p-6">
                        <!-- Modal Header -->
                        <div class="flex justify-between items-center border-b pb-2 mb-4">
                            <h2 class="text-lg font-semibold">{{__('Ajouter Résidence')}}</h2>
                            <button id="closeModalButton" class="text-gray-500 hover:text-gray-800">&times;</button>
                        </div>

                        <form action="{{ route('residence.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="nomResidence" class="block text-gray-700">{{__('Saisir nom')}}</label>
                                <input type="text" name="nomResidence" id="nomResidence"
                                    class="w-full border rounded p-2" placeholder="{{__('Nom du résidence')}}" required>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">{{__('Enregistrer')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        @endrole

        

        {{-- @else --}}
        @role('Manager|Résident|Propriétaire|Manager principal')
            <div
                class="m-[13.5px_11.5px_13.5px_0] inline-block w-[375px] break-words font-['Fredoka_One','Roboto_Condensed'] font-normal text-[20px] text-[#6F7D93]">
               {{ __('Résidence')}} {{ $user->residence->nomResidence }}
            </div>
        @endrole
    </div>

    {{-- <div class="relative inline-block text-left z-20">{{ $residence_all }}</div> --}}
    {{-- @endif --}}


    <div class="relative  flex-row box-sizing-border">


        <!-- Dropdown Button -->
        <div class="relative">
            <button id="dropdownButton" class="relative flex flex-row box-sizing-border">
                {{-- {{-- <form action="{{ route('locale.change') }}" method="POST" class="inline-block">
                    @csrf
                    <select name="locale" onchange="this.form.submit()" class="border ml-5 mt-2 border-gray-300 rounded-lg py-2 px-4 bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="en"{{ app()->getLocale() == 'en' ? ' selected' : '' }}>English</option>
                    
                        <option value="fr"{{ app()->getLocale() == 'fr' ? ' selected' : '' }}>Français</option>
                    </select>
                </form>     --}}
                --}}
                
                
                {{-- <img src="https://flagcdn.com/w320/ma.png" alt="Moroccan flag"
                    class="m-[10px_26.2px_10px_0] w-[42px] h-[30px]"> --}}
                <div
                    class="m-[6px_20px_6px_0] inline-block text-right break-words font-['Fredoka_One','Roboto_Condensed'] font-normal text-[16px] text-[#6F7D93]">
                    {{ $user->name }} {{ $user->prenom }}<br />
                    {{-- Propriétaire --}} {{ __($user->roles[0]->name) ?? 'role' }}
                </div>

                <img src="{{ $user->image ? asset('storage/' . $user->image) : asset('assets/images/avatar.png') }}" alt="User Profile" 
     class="w-[50px] h-[50px] rounded-full bg-cover bg-center">


                {{-- <div class="w-[50px] h-[50px] rounded-full bg-cover bg-center"
                    style="background-image: url({{ asset($user->image) }})">
                </div> --}}
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <!-- Dropdown Menu -->
            <div id="dropdownMenu"
                class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg hidden">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Script to toggle dropdown -->
    <script>
        document.getElementById('dropdownButton').addEventListener('click', function() {
            var menu = document.getElementById('dropdownMenu');
            menu.classList.toggle('hidden');
        });

        // JavaScript to handle modal open and close
        document.getElementById('openModalButton').addEventListener('click', function() {
            document.getElementById('modal').classList.remove('hidden');
        });

        document.getElementById('closeModalButton').addEventListener('click', function() {
            document.getElementById('modal').classList.add('hidden');
        });

        // Optional: close the modal when clicking outside of it
        window.addEventListener('click', function(event) {
            if (event.target === document.getElementById('modal')) {
                document.getElementById('modal').classList.add('hidden');
            }
        });
    </script>

</div>
