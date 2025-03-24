@extends('layouts.app')

@section('title', 'Détails des ventes')

@section('content')
@if ($errors->any())
    <div class="alert alert-success" role="alert">
        <strong>Erreur(s) dans le formulaire :</strong>
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session('message'))
    <div class="alert alert-success" role="alert">{{ session('message') }}</div>
@endif
<x-display-index>
    <x-slot name="title">Vos produits</x-slot>
    <x-slot name="content">

        <a href="{{ route('bundles.create') }}" class="btn btn-primary my-1">+ Créer un Bundle</a>

        @if($bundles->count() == 0)
            <p class="mt-4">Vous n'avez pas encore créé de lots.</p>
        @else
            @foreach ($bundles as $bundle)
                <div class="contentdisplay my-2">
                    <span class="font-semibold fs-4 textcolorhighlight">
                        {{ $bundle->product }}
                        @can('update', $bundle)
                            <a href="{{route('bundles.edit', $bundle->id)}}" class="btn btn-sm btn-outline-primary mb-1"><i class="bi bi-pencil-square"></i></a>
                        @endcan
                        @if($bundle->isSold())
                            <span class="badge text-bg-primary">Vendu</span>
                        @endif
                    </span>
                    <p><strong class="textcolorinfo">Quantité :</strong> {{ $bundle->quantity }} {{ $bundle->unit->name_u }}</p>
                    <p><strong class="textcolorinfo">Prix :</strong> {{ $bundle->price }}€</p>
                    @if($bundle->validated == True)
                        <div class="row">
                            <div class="col"><strong class="textcolorinfo">En vente</strong></div>
                            <div class="col-3 justify-content-end"><a href="{{ route('bundle.sell', $bundle->id) }}" class="btn btn-sm btn-outline-dark my-1">Retirer de la vente</a></div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col"><strong class="textcolorinfo">Non vendu</strong></div>
                            <div class="col-3 justify-content-end"><a href="{{ route('bundle.sell', $bundle->id) }}" class="btn btn-sm btn-outline-dark my-1">Mettre en vente</a></div>
                        </div>
                    @endif
                    <p><strong class="textcolorinfo">Secteur :</strong> {{ $bundle->sector->name }}</p>
                    @can('delete', $bundle)
                        <button type="button" class="btn btn-sm btn-outline-dark mb-1" data-bs-toggle="modal" data-bs-target="#deleteModal_{{$bundle->id}}">Supprimer</button>
                    @endcan
                    <x-bootstrap.deleteModal>
                        <x-slot:id>deleteModal_{{$bundle->id}}</x-slot>
                        <x-slot:title>Voulez-vous supprimer le lot "{{$bundle->product}}" ?</x-slot>
                        <x-slot:slot>
                            <div class="row">
                                <div class="col-1">
                                    <form action="{{route('bundles.destroy', $bundle->id)}}" method="post">
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
                </div>
            @endforeach
        @endif
    </x-slot>
</x-display-index>
@endsection
