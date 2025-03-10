@extends('layouts.app')

@section('title') Editer un Secteur @endsection

@section('content')
    @if($errors->any() == true)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <x-display-index>
        <x-slot name="title">Editer un secteur</x-slot>
        <x-slot name="content">
            <x-sector-form routeRetour="{{route('buildings.index')}}" routeValider="{{route('sectors.update', $sector)}}" :sector=$sector :buildings=$buildings></x-sector-form>
        </x-slot>
    </x-display-index>
@endsection

@push('scripts')
    @if(old('buildings') != null)
        <script type="module">
            document.addEventListener("DOMContentLoaded", () => {
            @foreach(old('buildings') as $building)
                sectors.add({{$building}});
            @endforeach
                });
        </script>
    @else
        <script type="module">
            document.addEventListener("DOMContentLoaded", () => {
            @foreach($sector->buildings as $building)
                sectors.add({{$building->id}});
            @endforeach
            });
        </script>
    @endif
@endpush