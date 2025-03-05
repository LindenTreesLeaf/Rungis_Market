@extends('layouts.app')

@section('title', 'Modifier l\'Équipement')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-semibold text-gray-800">Modifier l'Équipement - {{ $equipment->name }}</h1>
    
   
    <form action="{{ route('equipment.update', $equipment->id) }}" method="POST">
        @csrf
        @method('PUT')

       
        <div class="mt-4">
            <label for="name" class="block text-sm font-semibold text-gray-700">Nom de l'équipement</label>
            <input type="text" id="name" name="name" value="{{ old('name', $equipment->name) }}" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
        </div>

       
        <div class="mt-4">
            <label for="last_revision" class="block text-sm font-semibold text-gray-700">Dernière révision</label>
            <input type="date" id="last_revision" name="last_revision" value="{{ old('last_revision', $equipment->last_revision) }}" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
        </div>

        
        <div class="mt-4">
            <label for="next_revision" class="block text-sm font-semibold text-gray-700">Prochaine révision</label>
            <input type="date" id="next_revision" name="next_revision" value="{{ old('next_revision', $equipment->next_revision) }}" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
        </div>

        
        <div class="mt-4">
            <label for="building_id" class="block text-sm font-semibold text-gray-700">Bâtiment</label>
            <select name="building_id" id="building_id" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                @foreach($buildings as $building)
                    <option value="{{ $building->id }}" {{ old('building_id', $equipment->building_id) == $building->id ? 'selected' : '' }}>
                        {{ $building->name }}
                    </option>
                @endforeach
            </select>
        </div>

        
        <div class="mt-4">
            <label for="condition_id" class="block text-sm font-semibold text-gray-700">État de l'équipement</label>
            <select name="condition_id" id="condition_id" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                @foreach($conditions as $condition)
                    <option value="{{ $condition->id }}" {{ old('condition_id', $equipment->condition_id) == $condition->id ? 'selected' : '' }}>
                        {{ $condition->name }}
                    </option>
                @endforeach
            </select>
        </div>

        
        <div class="mt-4 flex items-center space-x-4">
            <label class="text-sm font-semibold text-gray-700">Rendre l'équipement disponible ?</label>
            <input type="checkbox" name="is_available" id="is_available" class="h-5 w-5 text-indigo-600 focus:ring-indigo-500" {{ old('is_available', $equipment->is_available) ? 'checked' : '' }}>
        </div>

        
        <div class="mt-6 flex justify-between">
            <a href="{{ route('equipment.index') }}" class="text-sm text-gray-600 hover:text-gray-800">Retourner à la liste des équipements</a>
            <button type="submit" class="px-6 py-2 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Sauvegarder les modifications</button>
        </div>
    </form>
</div>
@endsection
