@extends('layouts.app')

@section('title') Editer un Bâtiment @endsection

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
        <x-slot name="title">Editer un bâtiment</x-slot>
        <x-slot name="content">
            <x-building-form routeRetour="{{route('buildings.index')}}" routeValider="{{route('buildings.update', $building)}}" :sectors=$sectors :types=$types :building=$building></x-building-form>
        </x-slot>
    </x-display-index>
@endsection