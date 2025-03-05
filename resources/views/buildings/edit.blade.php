@extends('layouts.app')

@section('title', 'Modifier un Bâtiment')

@section('content')
<div class="max-w-2xl mx-auto bg-gray-900 text-white p-6 rounded-lg shadow-lg">
    <h1 class="text-3xl font-semibold text-purple-500 mb-6">Modifier le Bâtiment</h1>

    <form action="{{ route('buildings.update', $building->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        
        <div>
            <label for="name" class="block text-lg font-medium text-purple-400">Nom :</label>
            <input type="text" id="name" name="name" value="{{ $building->name }}" 
                   class="w-full p-3 bg-gray-800 text-white border border-gray-700 rounded-md 
                          focus:ring-2 focus:ring-purple-500 focus:outline-none transition duration-200 ease-in-out">
        </div>

        
        <div>
            <label for="type_id" class="block text-lg font-medium text-purple-400">Type :</label>
            <select id="type_id" name="type_id"
                    class="w-full p-3 bg-gray-800 text-white border border-gray-700 rounded-md focus:ring-2 focus:ring-purple-500">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ $building->type_id == $type->id ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>

        
        <div>
            <label for="sector_id" class="block text-lg font-medium text-purple-400">Secteur :</label>
            <select id="sector_id" name="sector_id"
                    class="w-full p-3 bg-gray-800 text-white border border-gray-700 rounded-md focus:ring-2 focus:ring-purple-500">
                @foreach ($sectors as $sector)
                    <option value="{{ $sector->id }}" {{ $building->sector_id == $sector->id ? 'selected' : '' }}>
                        {{ $sector->name }}
                    </option>
                @endforeach
            </select>
        </div>

       
        <div>
            <label for="nb_places" class="block text-lg font-medium text-purple-400">Nombre de Places :</label>
            <input type="number" id="nb_places" name="nb_places" value="{{ $building->places->count() }}" min="0"
                   class="w-full p-3 bg-gray-800 text-white border border-gray-700 rounded-md 
                          focus:ring-2 focus:ring-purple-500 focus:outline-none transition duration-200 ease-in-out">
        </div>

       
        <button type="submit" 
                class="w-full bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-md 
                       font-semibold text-lg transition duration-200 ease-in-out">
            Modifier
        </button>
    </form>
</div>
@endsection
