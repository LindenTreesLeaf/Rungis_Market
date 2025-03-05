@extends('layouts.app')

@section('title', 'Détails du Bâtiment')

@section('content')
<div class="max-w-4xl mx-auto bg-gray-900 text-white p-6 rounded-lg shadow-lg">
    <h1 class="text-3xl font-semibold text-purple-500">{{ $building->name }}</h1>
    
    <div class="mt-4 space-y-2">
        <p><strong class="text-purple-300">Type :</strong> {{ $building->type->name }}</p>
        <p><strong class="text-purple-300">Secteur :</strong> {{ $building->sector->name }}</p>
        <p><strong class="text-purple-300">Nombre de places disponibles :</strong> {{ $building->places->count() }}</p>
    </div>

    
    <h2 class="text-2xl font-semibold text-purple-400 mt-6">Équipements</h2>
    @if ($building->equipments->isEmpty())
        <p class="text-gray-400 mt-2">Aucun équipement disponible.</p>
    @else
        <ul class="mt-2 space-y-2">
            @foreach ($building->equipments as $equipment)
                <li class="bg-gray-800 p-3 rounded-md shadow-md">
                    <span class="text-purple-300 font-semibold">{{ $equipment->name }}</span>
                    <span class="text-gray-400">(Dernière révision : {{ $equipment->last_revision }})</span>
                </li>
            @endforeach
        </ul>
    @endif

    
    <div class="mt-6">
        <a href="{{ route('buildings.index') }}" 
           class="bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-md font-semibold 
                  transition duration-200 ease-in-out inline-block">
            ← Retour à la liste
        </a>
    </div>
</div>
@endsection
