@extends('layouts.app')

@section('title', 'Liste des Bâtiments')

@section('content')
<div class="max-w-4xl mx-auto bg-gray-900 text-white p-6 rounded-lg shadow-lg">
    <h1 class="text-3xl font-semibold text-purple-500 mb-6">Liste des Bâtiments</h1>

    
    <div class="mb-4">
        <a href="{{ route('buildings.create') }}" 
           class="bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-md font-semibold 
                  transition duration-200 ease-in-out inline-block">
            + Ajouter un bâtiment
        </a>
    </div>

    
    <div class="space-y-4">
        @foreach ($buildings as $building)
            <div class="bg-gray-800 p-5 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold text-purple-400">{{ $building->name }}</h2>
                <p class="text-gray-300">Type : <span class="text-purple-300">{{ $building->type->name }}</span></p>
                <p class="text-gray-300">Secteur : <span class="text-purple-300">{{ $building->sector->name }}</span></p>
                <p class="text-gray-300">Places disponibles : 
                    <span class="text-purple-300">{{ $building->places->count() }}</span>
                </p>

                <div class="mt-4 flex space-x-2">
                    <a href="{{ route('buildings.show', $building->id) }}" 
                       class="bg-blue-600 hover:bg-blue-700 text-white py-1 px-3 rounded-md font-semibold 
                              transition duration-200 ease-in-out">
                        Voir
                    </a>
                    <a href="{{ route('buildings.edit', $building->id) }}" 
                       class="bg-yellow-600 hover:bg-yellow-700 text-white py-1 px-3 rounded-md font-semibold 
                              transition duration-200 ease-in-out">
                        Modifier
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
