@extends('layouts.app')

@section('title') Détail de l'Equipement @endsection

@section('content')
<x-display-index>
    <x-slot name='title'>{{ $equipment->name }}</x-slot>
    <x-slot name='content'>
        @if (session('message'))
            <div class="alert alert-success" role="alert">{{ session('message') }}</div>
        @endif
        <div class="row">
            <p><strong class="textcolorinfo">Bâtiment :</strong> {{ $equipment->building->name }}</p>
            <p><strong class="textcolorinfo">Dernière révision : </strong>{{date('d/m/Y', strtotime($equipment->last_revision))}}</p>
            <p><strong class="textcolorinfo">Prochaine révision : </strong>{{date('d/m/Y', strtotime($equipment->next_revision))}}</p>
            <p><strong class="textcolorinfo">Condition :</strong> {{ $equipment->condition->name }}
                @can('update', $equipment->condition)
                    <button type="button" class="btn btn-sm btn-outline-dark mb-1" data-bs-toggle="modal" data-bs-target="#editModal_{{$equipment->condition->id}}"><i class="bi bi-pencil-square"></i></button>
                @endcan
            </p>
        </div>
        <div class="row">
            <div class="col-1">
                <a href="{{ route('equipments.edit', $equipment->id) }}" class="btn btn-outline-warning p-1">Modifier</a>
            </div>
            <div class="col-1">
                <a href="{{ route('buildings.show', $equipment->building) }}" class="btn btn-outline-secondary p-1">Retour</a>
            </div>
        </div>
        <x-bootstrap.editModal>
            <x-slot:id>editModal_{{$equipment->condition->id}}</x-slot>
            <x-slot:title>Edition de la condition {{$equipment->condition->name}}</x-slot>
            <x-slot:slot>
                <div class="row">
                    <form action="{{route('conditions.update', $equipment->condition->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="mb-3 row">
                            <div class="row"><label for="name" class="form-label">Nom de la condition :</label></div>
                            <div class="row"><input type="text" name="name" id="name" required class="form-control @error('name') is-invalid @enderror" placeholder="Saisir le nom de la condition" value="{{ old('name', $equipment->condition->name ?? '') }}" autofocus></div>
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
    </x-slot>
</x-display-index>
@endsection
