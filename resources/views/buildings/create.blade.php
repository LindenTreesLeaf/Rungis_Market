@extends('layouts.app')

@section('title', 'Ajouter un Bâtiment')

@section('content')
<div class="max-w-4xl mx-auto bg-gray-900 text-white p-6 rounded-lg shadow-lg">
    <h1 class="text-3xl font-semibold text-purple-500 mb-6 text-center">Ajouter un Bâtiment</h1>

    <form action="{{ route('buildings.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-300">Nom du bâtiment :</label>
            <input type="text" name="name" required class="w-full p-3 bg-gray-800 text-white border border-gray-700 rounded-md focus:ring-2 focus:ring-purple-500 focus:outline-none">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-300">Type :</label>
            <select name="type_id" required class="w-full p-3 bg-gray-800 text-white border border-gray-700 rounded-md">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-300">Secteur :</label>
            <select name="sector_id" required class="w-full p-3 bg-gray-800 text-white border border-gray-700 rounded-md">
                @foreach ($sectors as $sector)
                    <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-300">Nombre de places :</label>
            <input type="number" name="nb_places" min="1" required class="w-full p-3 bg-gray-800 text-white border border-gray-700 rounded-md">
        </div>

        <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-md font-medium">Ajouter</button>
    </form>
</div>
@endsection
