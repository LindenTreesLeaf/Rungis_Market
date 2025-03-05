@extends('layouts.app')

@section('title', 'Détails du Lot')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-semibold text-gray-800">Détails du lot</h1>

   
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6">
            <strong>Erreur(s) dans le formulaire :</strong>
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    
    <div class="bg-gray-800 p-6 rounded-lg mt-6">
        <div class="mb-4">
            <strong class="text-lg text-white">Produit :</strong>
            <p class="text-gray-400">{{ $bundle->product }}</p>
        </div>

        <div class="mb-4">
            <strong class="text-lg text-white">Quantité :</strong>
            <p class="text-gray-400">{{ $bundle->quantity }} {{ $bundle->unit->name }}</p>
        </div>

        <div class="mb-4">
            <strong class="text-lg text-white">Prix :</strong>
            <p class="text-gray-400">{{ $bundle->price }}€</p>
        </div>

        <div class="mb-4">
            <strong class="text-lg text-white">Utilisateur :</strong>
            <p class="text-gray-400">{{ $bundle->user->name }}</p>
        </div>

        <div class="mb-4">
            <strong class="text-lg text-white">Commande :</strong>
            <p class="text-gray-400">Commande ID: {{ $bundle->order_id }}</p>
        </div>

        <div class="mb-4">
            <strong class="text-lg text-white">Unité :</strong>
            <p class="text-gray-400">{{ $bundle->unit->name }}</p>
        </div>

        
        <div class="mt-6 flex justify-between">
            <a href="{{ route('bundles.edit', $bundle->id) }}" class="px-6 py-2 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Modifier</a>

            <form action="{{ route('bundles.destroy', $bundle->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-6 py-2 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">Supprimer</button>
            </form>
        </div>
    </div>
</div>
@endsection
