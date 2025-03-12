@extends('layouts.app')

@section('title', 'Réserver une Place')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-center text-purple-600 text-3xl font-bold mb-6">Réserver une Place</h1>

    <form action="{{ route('places.reserve') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf

        
        <div class="mb-4">
            <label for="building_id" class="form-label text-purple-500">Choisir un Bâtiment</label>
            <select name="building_id" id="building_id" class="form-control border-gray-300 rounded-md w-full p-3 mt-1" required>
                <option value="" disabled selected>-- Sélectionner un Bâtiment --</option>
                @foreach($buildings as $building)
                    <option value="{{ $building->id }}">{{ $building->name }}</option>
                @endforeach
            </select>
        </div>

        
        <div class="mb-4">
            <label for="place_id" class="form-label text-purple-500">Choisir une Place</label>
            <select name="place_id" id="place_id" class="form-control border-gray-300 rounded-md w-full p-3 mt-1" required>
                <option value="" disabled selected>-- Sélectionner une Place --</option>
            </select>
        </div>

        
        <div class="mb-4">
            <label for="start_date" class="form-label text-purple-500">Date de Début</label>
            <input type="date" name="start_date" id="start_date" class="form-control border-gray-300 rounded-md w-full p-3 mt-1" required>
        </div>

        <div class="mb-4">
            <label for="end_date" class="form-label text-purple-500">Date de Fin</label>
            <input type="date" name="end_date" id="end_date" class="form-control border-gray-300 rounded-md w-full p-3 mt-1" required>
        </div>

        <div class="text-center">
            <button type="submit" class="bg-purple-600 text-white hover:bg-purple-700 px-6 py-2 rounded-lg transition duration-300">
                Réserver la Place
            </button>
        </div>
    </form>
</div>

@section('scripts')
<script>
    
    document.getElementById('building_id').addEventListener('change', function() {
        var buildingId = this.value;
        var placeSelect = document.getElementById('place_id');
        placeSelect.innerHTML = '<option value="" disabled selected>-- Sélectionner une Place --</option>';

        if (buildingId) {
            fetch(`/places/${buildingId}/available`)
                .then(response => response.json())
                .then(data => {
                    data.places.forEach(function(place) {
                        var option = document.createElement('option');
                        option.value = place.id;
                        option.textContent = place.name;
                        placeSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Erreur:', error));
        }
    });
</script>
@endsection
@endsection
