@extends('layouts.main')

@section('content')
    {{-- Barre de navigation --}}
    <x-layouts.navbar :user="Auth::user()" route="send.message"></x-layouts.navbar>
    <script>
         function changeResidence() {
        let residenceId = localStorage.getItem('selectedResidenceId');
        console.log(residenceId); // Log the residence ID

        // Update the group link dynamically based on the residenceId
        if (residenceId) {
            // Set the new URL for the group link
            document.getElementById('groupLink').href = "{{ url('chat/residence') }}/" + residenceId;
        }
    }

    // Call the changeResidence function when the script loads to set the initial value
    changeResidence();
    </script>
    @include('Chatify::layouts.headLinks')

    <div class="messenger">
        {{-- Liste des utilisateurs/groupes --}}
        <div class="messenger-listView {{ !!$id ? 'conversation-active' : '' }}">
            {{-- En-tête et barre de recherche --}}
            <div class="m-header">
                <nav>
                    <a href="javascript:void(0);">
                        <span class="messenger-headTitle font-semibold text-[14px] text-[#3C4C7C]">Discussions</span>
                    </a>
                    {{-- Boutons de l'en-tête --}}
                    <nav class="m-header-right">
                        <a href="{{ route('contacts.search') }}"
                            class="payPurchase_due rounded-[6px] bg-gradient-to-r from-[#9EAFCE] to-[#697C9B] p-[4px] w-[24px] h-[24px] flex justify-center items-center cursor-pointer">
                            <img src="{{ asset('assets/images/chat_31.png') }}" class="w-[16px] h-[16px]" alt="Chat">
                        </a>
                        <a href="{{ route('chat.residence', ['id' => $residenceId]) }}" class="getGroup rounded-[6px] bg-gradient-to-r from-[#9EAFCE] to-[#697C9B] p-[4px] w-[24px] h-[24px] flex justify-center items-center cursor-pointer">
                            <img src="{{ asset('assets/images/add_group_1.png') }}" class="w-[16px] h-[16px]" alt="Ajouter un groupe">
                        </a>
                    </nav>
                </nav>
                {{-- Champ de recherche --}}
                <input type="text" placeholder="Rechercher" class="messenger-search rounded-[8px] border-[1px_solid_#9EAFCE] m-[0_20px_20px_20px] p-[12.5px_20px] w-[fit-content] text-[12px] text-[#A2A2A2] font-['Inter']">
            </div>

            {{-- Onglets et listes --}}
            <div class="m-body contacts-container">
                {{-- Onglet Utilisateur --}}
                <div class="show messenger-tab users-tab app-scroll" data-view="users">
                    {{-- Favoris --}}
                    <div class="favorites-section">
                        <p class="messenger-title"><span>Favoris</span></p>
                        <div class="messenger-favorites app-scroll-hidden"></div>
                    </div>

                     {{-- groups --}}
                      <div class="groups-section">
                        <p class="messenger-title"><span>Groups</span></p>
                        <div class="messenger-groups app-scroll-hidden"></div>
                        
                    </div>

                    {{-- Contacts --}}
                    <p class="messenger-title"><span>Tous les messages</span></p>
                    <div class="listOfContacts" style="width: 100%; height: calc(100% - 272px); position: relative;"></div>
                </div>

                {{-- Onglet Recherche --}}
                <div class="messenger-tab search-tab app-scroll" data-view="search">
                    <p class="messenger-title"><span>Recherche</span></p>
                    <div class="search-records">
                        <p class="message-hint center-el"><span>Tapez pour rechercher..</span></p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Zone de messagerie --}}
        <div class="messenger-messagingView">
            {{-- titre de l'en-tête et boutons --}}
            <div class="m-header m-header-messaging">
                <nav class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                    <div class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                        <a href="#" class="show-listView"><i class="fas fa-arrow-left"></i></a>
                        <div class="avatar av-s header-avatar" style="margin: 0 10px; margin-top: -5px; margin-bottom: -5px;"></div>
                        <a href="#" class="user-name">{{ config('chatify.name') }}</a>
                    </div>
                    {{-- boutons de l'en-tête --}}
                    <nav class="m-header-right">
                        <a href="#" class="add-to-favorite"><i class="fas fa-star"></i></a>
                        <a href="/"><i class="fas fa-home"></i></a>
                        <a href="#" class="show-infoSide"><i class="fas fa-info-circle"></i></a>
                    </nav>
                </nav>
                <div class="internet-connection">
                    <span class="ic-connected">Connecté</span>
                    <span class="ic-connecting">Connexion en cours...</span>
                    <span class="ic-noInternet">Pas d'accès à Internet</span>
                </div>
            </div>

            <div class="m-body messages-container app-scroll">
                <div class="messages">
                    <p class="message-hint center-el"><span>Veuillez sélectionner un chat pour commencer à discuter</span></p>
                </div>
                <div class="typing-indicator">
                    <div class="message-card typing">
                        <div class="message">
                            <span class="typing-dots">
                                <span class="dot dot-1"></span>
                                <span class="dot dot-2"></span>
                                <span class="dot dot-3"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @include('Chatify::layouts.sendForm')
        </div>
    </div>

    {{-- Modal --}}
    <div class="fixed inset-0 z-50 hidden pay_contact_due_modal bg-black bg-opacity-50 flex items-center justify-center"
        role="dialog" aria-labelledby="userSearchModalLabel">
    </div>

    <div class="fixed inset-0 z-50 hidden groupModal bg-black bg-opacity-50 flex items-center justify-center"
        role="dialog" aria-labelledby="userSearchModalLabel">
    </div>

    @include('Chatify::layouts.modals')
    @include('Chatify::layouts.footerLinks')
    
@endsection
<script>
    function changeResidence(residenceId) {
        window.location.href = "{{ route('chat.residence', '') }}/" + residenceId;
    }
</script>