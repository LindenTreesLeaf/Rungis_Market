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

        <h2 class="text-2xl font-semibold textcolorhighlight mt-5">Équipements</h2>
        @if ($building->equipments->isEmpty())
            <p class="text-gray-400 mt-2">Aucun équipement disponible.</p>
        @else
            <ul class="mt-2">
                @foreach ($building->equipments as $equipment)
                    <li class="listdisplay">
                        <span class="textcolorinfo font-semibold">{{ $equipment->name }}</span>
                        <span class="text-gray-400">(Dernière révision : {{ $equipment->last_revision }})</span>
                    </li>
                @endforeach
            </ul>
        @endif

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
