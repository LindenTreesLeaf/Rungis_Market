@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-center text-purple-600 text-3xl font-bold mb-6">Historique de Mes Commandes</h1>

    @if($orders->isEmpty())
        <div class="bg-yellow-100 text-yellow-800 p-4 rounded-lg mb-6">
            <strong>Pas de commandes.</strong> Vous n'avez pas encore passé de commande.
        </div>
    @else
        <div class="bg-black text-white p-6 rounded-lg shadow-md">
            <h2 class="text-purple-500 font-semibold text-xl mb-4">Mes Commandes</h2>
            
            @foreach($orders as $order)
                <div class="mb-6 p-4 border-b border-gray-700">
                    <h3 class="text-lg font-semibold mb-2">
                        Commande #{{ $order->id }} - 
                        <span class="text-sm text-gray-400">Passée le {{ $order->created_at->format('d/m/Y H:i') }}</span>
                    </h3>
                    
                    <div class="mb-2">
                        <strong>Total :</strong> {{ number_format($order->total, 2) }} €
                    </div>

                    <div class="mb-2">
                        <strong>Statut :</strong>
                        @if($order->status == 'payée')
                            <span class="text-green-500">Payée</span>
                        @elseif($order->status == 'en attente')
                            <span class="text-yellow-500">En Attente</span>
                        @elseif($order->status == 'annulée')
                            <span class="text-red-500">Annulée</span>
                        @endif
                    </div>

                    <div class="text-right">
                        <a href="{{ route('orders.show', $order->id) }}" class="bg-purple-600 text-white hover:bg-purple-700 px-6 py-2 rounded-lg transition duration-300">
                            Voir les détails
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
