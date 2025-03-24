@extends('layouts.app')

@section('title') Images @endsection

@section('content')
@if(session('message'))
    <div class="alert alert-success" role="alert">{{ session('message') }}</div>
@endif
<x-display-index>
    <x-slot name="title">Liste des images</x-slot>
    <x-slot name="content">
        <div class="row">
            @can('create', App\Models\Image::class)
                <div class="col-3">
                    <button type="button" class="btn btn-primary p-1 font-semibold" data-bs-toggle="modal" data-bs-target="#createModal">Rensigner une image</button>
                </div>
                <x-bootstrap.createModal>
                    <x-slot:id>createModal</x-slot>
                    <x-slot:title>Renseigner une image</x-slot>
                    <x-slot:slot>
                        <div class="row">
                            <form action="{{route('images_model.store')}}" method="post">
                                @csrf
                                <div class="mb-3 row">
                                    <div class="row"><label for="description" class="form-label">Description : </label></div>
                                    <div class="row"><input type="text" name="description" id="description" required class="form-control @error('description') is-invalid @enderror" placeholder="Saisir la description de l'image'" autofocus></div>
                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <div class="row"><label for="url" class="form-label">URL : </label></div>
                                    <div class="row"><input type="text" name="url" id="url" required class="form-control @error('url') is-invalid @enderror" placeholder="Saisir l'URL de l'image'" autofocus></div>
                                    @error('url')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <button type="submit" class="btn btn-success btn-sm">Confirmer</button>
                                    </div>
                                    <div class="col-2">
                                        <span class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Annuler</span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </x-slot>
                </x-bootstrap>
            @endcan
        </div>
        <div class="row m-1">
            @foreach($images as $image)
                <div class="card m-1" style="width: 18rem;">
                    <img src="{{$image->url}}" class="card-img-top" alt="{{$image->description}}">
                    <div class="card-body">
                        <h5 class="card-title">{{$image->description}}</h5>
                        <p class="card-text">URL : {{$image->url}}</p>
                        @can('update', $image)
                            <button type="button" class="btn btn-sm btn-outline-primary mb-1" data-bs-toggle="modal" data-bs-target="#editModal_{{$image->id}}"><i class="bi bi-pencil-square"></i></button>
                        @endcan
                        @can('delete', $image)
                            <button type="button" class="btn btn-sm btn-outline-dark mb-1" data-bs-toggle="modal" data-bs-target="#deleteModal_{{$image->id}}"><i class="bi bi-trash"></i></button>
                        @endcan
                    </div>
                </div>
                <x-bootstrap.editModal>
                    <x-slot:id>editModal_{{$image->id}}</x-slot>
                    <x-slot:title>Edition de l'image {{$image->url}}</x-slot>
                    <x-slot:slot>
                        <div class="row">
                            <form action="{{route('images_model.update', $image->id)}}" method="post">
                                @csrf
                                @method('put')
                                <div class="mb-3 row">
                                    <div class="row"><label for="description" class="form-label">Description : </label></div>
                                    <div class="row"><input type="text" name="description" id="description" required class="form-control @error('description') is-invalid @enderror" placeholder="Saisir la description de l'image'" value="{{ old('description', $image->description ?? '') }}" autofocus></div>
                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <div class="row"><label for="url" class="form-label">URL : </label></div>
                                    <div class="row"><input type="text" name="url" id="url" required class="form-control @error('url') is-invalid @enderror" placeholder="Saisir l'URL de l'image'" value="{{ old('url', $image->url ?? '') }}" autofocus></div>
                                    @error('url')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <button type="submit" class="btn btn-success btn-sm">Confirmer</button>
                                    </div>
                                    <div class="col-2">
                                        <span class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Annuler</span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </x-slot>
                </x-bootstrap>
                <x-bootstrap.deleteModal>
                    <x-slot:id>deleteModal_{{$image->id}}</x-slot>
                    <x-slot:title>Voulez-vous supprimer l'image {{$image->url}} ?</x-slot>
                    <x-slot:slot>
                        <div class="row">
                            <div class="col-1">
                                <form action="{{route('images_model.destroy', $image->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-primary mb-1">Oui</button>
                                </form>
                            </div>
                            <div class="col-1">
                                <button class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Non</button>
                            </div>
                        </div>
                    </x-slot>
                </x-bootstrap>
            @endforeach
        </div>
    </x-slot>
</x-display-index>
@endsection