@extends('layouts.app')

@section('title') Ajouter un Bâtiment @endsection

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
        <x-slot name="title">Renseigner un bâtiment</x-slot>
        <x-slot name="content">
            <x-building-form routeRetour="{{route('buildings.index')}}" routeValider="{{route('buildings.store')}}" :sectors=$sectors :types=$types></x-building-form>
        </x-slot>
    </x-display-index>
@endsection
