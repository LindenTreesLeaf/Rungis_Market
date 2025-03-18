<form action="{{$routeValider}}" method="post">
    @csrf
    @isset($bundle)
        @method('put')
    @endisset
    <div class="mb-3 row">
        <div class="col-3"><label for="product" class="form-label">Produit vendu :</label></div>
        <div class="col-9"><input type="text" name="product" id="product" required class="form-control @error('product') is-invalid @enderror" placeholder="Saisir le nom du produit" value="{{ old('product', $bundle->product ?? '') }}" autofocus></div>
        @error('product')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3 row">
        <div class="col-3"><label for="quantity" class="form-label">Quantité :</label></div>
        <div class="col-9"><input type="number" name="quantity" id="quantity" required class="form-control @error('quantity') is-invalid @enderror" placeholder="Saisir la quantité vendue" value="{{ old('quantity', $bundle->quantity ?? '') }}"></div>
        @error('quantity')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3 row">
        <div class="col-3"><label for="unit_id" class="form-label">Unité :</label></div>
        <div class="col-9">
            <select class="form-control" id="select_unit" name="unit_id">
                <option value="-1">Sélectionnez une unité</option>
                @foreach($units as $unit)
                    <option value="{{$unit->id}}" @if(isset($bundle) && $bundle->unit_id == $unit->id) selected @endif>{{$unit->name_u}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col-3"><label for="price" class="form-label">Prix :</label></div>
        <div class="col-9"><input type="number" name="price" id="price" required class="form-control @error('quantity') is-invalid @enderror" placeholder="Saisir le prix du produit" value="{{ old('price', $bundle->price ?? '') }}"></div>
        @error('price')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3 row">
        <div class="col-3"><label for="sector_id" class="form-label">Secteur :</label></div>
        <div class="col-9">
            <select class="form-control" id="select_sector" name="sector_id">
                <option value="-1">Sélectionnez un secteur de vente</option>
                @foreach($sectors as $sector)
                    <option value="{{$sector->id}}" @if(isset($bundle) && $bundle->sector_id == $sector->id) selected @endif>{{$sector->name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <div class="row">Le produit est-il prêt à la vente ?</div>
        <div class="row">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="validated" id="validatedYes" value="1" @if(!isset($bundle) || (isset($bundle) && $bundle->validated == 1)) checked @endif>
                <label class="form-check-label" for="validatedYes">Oui</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="validated" id="validatedNo" value="0" @if(isset($bundle) && $bundle->validated == 0) checked @endif>
                <label class="form-check-label" for="validatedNo">Non</label>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-success p-1">Confirmer</button>
    <a href="{{$routeRetour}}" class="btn btn-danger p-1">Annuler</a>
</form>