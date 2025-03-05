@extends('layouts.app')

@section('title', 'Liste des Places')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-semibold text-gray-800">Liste des Places</h1>

    
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif

    
    @if($places->isEmpty())
        <p class="mt-4 text-gray-500">Aucune place disponible pour le moment.</p>
    @else
        <div class="mt-4 overflow-x-auto bg-white shadow rounded-lg">
            <table class="w-full table-auto">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-700">Nom</th>
                        <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-700">Utilisateur</th>
                        <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-700">Bâtiment</th>
                        <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($places as $place)
                        <tr>
                            <td class="py-3 px-4 border-b text-sm text-gray-700">{{ $place->name }}</td>
                            <td class="py-3 px-4 border-b text-sm text-gray-700">{{ $place->user->name }}</td>
                            <td class="py-3 px-4 border-b text-sm text-gray-700">{{ $place->building->name }}</td>
                            <td class="py-3 px-4 border-b text-sm text-gray-700">
                                <a href="{{ route('places.edit', $place->id) }}" class="text-indigo-600 hover:text-indigo-700">Modifier</a>
                                <form action="{{ route('places.destroy', $place->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 ml-4">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
