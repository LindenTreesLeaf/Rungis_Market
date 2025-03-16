@extends('layouts.app')

@section('title') Ajouter un produit @endsection

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
        <x-slot name="title">Ajouter un produit</x-slot>
        <x-slot name="content">
            <x-bundle-form routeRetour="{{route('bundles.show', Auth::user()->id)}}" routeValider="{{route('bundles.store')}}" :sectors=$sectors></x-bundle-form>
        </x-slot>
    </x-display-index>
@endsection
