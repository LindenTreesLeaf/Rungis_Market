@extends('layouts.app')

@section('title', 'Liste des Places')

@section('content')
<x-display-index>
    <x-slot name="title">Liste de vos places réservées</x-slot>
    <x-slot name="content">
        @if($places->isEmpty())
            <p class="mt-4 text-gray-500">Aucune place réservée pour le moment.</p>
        @else
            <div class="mt-4 overflow-x-auto bg-white shadow rounded-lg">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"><span class="textcolorinfo">Numéro</span></th>
                            <th scope="col"><span class="textcolorinfo">Bâtiment</span></th>
                            <th scope="col"><span class="textcolorinfo">Fin de réservation</span></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($places as $place)
                            @if($place->reservation->end > date('Y-m-d', mktime(0,0,0,date('m')-1,date('d'),date('Y'))))
                                <tr>
                                    <td scope="row">{{ $place->name }}</td>
                                    <td>{{ $place->building->name }}</td>
                                    <td>{{ date('d/m/Y', strtotime($place->reservation->end)) }}</td>
                                    @if(!$place->reserved() && $place->reservation->end < date('Y-m-d'))
                                        <td><a href="{{route('place.reserve', $place->id)}}" class="btn btn-sm btn-outline-primary mb-1">Re-réserver</a></td>
                                    @endif
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </x-slot>
</x-display-index>
@endsection
