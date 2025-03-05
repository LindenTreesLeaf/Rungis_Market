@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-center text-purple-600 text-3xl font-bold mb-6">Détails de la Commande #{{ $order->id }}</h1>

    <div class="bg-black text-white p-6 rounded-lg shadow-md">
        <div class="mb-4">
            <strong>Client :</strong> {{ $order->user->name }}
        </div>

        <div class="mb-4">
            <strong>Statut :</strong>
            <span class="px-3 py-1 rounded-full {{ $order->statut == 'En cours' ? 'bg-purple-600' : 'bg-green-600' }} text-white">{{ $order->statut }}</span>
        </div>

        <div class="mb-4">
            <strong>Date de Commande :</strong> {{ $order->created_at->format('d/m/Y') }}
        </div>

        <div class="mb-4">
            <strong>Produits Commandés :</strong>
            <ul class="list-disc pl-6">
                @foreach($order->products as $product)
                    <li>{{ $product->nom }} - {{ $product->pivot->quantity }} x {{ $product->prix }} €</li>
                @endforeach
            </ul>
        </div>

        <div class="mb-4">
            <strong>Total :</strong> {{ $order->total }} €
        </div>

        <div class="text-center">
            <a href="{{ route('orders.index') }}" class="bg-purple-600 text-white hover:bg-purple-700 px-6 py-2 rounded-lg transition duration-300">
                Retour à la Liste des Commandes
            </a>
        </div>
    </div>
</div>
@endsection
