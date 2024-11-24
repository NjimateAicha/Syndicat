@extends('layouts.main')

@section('content')
    {{-- Navbar --}}
    <x-layouts.navbar :user="Auth::user()" route="dashboard.residence"></x-layouts.navbar>

    <!-- Main content -->
    <div class="flex-1 w-full ">

        <!-- Statistics Section -->
        <div class="grid grid-cols-6 gap-4 mb-10">
            {{-- @foreach ($roleCounts as $role => $count)
                @if (Auth::user()->hasAnyRole(['Super Admin', 'Admin']) ||
                        (Auth::user()->hasAnyRole(['Manager principal', 'Manager']) && !in_array($role, ['Super Admin', 'Admin'])))
                    <div
                        class="bg-white p-6 rounded-xl shadow-md text-center transition-transform transform hover:scale-105">
                        <p class="text-sm text-gray-500 mb-2">{{ __('' . $role) }}</p>
                        <h2 class="text-3xl font-bold text-indigo-600">{{ $count }}</h2>
                    </div>
                @endif
            @endforeach --}}
        @foreach ($roleCounts as $role => $count)
           @if (
        (Auth::user()->hasAnyRole(['Super Admin', 'Admin'])) ||  // Admins or Super Admins can see everything
        (Auth::user()->hasAnyRole(['Manager principal', 'Manager']) && !in_array($role, ['Super Admin', 'Admin'])) // Managers can see roles excluding Super Admin/Admin
                 )
            @if ($role !== 'Super Admin')  <!-- Exclude Super Admin from display -->
            <div class="bg-white p-6 rounded-xl shadow-md text-center transition-transform transform hover:scale-105">
                <p class="text-sm text-gray-500 mb-2">{{ __('' . $role) }}</p>
                <h2 class="text-3xl font-bold text-indigo-600">{{ $count }}</h2>
            </div>
        @endif
    @endif
@endforeach


            @if (Auth::user()->hasAnyRole(['Super Admin', 'Admin']))
                <div class="bg-white p-6 rounded-xl shadow-md text-center transition-transform transform hover:scale-105">
                    <p class="text-sm text-gray-500 mb-2">{{ __('Residence') }}</p>
                    <h2 class="text-3xl font-bold text-indigo-600">{{ $residences }}</h2>
                </div>
            @endif
        </div>


        <div class="flex justify-between w-full  space-x-8">
            <!-- Contacts Section -->
            <div class="w-2/3 bg-white rounded-xl shadow-md p-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">{{ __('Useful Contacts') }}</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-gray-600 text-sm font-semibold">
                                    {{ __('Manager') }}</th>
                                <th class="px-6 py-3 text-left text-gray-600 text-sm font-semibold">
                                    {{ __('Address') }}</th>
                                <th class="px-6 py-3 text-left text-gray-600 text-sm font-semibold">
                                    {{ __('Role') }}</th>
                                <th class="px-6 py-3 text-left text-gray-600 text-sm font-semibold">
                                    {{ __('Phone') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 text-gray-700">
                            @forelse ($users as $user)
                                @if (Auth::user()->hasAnyRole(['Super Admin', 'Admin']))
                                    <tr>
                                        <td class="px-6 py-4 flex items-center space-x-3">
                                             <img src="{{ $user->image ? asset('storage/' . $user->image) : asset('assets/images/avatar.png') }}"
                                            alt="User Profile" class="rounded-[8px] w-[40px] h-[40px] bg-cover bg-center">
                                           
                                            <div>
                                                <p class="font-['Inter'] font-semibold text-[12px] text-[#3A416F]">
                                                    {{ $user->prenom }}  {{ $user->name }} 
                                                </p>
                                                <a href="mailto: {{ $user->email }}" class="text-[12px] text-[#6F7D93]">{{ $user->email }}</a>
                                              
                                            </div>
                                        </td>
                                        <td class="p-2 text-left">
                                            <p class="font-['Inter'] font-semibold text-[12px] text-[rgba(58,65,111,0.8)]">
                                                {{ __('Building') }}  {{ $user->Num_Immenble }}</p>
                                            <p class="text-[12px] text-[#6F7D93]">  {{ __('Apartment') }}  {{ $user->Num_Appartement }}</p>
                                        </td>
                                        <td  class="text-[#6F7D93] text-[10px] font-['Inter']">
                                            {{ __('' . optional($user->roles->first())->name) }}</td>
                                         <td class="p-2 text-center font-['Inter'] text-[12px] text-[#3A416F]">
                                                {{ $user->phone }}
                                            </td>
                                    </tr>
                                @else
                                    @if (optional($user->roles->first())->name !== 'Admin' && optional($user->roles->first())->name !== 'Super Admin')
                                    <tr>
                                        <td class="px-6 py-4 flex items-center space-x-3">
                                             <img src="{{ $user->image ? asset('storage/' . $user->image) : asset('assets/images/avatar.png') }}"
                                            alt="User Profile" class="rounded-[8px] w-[40px] h-[40px] bg-cover bg-center">
                                           
                                            <div>
                                                <p class="font-['Inter'] font-semibold text-[12px] text-[#3A416F]">
                                                    {{ $user->prenom }} {{ $user->name }}</p>
                                                <a href="mailto: {{ $user->email }}" class="text-[12px] text-[#6F7D93]">{{ $user->email }}</a>
                                              
                                            </div>
                                        </td>
                                        <td class="p-2 text-left">
                                            <p class="font-['Inter'] font-semibold text-[12px] text-[rgba(58,65,111,0.8)]">
                                                {{ __('Building') }}  {{ $user->Num_Immenble }}</p>
                                            <p class="text-[12px] text-[#6F7D93]">  {{ __('Apartment') }}  {{ $user->Num_Appartement }}</p>
                                        </td>
                                        <td  class="text-[#6F7D93] text-[10px] font-['Inter']">
                                            {{ __('' . optional($user->roles->first())->name) }}</td>
                                         <td class="p-2 text-center font-['Inter'] text-[12px] text-[#3A416F]">
                                                {{ $user->phone }}
                                            </td>
                                    </tr>
                                           
                                    @endif
                                @endif
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center">{{ __('No users found.') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- InfoCom Section -->
            {{-- <div class="w-1/3 bg-white rounded-xl shadow-md p-6">
                <!-- Title and Date -->
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-semibold text-gray-700">{{ __('InfoCom') }}</h2>
                    <span class="text-gray-400 text-xs">{{ now()->format('d/m/Y - H:i') }} Dernière mise à jour</span>
                </div>

                @php
                    // Get the latest date from the infoComs
                    $latestDate = $infoComs->max('date_info');
                @endphp

                <ul class="space-y-4 text-gray-600 text-sm">
                    @foreach ($infoComs as $infoCom)
                        <li class="flex items-start space-x-2">
                            @if ($infoCom->date_info === $latestDate)
                                <span class="text-green-500 text-xl">🟢</span>
                                
                            @endif
                            <div>
                                <p class="font-medium text-indigo-600">{{ $infoCom->titre }}</p>
                                <p class="text-gray-400 text-xs">{{ $infoCom->date_info }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div> --}}




            <!-- InfoCom Section -->
            @php
                // Fetch and format the latest date for reuse
                $latestDate = $infoComs->max('date_info');
                $formattedLatestDate = \Carbon\Carbon::parse($latestDate)->format('d F Y');
            @endphp

            <div class="w-full lg:w-1/3 bg-white rounded-xl shadow-md px-6">
                <!-- InfoCom Section -->
                <div class="mt-5">
                    <div class="flex flex-row justify-between items-baseline">
                        <h2 class="font-bold text-[#3C4C7C] text-[14px]">Info'Com</h2>
                        <div class="text-xs text-[#6F7D93]">{{ $formattedLatestDate }}</div>
                    </div>
                    

                    <div class="space-y-4 mt-4">
                        <div class="text-gray-800 flex items-center">
                            
                                <!-- SVG Arrow Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 10l7-7m0 0l7 7M12 3v18" />
                                </svg>
                                <p class="ml-2 text-xs text-gray-500">{{ \Carbon\Carbon::parse($latestDate)->format('d/m/Y') }}
                                    Dernière mise à jour</p>
                          
                        </div>

                        <div class="h-[1px]">

                        </div>
                        <!-- Notification List -->
                        <div class="space-y-3">
                            {{-- @foreach ($infoComs as $infoCom)
                               <div class="flex items-center space-x-2">
                                    <!-- Display Bell Icon if it's the latest date -->
                                    <div>
                                        <div class="flex items-center">
                                            @if ($infoCom->date_info === $latestDate)
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11c0-3.07-1.64-5.64-4.5-6.32V4a1.5 1.5 0 00-3 0v.68C7.64 5.36 6 7.93 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m0 0v1a3 3 0 006 0v-1m-6 0h6" />
                                                </svg>
                                            @endif
                                            <p class="text-[#3C4C7C] text-[12px] font-semibold">{{ $infoCom->titre }}</p>
                                        </div>
                                        <p class="text-[12px] mt-2 text-[#6F7D93]"><span class="text-gray-400 mr-2 w-5 h-5">|</span>
                                            {{ \Carbon\Carbon::parse($infoCom->date_info)->format('d/m/Y') }}</p>
                                    </div>
                                </div>
                            @endforeach  --}}
                            <div class="space-y-4">
                                @foreach ($infoComs as $index => $infoCom)
                                    <div class="flex items-start space-x-2">
                                        <!-- Icône à gauche (conditionnelle) -->
                                        <div class="flex items-center">
                                            <!-- Vérification si c'est le premier élément -->
                                            @if ($loop->first)
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11c0-3.07-1.64-5.64-4.5-6.32V4a1.5 1.5 0 00-3 0v.68C7.64 5.36 6 7.93 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m0 0v1a3 3 0 006 0v-1m-6 0h6" />
                                                </svg>
                                            @else
                                                <span class="text-gray-400 mr-2">|</span>
                                            @endif
                                        </div>
                            
                                        <!-- Titre et date à droite -->
                                        <div>
                                            <p class="text-[#3C4C7C] text-[12px] font-semibold">{{ $infoCom->titre }}</p>
                                            <p class="text-[12px] mt-2 text-[#6F7D93]">
                                                {{ \Carbon\Carbon::parse($infoCom->date_info)->format('d/m/Y') }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            
                            
                            

                            

                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="w-1/3 bg-white rounded-xl shadow-md p-6">
                <!-- Title, Bell Icon, and Last Update -->
                <div class="  items-center mb-4">
                    <div class="flex items-center space-x-2">
                        <!-- Green Bell Icon -->
                        
                        <h2 class="text-lg font-semibold text-gray-700">{{ __('InfoCom') }}</h2>
                    </div>
                <div>
                    
                       <span class="text-green-500 text-lg">⬆️</span>

                       <span class="text-gray-400 text-xs">{{ now()->format('d/m/Y - H:i') }} Dernière mise à jour</span>

                </div>
                 
                </div>
            
                @php
                    // Get the latest date from the infoComs
                    $latestDate = $infoComs->max('date_info');
                @endphp
            
                <!-- Information List -->
                <ul class="space-y-3 text-gray-600 text-sm">
                    @foreach ($infoComs as $infoCom)
                        <li class="flex items-start space-x-2">
                            <!-- Arrow Icon for the latest update -->
                            @if ($infoCom->date_info === $latestDate)
                                <span class="text-green-500 text-lg">🔔</span>
                            @else
                                <span class="text-gray-500 text-lg">|</span>
                            @endif
                            <div>
                                <!-- Title of the Info -->
                                <p class="font-medium text-indigo-600">{{ $infoCom->titre }}</p>
                                <!-- Date of the Info -->
                                <p class="text-gray-400 text-xs">{{ \Carbon\Carbon::parse($infoCom->date_info)->format('d/m/Y') }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
             --}}
            
        </div>

    </div>
@endsection
