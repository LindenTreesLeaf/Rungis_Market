@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Gérer la Disponibilité des Équipements</h2>

    <!-- Formulaire pour sélectionner le bâtiment et la place -->
    <form action="{{ route('equipments.updateStatus', $equipment->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <!-- Sélectionner un bâtiment -->
        <div class="mb-6">
            <label for="building" class="block text-sm font-medium text-gray-700">Choisir un Bâtiment</label>
            <select name="building" id="building" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" required>
                <option value="">Sélectionner un Bâtiment</option>
                @foreach($buildings as $building)
                    <option value="{{ $building->id }}">{{ $building->name }}</option>
                @endforeach
            </select>
        </div>

      
        <div class="mb-6">
            <label for="place" class="block text-sm font-medium text-gray-700">Choisir une Place</label>
            <select name="place" id="place" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" required>
                <option value="">Sélectionner une Place</option>
                @foreach($places as $place)
                    <option value="{{ $place->id }}">{{ $place->name }}</option>
                @endforeach
            </select>
        </div>

       
        <div class="mb-6">
            <label for="status" class="block text-sm font-medium text-gray-700">Statut de l'Équipement</label>
            <select name="status" id="status" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" required>
                <option value="available">Disponible</option>
                <option value="unavailable">Indisponible</option>
            </select>
        </div>

        
        <button type="submit" class="w-full bg-purple-600 text-white hover:bg-purple-700 px-6 py-3 rounded-lg mt-4 focus:outline-none focus:ring-2 focus:ring-purple-500">
            Mettre à jour le statut
        </button>
    </form>
</div>
@endsection
