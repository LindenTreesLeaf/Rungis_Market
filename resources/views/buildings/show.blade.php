@extends('layouts.app')

@section('title') Détails du Bâtiment {{ $building->name }} @endsection

@section('content')
<x-display-index>
    <x-slot name="title">{{ $building->name }}</x-slot>
    <x-slot name="content">
        <div class="mt-4">
            <p><strong class="textcolorinfo">Type :</strong> {{ $building->type->name }}</p>
            <p><strong class="textcolorinfo">Secteur :</strong> {{ $building->sector->name }}</p>
            <p><strong class="textcolorinfo">Nombre de places disponibles :</strong> {{ $building->places->count() }}</p>
        </div>

        @can('viewAny', App\Models\Equipment::class)
            <h2 class="text-2xl font-semibold textcolorhighlight mt-5">Équipements</h2>
            @can('create', App\Models\Equipment::class)
                <a href="{{ route('equipments.create', $building->id) }}" class="btn btn-primary p-1 font-semibold">
                    + Ajouter un équipement
                </a>
            @endcan
            @if ($building->equipments->isEmpty())
                <p class="text-gray-400 mt-2">Aucun équipement disponible.</p>
            @else
                <ul class="mt-2">
                    @foreach ($building->equipments as $equipment)
                        <li class="listdisplay">
                            <div class="row">
                                <div class="col-10">
                                    <div class="row">
                                        @can('view', $equipment)
                                            <a href="{{route('equipments.show', $equipment->id)}}"><span class="textcolorinfo font-semibold">{{ $equipment->name }}</span></a>
                                        @elsecan
                                            <span class="textcolorinfo font-semibold">{{ $equipment->name }}</span>
                                        @endcan
                                    </div>
                                    <div class="row">
                                        <span><strong class="textcolorinfo font-semibold">Prochaine révision : </strong>{{date('d/m/Y', strtotime($equipment->next_revision))}}</span>
                                    </div>
                                </div>
                                <div class="col-2">
                                    @can('delete', $equipment)
                                        <button type="button" class="btn btn-sm btn-outline-dark mb-1" data-bs-toggle="modal" data-bs-target="#deleteModal_{{$equipment->id}}">Supprimer</button>
                                    @endcan
                                </div>
                            </div>
                            <x-bootstrap.deleteModal>
                                <x-slot:id>deleteModal_{{$equipment->id}}</x-slot>
                                <x-slot:title>Voulez-vous supprimer {{$equipment->name}} ?</x-slot>
                                <x-slot:slot>
                                    <div class="row">
                                        <div class="col-1">
                                            <form action="{{route('equipments.destroy', $equipment->id)}}" method="post">
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
                        </li>
                    @endforeach
                </ul>
            @endif
        @endcan

        <h2 class="text-2xl font-semibold textcolorhighlight mt-5">Places</h2>
        @if ($building->places->isEmpty())
            <p class="text-gray-400 mt-2">Aucune place disponible.</p>
        @else
            <ul class="mt-2">
                @foreach ($building->places as $place)
                    <li class="listdisplay">
                        <span class="textcolorinfo font-semibold">{{ $place->name }}</span>
                    </li>
                @endforeach
            </ul>
        @endif

        <div>
            <a href="{{ route('buildings.index') }}" class="btn btn-outline-secondary p-1">Retour</a>
        </div>
    </x-slot>
</x-display-index>
@endsection
