@extends('layouts.app')

@section('title', 'Détails de l\'Équipement')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-semibold text-gray-800 mb-4">{{ $equipment->name }}</h1>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <p class="text-lg text-gray-600 mb-2"><strong>Bâtiment :</strong> {{ $equipment->building->name }}</p>
        <p class="text-lg text-gray-600 mb-2"><strong>Dernière révision :</strong> {{ $equipment->last_revision }}</p>
        <p class="text-lg text-gray-600 mb-4"><strong>Description :</strong> {{ $equipment->description }}</p>

        <div class="flex space-x-4">
            
            <a href="{{ route('equipment.index') }}" class="px-6 py-2 bg-gray-600 text-white font-semibold rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500">Retour</a>

           
            <a href="{{ route('equipment.edit', $equipment->id) }}" class="px-6 py-2 bg-yellow-600 text-white font-semibold rounded-lg hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500">Modifier</a>
        </div>
    </div>
</div>
@endsection
