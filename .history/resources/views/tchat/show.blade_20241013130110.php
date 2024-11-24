<style>
    /* Custom Scrollbar */
    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background-color: #9EAFCE;
        /* Scrollbar thumb color */
        border-radius: 10px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background-color: #6C85B0;
        /* Darken scrollbar on hover */
    }

    /* Add cursor pointer when hovering over list items */
    .messenger-list-modal {
        cursor: pointer;
        transition: background-color 0.3s ease-in-out;
    }

    .messenger-list-modal:hover {
        background-color: #f9fafb;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    }

    /* Styling the modal close button */
    .close-modal {
        background-color: transparent;
        border: none;
        font-size: 1.5rem;
        line-height: 1;
        cursor: pointer;
        transition: color 0.2s ease-in-out;
    }

    .close-modal:hover {
        color: #ff5e5e;
    }

    /* Avatar styling */
    .avatar.av-m {
        width: 40px;
        height: 40px;
        background-size: cover;
        background-position: center;
        border-radius: 50%;
    }

    .p-2 {
        padding: 0.5rem;
    }

    /* Small text improvements */
    .text-sm {
        font-size: 0.875rem;
    }

    .text-gray-600 {
        color: #718096;
    }

    /* Modal improvements */
    .rounded-md {
        border-radius: 0.375rem;
    }

    .bg-white {
        background-color: #fff;
    }

    .shadow-lg {
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    }
</style>

<div class="bg-white rounded-lg shadow-lg max-w-lg w-full">
    <!-- Modal Header -->
    <div class="flex justify-between items-center p-4 border-b border-gray-200">
        <h5 class="text-lg font-semibold">Envoyer un message</h5>
        <button type="button" class="close-modal" aria-label="Close modal">
            &times;
        </button>
    </div>

    <!-- Modal Body -->
    <div class="p-4">
        <h6 class="text-sm font-medium">Contacts</h6>
        <!-- Search Bar -->
        <div class="mt-2">
            <input type="text" name="search" id="search" class="w-full p-2 border border-gray-300 rounded-md"
                placeholder="Rechercher">
        </div>

        <!-- Contact List -->
        <ul class="mt-4 space-y-2 max-h-80 overflow-y-auto contact-list custom-scrollbar">
            @forelse ($users as $usersList)
                <li data-contact="{{ $usersList->id }}"
                    class="messenger-list-modal flex justify-between items-start p-2 bg-white border-b border-gray-200 shadow-sm rounded-md transition-all duration-300 ease-in-out">
                    <div class="flex items-center space-x-4">
                        <!-- Avatar -->
                       
                            
                            <div class="avatar av-s header-avatar" style="margin: 0 10px; margin-top: -5px; margin-bottom: -5px;"></div>
                           
                        
                        <!-- User Info -->
                        <div>
                            <p class="font-medium text-gray-900">{{ $usersList->name }}</p>
                            <p class="text-sm text-gray-500">{{ $usersList->prenom }}</p>
                        </div>
                    </div>
                    <!-- Address -->
                    <div class="text-right text-sm text-gray-600">
                        Immeuble {{ $usersList->Num_Immenble }} <br>
                        Appartement {{ $usersList->Num_Appartement }}
                    </div>
                </li>
            @empty
                <li class="text-center text-gray-500">Votre liste de contacts est vide</li>
            @endforelse
        </ul>
    </div>
    
</div>
