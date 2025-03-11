@extends('layouts.app')

@section('title') Batiments @endsection

@section('content')
<x-display-index>
    <x-slot name="title">Liste des Bâtiments</x-slot>
    <x-slot name="content">
        @if(Auth::user()->hasRole('admin'))
            <div class="row">
                <div class="mb-4">
                    <a href="{{ route('buildings.create') }}" class="btn btn-primary p-2 font-semibold">
                        + Ajouter un bâtiment
                    </a>
                </div>
            </div>
        @endif

        <div>
            @foreach($sectors as $sector)
                <div class="card mb-2">
                    <div class="card-title fs-3 px-1 cardtitlefullborder">
                        {{$sector->name}}
                        <a href="{{route('sectors.edit', $sector)}}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"></i></a>
                    </div>
                    <div class="card-body">
                        @foreach($buildings as $building)
                            @if($building->sector == $sector)
                                <div class="row">
                                    <div class="contentdisplay mb-2">
                                        <h2 class="text-xl font-semibold">{{ $building->name }}</h2>
                                        <p class="text-body-secondary">Type :
                                            <span class="textcolorinfo">{{ $building->type->name }}</span>
                                            @can('update', $building->type)
                                                <button type="button" class="btn btn-sm btn-outline-dark mb-1" data-bs-toggle="modal" data-bs-target="#editModal_{{$building->type->id}}"><i class="bi bi-pencil-square"></i></button>
                                            @endcan
                                        </p>
                                        @can('view', $building)
                                            <p class="text-body-secondary">Places disponibles : 
                                                <span class="textcolorinfo">{{ $building->places->count() }}</span>
                                            </p>
                                        @endcan

                                        <div class="mt-4 flex space-x-2">
                                            <a href="{{ route('buildings.show', $building->id) }}" class="btn btn-outline-success p-1">
                                                Détail
                                            </a>
                                            <a href="{{ route('buildings.edit', $building->id) }}" class="btn btn-outline-warning p-1">
                                                Modifier
                                            </a>
                                            @can('delete', $building)
                                                <button type="button" class="btn btn-sm btn-outline-dark mb-1" data-bs-toggle="modal" data-bs-target="#deleteModal_{{$building->id}}">Supprimer</button>
                                            @endcan
                                        </div>
                                    </div>
                                </div>
                                <x-bootstrap.deleteModal>
                                    <x-slot:id>deleteModal_{{$building->id}}</x-slot>
                                    <x-slot:title>Voulez-vous supprimer le bâtiment {{$building->name}} ?</x-slot>
                                    <x-slot:slot>
                                        <div class="row">
                                            <div class="col-1">
                                                <form action="{{route('buildings.destroy', $building->id)}}" method="post">
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
                                <x-bootstrap.editModal>
                                    <x-slot:id>editModal_{{$building->type->id}}</x-slot>
                                    <x-slot:title>Edition du type {{$building->type->name}}</x-slot>
                                    <x-slot:slot>
                                        <div class="row">
                                            <form action="{{route('types.update', $building->type->id)}}" method="post">
                                                @csrf
                                                @method('put')
                                                <div class="mb-3 row">
                                                    <div class="row"><label for="name" class="form-label">Nom du type :</label></div>
                                                    <div class="row"><input type="text" name="name" id="name" required class="form-control @error('name') is-invalid @enderror" placeholder="Saisir le nom du type" value="{{ old('name', $building->type->name ?? '') }}" autofocus></div>
                                                    @error('name')
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
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </x-slot>
</x-display-index>
@endsection
