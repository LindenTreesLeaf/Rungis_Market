<form action="{{route('places.update', $place->id)}}" method="post">
    @csrf
    @method('put')
    <div class="mb-3 row">
        <div class="row"><label for="name" class="form-label">Nom de la place :</label></div>
        <div class="row"><input type="text" name="name" id="name" required class="form-control @error('name') is-invalid @enderror" placeholder="Saisir le nom de la place" value="{{ old('name', $place->name ?? '') }}" autofocus></div>
        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3 row">
        <label for="building_id" class="form-label">Bâtiment : </label>
        <select name="building_id" id="building_id" class="form-select @error('building_id') is-invalid @enderror">
            <option value="{{ $place->building->id }}">{{ $place->building->name }}</option>
        </select>
    </div>

    <div class="mb-3 row">
        <label for="user_id" class="form-label">Vendeur(euse) : </label>
        <select name="user_id" id="user_id" class="form-select @error('user_id') is-invalid @enderror">
            <option value="-1">Sélectionner un(e) vendeur(euse)</option>
            @foreach($sellers as $seller)
                <option value="{{ $seller->id }}">{{ $seller->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-success p-1">Confirmer</button>
    <a href="{{$routeRetour}}" class="btn btn-danger p-1">Annuler</a>
</form>