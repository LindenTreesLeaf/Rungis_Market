<form action="{{$routeValider}}" method="post">
    @csrf
    @isset($building)
        @method('put')
    @endisset
    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Nom du bâtiment :</label>
        <input type="text" name="name" id="name" required class="form-control @error('name') is-invalid @enderror" placeholder="Saisir le nom du bâtiment" value="{{ old('name', $building->name ?? '') }}" autofocus>
        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3 row">
        <label for="type_id" class="col-sm-2 col-form-label">Type :</label>
        <div class="col-sm-10">
            <select class="form-control" id="select_type" name="type_id">
                <option value="-1">Sélectionnez un type</option>
                @foreach($types as $type)
                    <option value="{{$type->id}}" @if(isset($building) && $building->type_id == $type->id) selected @endif>{{$type->name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="sector_id" class="col-sm-2 col-form-label">Secteur</label>
        <div class="col-sm-10">
            <select class="form-control" id="select_sector" name="sector_id">
                <option value="-1">Sélectionnez un secteur</option>
                @foreach($sectors as $sector)
                    <option value="{{$sector->id}}" @if(isset($building) && $building->sector_id == $sector->id) selected @endif>{{$sector->name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <button type="submit" class="btn btn-success p-1">Confirmer</button>
    <a href="{{$routeRetour}}" class="btn btn-danger p-1">Annuler</a>
</form>