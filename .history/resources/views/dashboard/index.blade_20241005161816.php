@extends('layouts.main')

@section('content')
    {{-- navbar --}}
    <x-layouts.navbar :user="Auth::user()" route="dashboard.index" ></x-layouts.navbar>

    <!DOCTYPE html>
    <html lang="en">
    
    <body class="bg-gray-100 font-sans">
    
        <!-- Sidebar and Main Layout -->
        <div class="flex h-screen">
            <!-- Sidebar -->
            <aside class="w-1/5 bg-white p-6 shadow-md">
                <h2 class="text-xl font-bold text-gray-700 mb-10">Synditchat</h2>
                <nav>
                    <ul>
                        <li class="mb-6 flex items-center space-x-3 text-indigo-500">
                            <i class="text-xl">📊</i>
                            <span class="font-medium text-lg">Tableau de bord</span>
                        </li>
                        <li class="mb-6 flex items-center space-x-3 text-gray-600 hover:text-indigo-500">
                            <i class="text-xl">📋</i>
                            <span class="text-lg">Règlements</span>
                        </li>
                        <li class="mb-6 flex items-center space-x-3 text-gray-600 hover:text-indigo-500">
                            <i class="text-xl">🚨</i>
                            <span class="text-lg">Sinistre & nuisance</span>
                        </li>
                        <li class="mb-6 flex items-center space-x-3 text-gray-600 hover:text-indigo-500">
                            <i class="text-xl">📂</i>
                            <span class="text-lg">Mes documents</span>
                        </li>
                        <li class="mb-6 flex items-center space-x-3 text-gray-600 hover:text-indigo-500">
                            <i class="text-xl">📢</i>
                            <span class="text-lg">InfoCom</span>
                        </li>
                        <li class="mb-6 flex items-center space-x-3 text-gray-600 hover:text-indigo-500">
                            <i class="text-xl">💬</i>
                            <span class="text-lg">Tchat</span>
                        </li>
                        <li class="mb-6 flex items-center space-x-3 text-gray-600 hover:text-indigo-500">
                            <i class="text-xl">📦</i>
                            <span class="text-lg">Inventaire</span>
                        </li>
                        <li class="mb-6 flex items-center space-x-3 text-gray-600 hover:text-indigo-500">
                            <i class="text-xl">📅</i>
                            <span class="text-lg">Calendrier</span>
                        </li>
                        <li class="flex items-center space-x-3 text-gray-600 hover:text-indigo-500">
                            <i class="text-xl">⚙</i>
                            <span class="text-lg">Réglage</span>
                        </li>
                    </ul>
                </nav>
            </aside>
    
            <!-- Main content -->
            <div class="flex-1 bg-gray-100 p-8">
                <!-- Header Section -->
                <div class="flex justify-between items-center mb-8">
                    <h1 class="text-2xl font-bold text-gray-700">Résidence NOUR EL HOUDA</h1>
                    <div class="flex items-center space-x-2">
                        <img src="https://flagcdn.com/24x18/ma.png" alt="Moroccan Flag" class="w-6 h-6">
                        <span class="text-gray-700 font-semibold">Ayoub Daali (Admin)</span>
                    </div>
                </div>
    
                <!-- Statistics Section -->
                <div class="grid grid-cols-6 gap-4 mb-10">
                    <div class="bg-white p-6 rounded-xl shadow-md text-center">
                        <p class="text-sm text-gray-500 mb-2">Super Manager</p>
                        <h2 class="text-3xl font-bold">01</h2>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-md text-center">
                        <p class="text-sm text-gray-500 mb-2">Manager</p>
                        <h2 class="text-3xl font-bold">03</h2>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-md text-center">
                        <p class="text-sm text-gray-500 mb-2">Propriétaire</p>
                        <h2 class="text-3xl font-bold">12</h2>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-md text-center">
                        <p class="text-sm text-gray-500 mb-2">Résident</p>
                        <h2 class="text-3xl font-bold">14</h2>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-md text-center">
                        <p class="text-sm text-gray-500 mb-2">Admin</p>
                        <h2 class="text-3xl font-bold">06</h2>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-md text-center">
                        <p class="text-sm text-gray-500 mb-2">Résidences</p>
                        <h2 class="text-3xl font-bold">122</h2>
                    </div>
                </div>
    
    
            <div class="flex justify-between space-x-8">
                <!-- Contacts Section -->
                <div class="w-2/3 bg-white rounded-xl shadow-md p-6">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">Contacts utiles</h2>
                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-gray-600 text-sm font-semibold">GESTIONNAIRE</th>
                                    <th class="px-6 py-3 text-left text-gray-600 text-sm font-semibold">ADRESSE</th>
                                    <th class="px-6 py-3 text-left text-gray-600 text-sm font-semibold">RÔLE</th>
                                    <th class="px-6 py-3 text-left text-gray-600 text-sm font-semibold">TÉLÉPHONE</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 text-gray-700">
                                <tr>
                                    <td class="px-6 py-4 flex items-center space-x-3">
                                        <img src="https://via.placeholder.com/30" alt="Profile" class="rounded-full">
                                        <div>
                                            <span>Hassan BILAL</span><br>
                                            <a href="mailto:hassanbilal@synditchat.com" class="text-xs text-blue-500">hassanbilal@synditchat.com</a>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">Immeuble 13, Appartement 05</td>
                                    <td class="px-6 py-4">Super Manager</td>
                                    <td class="px-6 py-4">0643392556</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 flex items-center space-x-3">
                                        <img src="https://via.placeholder.com/30" alt="Profile" class="rounded-full">
                                        <div>
                                            <span>Hassan BILAL</span><br>
                                            <a href="mailto:hassanbilal@synditchat.com" class="text-xs text-blue-500">hassanbilal@synditchat.com</a>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">Immeuble 13, Appartement 05</td>
                                    <td class="px-6 py-4">Manager</td>
                                    <td class="px-6 py-4">0643392556</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 flex items-center space-x-3">
                                        <img src="https://via.placeholder.com/30" alt="Profile" class="rounded-full">
                                        <div>
                                            <span>Hassan BILAL</span><br>
                                            <a href="mailto:hassanbilal@synditchat.com" class="text-xs text-blue-500">hassanbilal@synditchat.com</a>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">Immeuble 13, Appartement 05</td>
                                    <td class="px-6 py-4">Propriétaire</td>
                                    <td class="px-6 py-4">0643392556</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 flex items-center space-x-3">
                                        <img src="https://via.placeholder.com/30" alt="Profile" class="rounded-full">
                                        <div>
                                            <span>Hassan BILAL</span><br>
                                            <a href="mailto:hassanbilal@synditchat.com" class="text-xs text-blue-500">hassanbilal@synditchat.com</a>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">Immeuble 13, Appartement 05</td>
                                    <td class="px-6 py-4">Résident</td>
                                    <td class="px-6 py-4">0643392556</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 flex items-center space-x-3">
                                        <img src="https://via.placeholder.com/30" alt="Profile" class="rounded-full">
                                        <div>
                                            <span>Hassan BILAL</span><br>
                                            <a href="mailto:hassanbilal@synditchat.com" class="text-xs text-blue-500">hassanbilal@synditchat.com</a>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">Immeuble 13, Appartement 05</td>
                                    <td class="px-6 py-4">Résident</td>
                                    <td class="px-6 py-4">0643392556</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
    
                <!-- InfoCom Section -->
                <div class="w-1/3 bg-white rounded-xl shadow-md p-6">
                        <!-- Title and Date -->
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-lg font-semibold text-gray-700">InfoCom</h2>
                            <span class="text-gray-400 text-xs">10 Juillet 2023</span>
                        </div>
            
                        <!-- Update Entries -->
                        <ul class="space-y-4 text-gray-600 text-sm">
                            <!-- Entry 1 -->
                            <li class="flex items-start space-x-2">
                                <span class="text-green-500">🟢</span>
                                <div>
                                    <p class="font-medium text-indigo-600">Coupure d'eau prévu le 30/09/2024</p>
                                    <p class="text-gray-400 text-xs">25/09/2024</p>
                                </div>
                            </li>
            
                            <!-- Entry 2 -->
                            <li class="flex items-start space-x-2">
                                <span class="text-gray-400">●</span>
                                <div>
                                    <p class="font-medium text-indigo-600">Travaux finis</p>
                                    <p class="text-gray-400 text-xs">23/09/2024</p>
                                </div>
                            </li>
            
                            <!-- Entry 3 -->
                            <li class="flex items-start space-x-2">
                                <span class="text-gray-400">●</span>
                                <div>
                                    <p class="font-medium text-indigo-600">Travaux prévu le 15/09/2024: peinture des escaliers</p>
                                    <p class="text-gray-400 text-xs">10/09/2024</p>
                                </div>
                            </li>
            
                            <!-- Entry 4 -->
                            <li class="flex items-start space-x-2">
                                <span class="text-gray-400">●</span>
                                <div>
                                    <p class="font-medium text-indigo-600">Coupure d'électricité prévu le 15/09/2024</p>
                                    <p class="text-gray-400 text-xs">09/09/2024</p>
                                </div>
                            </li>
                        </ul>
                </div>
            </div>
        </div>
    </body>
    </html>
@endsection
