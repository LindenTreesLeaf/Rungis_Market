@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Tableau de bord</h2>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
       
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6 w-full sm:w-60">
            <h2 class="text-xl font-semibold text-purple-500 mb-4">Menu</h2>
            <ul class="space-y-4">
               
                <li>
                    <button class="text-purple-600 hover:text-purple-800 w-full text-left" onclick="toggleEquipmentsMenu()">
                        Équipements
                    </button>
                    <ul id="equipmentsMenu" class="pl-4 space-y-2 hidden">
                        <li><a href="{{ route('equipments.create') }}" class="text-gray-600 hover:text-gray-800">Créer un Équipement</a></li>
                        <li><a href="{{ route('equipments.index') }}" class="text-gray-600 hover:text-gray-800">Modifier un Équipement</a></li>
                        <li><a href="{{ route('equipments.manage') }}" class="text-gray-600 hover:text-gray-800">Gérer Disponibilité</a></li>
                    </ul>
                </li>

                
                <li>
                    <a href="{{ route('orders.index') }}" class="text-purple-600 hover:text-purple-800">Commandes en Cours</a>
                </li>

                
                <li>
                    <button class="text-purple-600 hover:text-purple-800 w-full text-left" onclick="togglePlacesMenu()">
                        Places
                    </button>
                    <ul id="placesMenu" class="pl-4 space-y-2 hidden">
                        <li><a href="{{ route('buildings.index') }}" class="text-gray-600 hover:text-gray-800">Bâtiments</a></li>
                        <li><a href="{{ route('places.manage') }}" class="text-gray-600 hover:text-gray-800">Gérer Places</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        
        <div class="bg-white p-4 shadow rounded-lg md:col-span-3">
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <h3 class="text-lg font-semibold">Bâtiments</h3>
                    <p class="text-2xl">{{ $totalBuildings }}</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold">Places</h3>
                    <p class="text-2xl">{{ $totalPlaces }}</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold">Équipements</h3>
                    <p class="text-2xl">{{ $totalEquipments }}</p>
                </div>
            </div>
        </div>
    </div>

    
    <div class="mt-8 bg-white p-6 shadow rounded-lg">
        <h3 class="text-lg font-semibold">Commandes récentes</h3>
        <table class="w-full mt-4 border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2 text-left">ID</th>
                    <th class="px-4 py-2 text-left">Client</th>
                    <th class="px-4 py-2 text-left">Statut</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recentOrders as $order)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $order->id }}</td>
                        <td class="px-4 py-2">{{ $order->user->name }}</td>
                        <td class="px-4 py-2">{{ $order->state->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    function toggleEquipmentsMenu() {
        const menu = document.getElementById('equipmentsMenu');
        menu.classList.toggle('hidden');
    }

    function togglePlacesMenu() {
        const menu = document.getElementById('placesMenu');
        menu.classList.toggle('hidden');
    }
</script>

@endsection
