@push('head')
    @vite(['resources/js/sectors.js'])
@endpush
<form action="{{$routeValider}}" method="post">
    @csrf
    @isset($sector)
        @method('put')
    @endisset
    <div class="mb-3 row">
        <div class="col-3"><label for="name" class="form-label">Nom du secteur :</label></div>
        <div class="col-9"><input type="text" name="name" id="name" required class="form-control @error('name') is-invalid @enderror" placeholder="Saisir le nom du secteur" value="{{ old('name', $sector->name ?? '') }}" autofocus></div>
        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3 row">
        <div class="col-3"><label for="building_id" class="form-label">Bâtiments :</label></div>
        <div class="col-9">
            <select class="form-control" id="select_buildings" onchange="sectors.select()">
                <option value="-1">Sélectionnez un bâtiment</option>
                @foreach($buildings as $building)
                    <option value="{{$building->id}}">{{$building->name}}</option>
                @endforeach
            </select>
            <span id='buildingsList'></span>
        </div>
        @error('building_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-success p-1">Confirmer</button>
    <a href="{{$routeRetour}}" class="btn btn-danger p-1">Annuler</a>
</form>