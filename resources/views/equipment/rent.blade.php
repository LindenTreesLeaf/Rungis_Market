@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-center text-purple-600 text-3xl font-bold mb-6">Louer un Équipement</h1>

   
    <div class="bg-white shadow-md rounded-lg p-4 mb-6">
        <form action="{{ route('equipments.rent') }}" method="GET">
            @csrf
            <div class="flex flex-wrap space-x-4">
                
                <div class="w-full sm:w-1/2">
                    <label for="building" class="text-purple-500">Choisir un Bâtiment</label>
                    <select id="building" name="building" class="w-full border border-gray-300 rounded-md p-2 mt-1">
                        <option value="">-- Sélectionner un Bâtiment --</option>
                        @foreach($buildings as $building)
                            <option value="{{ $building->id }}" {{ request('building') == $building->id ? 'selected' : '' }}>
                                {{ $building->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                
                <div class="w-full sm:w-1/2">
                    <label for="place" class="text-purple-500">Choisir une Place</label>
                    <select id="place" name="place" class="w-full border border-gray-300 rounded-md p-2 mt-1">
                        <option value="">-- Sélectionner une Place --</option>
                        @foreach($places as $place)
                            <option value="{{ $place->id }}" {{ request('place') == $place->id ? 'selected' : '' }}>
                                {{ $place->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mt-4 text-center">
                <button type="submit" class="text-white bg-purple-600 hover:bg-purple-700 px-4 py-2 rounded-lg">
                    Afficher les Équipements Disponibles
                </button>
            </div>
        </form>
    </div>

   
    @if(request('building') && request('place'))
        <div class="bg-white shadow-md rounded-lg p-4">
            <h2 class="text-lg font-semibold text-purple-500 mb-3">Équipements Disponibles</h2>

            @if($equipments->isEmpty())
                <p class="text-gray-500">Aucun équipement disponible pour cette combinaison.</p>
            @else
                <ul class="list-disc list-inside text-gray-700">
                    @foreach($equipments as $equipment)
                        <li>{{ $equipment->nom }} - <span class="text-green-500">{{ $equipment->disponibilite ? 'Disponible' : 'Indisponible' }}</span></li>
                    @endforeach
                </ul>
            @endif
        </div>
    @endif
</div>
@endsection
