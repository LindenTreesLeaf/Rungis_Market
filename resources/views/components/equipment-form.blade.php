<form action="{{$routeValider}}" method="post">
    @csrf
    @isset($equipment)
        @method('put')
    @endisset

    <div class="mb-3 row">
        <div class="col-3"><label for="name" class="form-label">Nom de l'équipement :</label></div>
        <div class="col-9"><input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Saisir le nom de l'équipement" value="{{ old('name', $equipment->name ?? '') }}" autofocus></div>
        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3 row">
        <label for="building_id" class="form-label">Bâtiment : </label>
        <select name="building_id" id="building_id" class="form-select @error('building_id') is-invalid @enderror">
            @if(isset($building))
                <option value="{{ $building->id }}">{{ $building->name }}</option>
            @else
                <option value="{{ $equipment->building->id }}">{{ $equipment->building->name }}</option>
            @endif
        </select>
    </div>

    <div class="mb-3 row">
        <label for="condition_id" class="form-label">Condition : </label>
        <select name="condition_id" id="condition_id" class="form-select @error('condition_id') is-invalid @enderror">
            @foreach($conditions as $condition)
                <option value="{{ $condition->id }}">{{ $condition->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3 row">
        <div class="col-3"><label for="last_revision" class="form-label">Dernière révision :</label></div>
        <div class="col-9"><input type="date" id="last_revision" name="last_revision" class="form-control @error('last_revision') is-invalid @enderror" value="{{ old('last_revision', $equipment->last_revision ?? date('Y-m-d')) }}" @if(!isset($equipment)) readonly @endif></div>
        @error('last_revision')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3 row">
        <div class="col-3"><label for="next_revision" class="form-label">Prochaine révision :</label></div>
        <div class="col-9"><input type="date" id="next_revision" name="next_revision" class="form-control @error('next_revision') is-invalid @enderror" value="{{ old('next_revision', $equipment->next_revision ?? date('Y-m-d', mktime(0,0,0,date('m')+1,date('d')+5,date('Y')))) }}"></div>
        @error('next_revision')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-success p-1">Confirmer</button>
    <a href="{{$routeRetour}}" class="btn btn-danger p-1">Annuler</a>
</form>