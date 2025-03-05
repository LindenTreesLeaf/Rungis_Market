@extends('layouts.app')

@section('title', 'Ajouter un Équipement')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-semibold text-gray-800">Ajouter un nouvel équipement</h1>

   
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6">
            <strong>Erreur(s) dans le formulaire :</strong>
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

   
    <form action="{{ route('equipment.store') }}" method="POST">
        @csrf

        
        <div class="mt-4">
            <label for="name" class="block text-sm font-semibold text-gray-700">Nom de l'équipement</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" class="mt-2 block w-full px-4 py-2 bg-gray-800 text-white border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
        </div>

        
        <div class="mt-4">
            <label for="building_id" class="block text-sm font-semibold text-gray-700">Bâtiment</label>
            <select name="building_id" id="building_id" class="mt-2 block w-full px-4 py-2 bg-gray-800 text-white border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                @foreach ($buildings as $building)
                    <option value="{{ $building->id }}" {{ old('building_id') == $building->id ? 'selected' : '' }}>{{ $building->name }}</option>
                @endforeach
            </select>
        </div>

       
        <div class="mt-4">
            <label for="last_revision" class="block text-sm font-semibold text-gray-700">Dernière révision</label>
            <input type="date" id="last_revision" name="last_revision" value="{{ old('last_revision') }}" class="mt-2 block w-full px-4 py-2 bg-gray-800 text-white border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
        </div>

        
        <div class="mt-4">
            <label for="description" class="block text-sm font-semibold text-gray-700">Description</label>
            <textarea name="description" id="description" rows="4" class="mt-2 block w-full px-4 py-2 bg-gray-800 text-white border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('description') }}</textarea>
        </div>

        
        <div class="mt-6 flex justify-end">
            <button type="submit" class="px-6 py-2 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Ajouter</button>
        </div>
    </form>
</div>
@endsection
