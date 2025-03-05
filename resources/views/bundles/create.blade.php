@extends('layouts.app')

@section('title', 'Mes lots')

@section('content')
<div class="container">
    <h1 class="text-2xl text-purple-600">Mes lots</h1>
    <a href="{{ route('bundles.create') }}" class="btn bg-purple-600 text-white px-4 py-2 rounded">Créer un Bundle</a>

    @if($bundles->isEmpty())
        <p class="mt-4">Vous n'avez pas encore créé de lots.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
            @foreach ($bundles as $bundle)
                <div class="bg-gray-800 p-4 rounded-lg">
                    <h2 class="text-lg font-semibold text-white">Produit : {{ $bundle->product }}</h2>
                    <p class="text-sm text-gray-400">Quantité : {{ $bundle->quantity }} {{ $bundle->unit->name }}</p>
                    <p class="text-sm text-gray-400">Prix : {{ $bundle->price }}€</p>
                    <p class="text-sm text-gray-400">Ajouté par : {{ $bundle->user->name }}</p>

                    <div class="mt-2">
                        <a href="{{ route('bundles.edit', $bundle->id) }}" class="text-blue-400">Modifier</a>
                        <form action="{{ route('bundles.destroy', $bundle->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Supprimer</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection