@extends('layouts.app')

@section('title') Ajouter un Equipement @endsection

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
        <x-slot name="title">Renseigner un équipement</x-slot>
        <x-slot name="content">
            <x-equipment-form routeRetour="{{route('buildings.show', $building)}}" routeValider="{{route('equipments.store')}}" :building=$building :conditions=$conditions></x-equipment-form>
        </x-slot>
    </x-display-index>
@endsection