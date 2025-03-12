@extends('layouts.app')

@section('title', 'Liste des Places')

@section('content')
<x-display-index>
    <x-slot name="title">Liste des Places</x-slot>
    <x-slot name="content">
        @if($places->isEmpty())
            <p class="mt-4 text-gray-500">Aucune place disponible pour le moment.</p>
        @else
            <div class="mt-4 overflow-x-auto bg-white shadow rounded-lg">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Numéro</th>
                            <th scope="col">Bâtiment</th>
                            <th scope="col">Fin de réservation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($places as $place)
                            <tr>
                                <td scope="row">{{ $place->name }}</td>
                                <td>{{ $place->building->name }}</td>
                                <td class="py-3 px-4 border-b text-sm text-gray-700">
                                    <a href="{{ route('places.edit', $place->id) }}" class="text-indigo-600 hover:text-indigo-700">Modifier</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </x-slot>
</x-display-index>
@endsection
