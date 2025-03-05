@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-center text-purple-600 text-3xl font-bold mb-6">Tableau de Bord</h1>

   
    <div class="bg-purple-500 text-white rounded-lg p-4 mb-6">
        <nav class="flex flex-wrap justify-center space-x-4">
            <a href="{{ route('places.reserve') }}" class="hover:underline">📍 Réserver une Place</a>
            <a href="{{ route('equipments.rent') }}" class="hover:underline">🛠️ Louer un Équipement</a>
            <a href="{{ route('products.index') }}" class="hover:underline">🛒 Mes Produits</a>
        </nav>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white shadow-md rounded-lg p-4">
            <h2 class="text-lg font-semibold text-purple-500 mb-3">📍 Places Réservées</h2>
            @if($places->isEmpty())
                <p class="text-gray-500">Aucune place réservée.</p>
            @else
                <ul class="list-disc list-inside text-gray-700">
                    @foreach($places as $place)
                        <li><span class="font-semibold">{{ $place->nom }}</span> - {{ $place->surface }} m²</li>
                    @endforeach
                </ul>
            @endif
        </div>

    
        <div class="bg-white shadow-md rounded-lg p-4">
            <h2 class="text-lg font-semibold text-purple-500 mb-3">📦 Commandes en Cours</h2>
            @if($orders->isEmpty())
                <p class="text-gray-500">Aucune commande en cours.</p>
            @else
                <ul class="list-disc list-inside text-gray-700">
                    @foreach($orders as $order)
                        <li>#{{ $order->id }} - <span class="text-blue-500">{{ $order->statut }}</span></li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="bg-white shadow-md rounded-lg p-4">
            <h2 class="text-lg font-semibold text-purple-500 mb-3">🛠️ Équipements Loués</h2>
            @if($equipments->isEmpty())
                <p class="text-gray-500">Aucun équipement loué.</p>
            @else
                <ul class="list-disc list-inside text-gray-700">
                    @foreach($equipments as $equipment)
                        <li>{{ $equipment->nom }} - <span class="text-red-500">Jusqu'au {{ $equipment->date_fin }}</span></li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
@endsection
