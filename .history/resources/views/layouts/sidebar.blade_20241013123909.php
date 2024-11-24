@php
    use Illuminate\Support\Str;

    $user = Auth::user();
    if ($user->residence) {
        $residenceId = $user->residence->id;
    } elseif ($user->hasRole('Admin|Super Admin')) {
        $residenceId = \App\Models\Residence::first()->id;
    } else {
        $residenceId = null;
    }
@endphp

<div
    class="rounded-[20px] bg-[#FFFFFF] relative m-[0_30px_20px_0] flex flex-col p-[38px_0_252px_0] box-sizing-border h-fit">
    <div class="m-[0_0_38px_0] inline-block self-center break-words font-['Inter'] font-bold text-[20px] text-[#3A416F]">
        @if (isset($appParameters))
            {{-- <img src="{{ $appParameters->logo ? asset($appParameters->logo) : '' }}" alt="logo"
                class="rounded-full w-[50px] inline-block" >
            {{ $appParameters->app_name ?? '' }} --}}
            <img src="{{ $appParameters->logo ? asset('storage/' . $appParameters->logo) : '' }}" alt="logo"
    class="rounded-full w-[50px] inline-block">
{{ $appParameters->app_name ?? '' }}

        
        @endif

    </div>
    <div class="bg-[#F7F7F7] m-[0_0_28px_0] w-[235px] h-[2px]"></div>


    {{-- <a href="{{ route('dashboard.index') }}"
        class="m-[0_15px_25px_15px] flex flex-row self-start w-[fit-content] box-sizing-border">
        <div
            class="shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] rounded-[8px] @if (Route::currentRouteName() == 'dashboard.index') bg-[#cb0b9e] @else bg-[#E9ECEE] @endif relative m-[0_10px_0_0] flex p-[10px_10px_10px_10px] w-[40px] h-[40px] box-sizing-border">
            <div
                class="bg-[url('{{ asset('assets/images/dashboard_2.png') }}')] bg-[50%_50%] bg-cover bg-no-repeat w-[20px] h-[20px]">
            </div>
        </div>
        <span
            class="m-[12.5px_0_12.5px_0] inline-block break-words font-['Inter'] text-[12px] @if (Route::currentRouteName() == 'dashboard.index') font-bold text-[#3C4C7C] @else font-normal  @if (Route::currentRouteName() == 'dashboard.index') font-bold text-[#3C4C7C] @else font-normal text-[#6F7D93] @endif @endif">
            {{ __('dashboard') }}
        </span>
    </a> --}}
    {{-- <a href="{{ route('dashboard.residence', $residenceId) }}"
        class="m-[0_15px_25px_15px] flex flex-row self-start w-[fit-content] box-sizing-border">
        <div
            class="shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] rounded-[8px] @if (Route::currentRouteName() == 'dashboard.residence') bg-[#cb0b9e] @else bg-[#E9ECEE] @endif relative m-[0_10px_0_0] flex p-[10px_10px_10px_10px] w-[40px] h-[40px] box-sizing-border">
            <div
                class="@if (Route::currentRouteName() == 'dashboard.residence') bg-[url('{{ asset('assets/images/dashboard_1.png') }}')] @else bg-[url('{{ asset('assets/images/dashboard_2.png') }}')] @endif bg-[50%_50%] bg-cover bg-no-repeat w-[20px] h-[20px]">
            </div>
        </div>
        <span
            class="m-[12.5px_0_12.5px_0] inline-block break-words font-['Inter'] text-[12px]  @if (Route::currentRouteName() == 'dashboard.index') font-bold text-[#3C4C7C] @else font-normal  @if (Route::currentRouteName() == 'dashboard.index') font-bold text-[#3C4C7C] @else font-normal text-[#6F7D93] @endif @endif">
            
            {{ __('dashboard') }}
        </span>
    </a> --}}
    <a href="{{ route('dashboard.residence', $residenceId) }}"
   class="m-[0_15px_25px_15px] flex flex-row self-start w-[fit-content] box-sizing-border">
    <div
        class="shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] rounded-[8px] {{ Route::currentRouteName() == 'dashboard.residence' ? 'bg-[#cb0b9e]' : 'bg-[#E9ECEE]' }} relative m-[0_10px_0_0] flex p-[10px_10px_10px_10px] w-[40px] h-[40px] box-sizing-border">
        <div class="{{ Route::currentRouteName() == 'dashboard.residence' ? 'bg-[url({{ asset('assets/images/dashboard_1.png') }})]' : 'bg-[url({{ asset('assets/images/dashboard_2.png') }})]' }} bg-[50%_50%] bg-cover bg-no-repeat w-[20px] h-[20px]">
        </div>
    </div>
    <span class="m-[12.5px_0_12.5px_0] inline-block break-words font-['Inter'] text-[12px] {{ Route::currentRouteName() == 'dashboard.residence' ? 'font-bold text-[#3C4C7C]' : 'font-normal text-[#6F7D93]' }}">
        {{ __('dashboard') }}
    </span>
</a>
 
    <a href="{{ route('regelement.show', $residenceId) }}"
        class="m-[0_15px_25px_15px] flex flex-row self-start w-[fit-content] box-sizing-border">
        <div
            class="shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] rounded-[8px] @if (Route::currentRouteName() == 'regelement.show') bg-[#cb0b9e] @else bg-[#E9ECEE] @endif relative m-[0_10px_0_0] flex p-[10px_10px_10px_10px] w-[40px] h-[40px] box-sizing-border">
            <div
                class="@if (Route::currentRouteName() == 'regelement.show') bg-[url('{{ asset('assets/images/decision_2.png') }}')] @else bg-[url('{{ asset('assets/images/decision_12.png') }}')] @endif bg-[50%_50%] bg-cover bg-no-repeat w-[20px] h-[20px]">
            </div>
        </div>
        <span
            class="m-[12.5px_0_12.5px_0] inline-block break-words font-['Inter'] text-[12px] @if (Route::currentRouteName() == 'regelement.show') font-bold text-[#3C4C7C] @else font-normal  @if (Route::currentRouteName() == 'regelement.show') font-bold text-[#3C4C7C] @else font-normal text-[#6F7D93] @endif @endif">
            {{ __('Règlement') }}
        </span>
    </a>
    <a href="{{ route('reclamations.residence', $residenceId) }}"
        class="m-[0_15px_25px_15px] flex flex-row self-start w-[fit-content] box-sizing-border">
        <div
            class="shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] rounded-[8px] @if (Route::currentRouteName() == 'reclamations.residence') bg-[#cb0b9e] @else bg-[#E9ECEE] @endif relative m-[0_10px_0_0] flex p-[10px_10px_10px_10px] w-[40px] h-[40px] box-sizing-border">
            <div
                class="@if (Route::currentRouteName() == 'reclamations.residence') bg-[url('{{ asset('assets/images/problem_solving_11.png') }}')] @else bg-[url('{{ asset('assets/images/problem_solving_1.png') }}')] @endif bg-[50%_50%] bg-cover bg-no-repeat w-[20px] h-[20px]">
            </div>
        </div>
        <span
            class="m-[12.5px_0_12.5px_0] inline-block break-words font-['Inter'] text-[12px]  @if (Route::currentRouteName() == 'reclamations') font-bold text-[#3C4C7C] @else font-normal text-[#6F7D93] @endif">

            {{ __('Sinistre & Nuisance') }}

        </span>
    </a>
    <a href="{{ route('document.residence', $residenceId) }}"
        class="m-[0_15px_25px_15px] flex flex-row self-start w-[fit-content] box-sizing-border">
        <div
            class="shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] rounded-[8px]
            @if (Str::startsWith(Route::currentRouteName(), 'document.')) bg-[#cb0b9e] @else bg-[#E9ECEE] @endif
            relative m-[0_10px_0_0] flex p-[10px_10px_10px_10px] w-[40px] h-[40px] box-sizing-border">

            <div
                class="@if (Str::startsWith(Route::currentRouteName(), 'document.')) bg-[url('{{ asset('assets/images/documents_11.png') }}')] @else bg-[url('{{ asset('assets/images/documents_1.png') }}')] @endif bg-[50%_50%] bg-cover bg-no-repeat w-[20px] h-[20px]">
            </div>
        </div>
        <span
            class="m-[12.5px_0_12.5px_0] inline-block break-words font-['Inter'] text-[12px]  @if (Route::currentRouteName() == 'document.index') font-bold text-[#3C4C7C] @else font-normal text-[#6F7D93] @endif">
            {{ __('Mes_documents') }}

        </span>
    </a>
    <a href="{{ route('infocom.index') }}"
        class="m-[0_15px_25px_15px] flex flex-row self-start w-[fit-content] box-sizing-border">
        <div
            class="shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] rounded-[8px] @if (Route::currentRouteName() == 'infocom.index') bg-[#cb0b9e] @else bg-[#E9ECEE] @endif relative m-[0_10px_0_0] flex p-[10px_10px_10px_10px] w-[40px] h-[40px] box-sizing-border">
            <div
                class="@if (Route::currentRouteName() == 'infocom.index') bg-[url('{{ asset('assets/images/declaration_1.png') }}')] @else bg-[url('{{ asset('assets/images/declaration_11.png') }}')] @endif  bg-[50%_50%] bg-cover bg-no-repeat w-[20px] h-[20px]">
            </div>
        </div>
        <span
            class="m-[12.5px_0_12.5px_0] inline-block break-words font-['Inter'] text-[12px]  @if (Route::currentRouteName() == 'infocom.index') font-bold text-[#3C4C7C] @else font-normal text-[#6F7D93] @endif">
            {{ __('Info’Com') }}

        </span>
    </a>

    <a href="{{ route(config('chatify.routes.prefix')) }}"
        class="m-[0_15px_25px_15px] flex flex-row self-start w-fit box-sizing-border">
        <div
            class="shadow-[0px_4px_4px_rgba(0,0,0,0.25)] rounded-[8px]
        {{ Route::currentRouteName() == config('chatify.routes.prefix') ? 'bg-[#cb0b9e]' : 'bg-[#E9ECEE]' }}
        relative m-[0_10px_0_0] flex p-[10px] w-[40px] h-[40px] box-sizing-border">
            <div
                class="{{ Route::currentRouteName() == config('chatify.routes.prefix')
                    ? 'bg-[url(' . asset('assets/images/message_21.png') . ')]'
                    : 'bg-[url(' . asset('assets/images/message_31.png') . ')]' }}
            bg-center bg-cover bg-no-repeat w-[20px] h-[20px]">
            </div>
        </div>
        <span
            class="m-[12.5px_0] inline-block break-words font-['Inter'] text-[12px]
        {{ Route::currentRouteName() == 'tchat.index' ? 'font-bold text-[#3C4C7C]' : 'font-normal text-[#6F7D93]' }}">
            {{ __('Tchat') }}

        </span>
    </a>

    <a href="{{ route('inventaire.residence', $residenceId) }}"
        class="m-[0_15px_25px_15px] flex flex-row self-start w-[fit-content] box-sizing-border">
        <div
            class="shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] rounded-[8px] @if (Route::currentRouteName() == 'inventaire.residence') bg-[#cb0b9e] @else bg-[#E9ECEE] @endif relative m-[0_10px_0_0] flex p-[10px_10px_10px_10px] w-[40px] h-[40px] box-sizing-border">
            <div
                class="@if (Route::currentRouteName() == 'inventaire.residence') bg-[url('{{ asset('assets/images/inventory_11.png') }}')] @else bg-[url('{{ asset('assets/images/inventory_1.png') }}')] @endif bg-[50%_50%] bg-cover bg-no-repeat w-[20px] h-[20px]">
            </div>
        </div>
        <span
            class="m-[12.5px_0_12.5px_0] inline-block break-words font-['Inter'] text-[12px]  @if (Route::currentRouteName() == 'inventaire.index') font-bold text-[#3C4C7C] @else font-normal text-[#6F7D93] @endif">

            {{ __('Inventaire') }}

        </span>
    </a>

    <a href="{{ route('events.index', $residenceId) }}"
        class="m-[0_15px_25px_15px] flex flex-row self-start w-[fit-content] box-sizing-border">
        <div
            class="shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] rounded-[8px] @if (Route::currentRouteName() == 'events.index') bg-[#cb0b9e] @else bg-[#E9ECEE] @endif relative m-[0_10px_0_0] flex p-[10px_10px_10px_10px] w-[40px] h-[40px] box-sizing-border">
            <div
                class="@if (Route::currentRouteName() == 'events.index') bg-[url('{{ asset('assets/images/calendar_31.png') }}')] @else bg-[url('{{ asset('assets/images/calendar_41.png') }}')] @endif bg-[50%_50%] bg-cover bg-no-repeat w-[20px] h-[20px]">
            </div>
        </div>
        <span
            class="m-[12.5px_0_12.5px_0] inline-block break-words font-['Inter'] text-[12px]  @if (Route::currentRouteName() == 'events.index') font-bold text-[#3C4C7C] @else font-normal text-[#6F7D93] @endif">
            {{ __('Calendrier') }}
        </span>
    </a>
    @if ($residenceId)
        <a href="{{ route('reglages.show', $residenceId) }}"
            class="m-[0_15px_0_15px] flex flex-row self-start w-[fit-content] box-sizing-border">
            <div
                class="shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] rounded-[8px] @if (Route::currentRouteName() == 'reglages.show') bg-[#cb0b9e] @else bg-[#E9ECEE] @endif relative m-[0_10px_0_0] flex p-[10px_10px_10px_10px] w-[40px] h-[40px] box-sizing-border">
                <div
                    class="@if (Route::currentRouteName() == 'reglages.show') bg-[url('{{ asset('assets/images/settings_51.png') }}')] @else bg-[url('{{ asset('assets/images/settings_41.png') }}')] @endif bg-[50%_50%] bg-cover bg-no-repeat w-[20px] h-[20px]">
                </div>
            </div>
            <span
                class="m-[12.5px_0_12.5px_0] inline-block break-words font-['Inter'] text-[12px]  @if (Route::currentRouteName() == 'reglages.show') font-bold text-[#3C4C7C] @else font-normal text-[#6F7D93] @endif">
                {{ __('Réglements') }}
            </span>
        </a>
    @endif

</div>
