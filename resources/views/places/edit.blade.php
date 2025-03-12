@extends('layouts.app')

@section('title', 'Editer une Place')

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
        <x-slot name="title">Renseigner une Place</x-slot>
        <x-slot name="content">
            <x-place-form routeRetour="{{route('buildings.show', $place->building)}}" routeValider="{{route('places.update', $place)}}" :place=$place :sellers=$sellers></x-place-form>
        </x-slot>
    </x-display-index>
@endsection
