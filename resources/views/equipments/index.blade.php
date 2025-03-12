@extends('layouts.app')

@section('title', 'Liste des Équipements')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Liste des Équipements</h1>

    
    <div class="mb-6">
        <a href="{{ route('equipment.create') }}" class="px-6 py-2 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Ajouter un équipement</a>
    </div>

 
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($equipment as $item)
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold text-gray-800">{{ $item->name }}</h2>
                <p class="text-gray-600 mt-2"><strong>Bâtiment :</strong> {{ $item->building->name }}</p>
                <p class="text-gray-600 mt-2"><strong>Dernière révision :</strong> {{ $item->last_revision }}</p>

                <div class="mt-4 flex space-x-4">
                    
                    <a href="{{ route('equipment.show', $item->id) }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Voir</a>

                    
                    <a href="{{ route('equipment.edit', $item->id) }}" class="px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500">Modifier</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
