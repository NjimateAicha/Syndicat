<div class="fixed inset-0 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg max-w-lg w-full">
        <!-- Modal Header -->
        <div class="border-b p-4 flex justify-between items-center">
            <h5 class="text-lg font-semibold">Créer Un Groupe de discussion</h5>
            <button type="button" class="text-gray-500 hover:text-gray-700" aria-label="Close" id="closeModal">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Modal Body -->
        <div class="p-4">
            <form method="POST" action="">
                @csrf <!-- CSRF token for security -->
                
                <!-- Group Name -->
                <div class="mb-4">
                    <label for="groupName" class="block text-sm font-medium text-gray-700">Entrez le nom du groupe</label>
                    <input type="text" id="groupName" name="group_name" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring focus:ring-indigo-200">
                </div>

                <!-- Contacts Section -->
                <h6 class="text-sm font-medium">Contacts</h6>
                
                <!-- Search Input -->
                <div class="mt-2">
                    <input type="text" id="search" name="search"
                        class="w-full p-2 border border-gray-300 rounded-md" placeholder="Rechercher">
                </div>

                <!-- Contact List -->
                <ul class="mt-4 space-y-2 max-h-80 overflow-y-auto custom-scrollbar">
                    @forelse ($users as $user)
                        <li data-contact="{{ $user->id }}" class="flex justify-between items-start p-2 bg-white border-b border-gray-200 shadow-sm rounded-md transition-all duration-300 ease-in-out">
                            <!-- User Information -->
                            <div class="flex items-center space-x-4">
                                <!-- Avatar -->
                                <div class="avatar av-m" style="background-image: url('{{ asset('assets/images/avatar.png') }}');"></div>
                                <!-- User Details -->
                                <div>
                                    <p class="font-medium text-gray-900">{{ $user->name }}</p>
                                    <p class="text-sm text-gray-500">{{ $user->prenom }}</p>
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="text-right text-sm text-gray-600">
                                Immeuble {{ $user->Num_Immenble }} <br>
                                Appartement {{ $user->Num_Appartement }}
                            </div>

                            <!-- Checkbox -->
                            <div class="flex items-center">
                                <input type="checkbox" name="contacts[]" value="{{ $user->id }}"
                                    class="form-check-input h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            </div>
                        </li>
                    @empty
                        <li class="text-center text-gray-500">Votre liste de contacts est vide</li>
                    @endforelse
                </ul>

                <!-- Modal Footer -->
                <div class="p-4 border-t flex justify-end">
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-md">Créer</button>
                </div>
            </form>
        </div>
    </div>
</div>
