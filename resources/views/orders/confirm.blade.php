@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-center text-purple-600 text-3xl font-bold mb-6">Confirmation de la Commande</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded-lg mb-6">
            <strong>Succès !</strong> {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="bg-red-500 text-white p-4 rounded-lg mb-6">
            <strong>Erreur !</strong> {{ session('error') }}
        </div>
    @endif

    
    <div class="bg-black text-white p-6 rounded-lg shadow-md">
        <h2 class="text-center text-purple-500 text-xl font-semibold mb-4">Détails de votre commande #{{ $order->id }}</h2>
        
        <div class="mb-4">
            <strong>Date de la commande :</strong> {{ $order->created_at->format('d/m/Y H:i') }}
        </div>

        <div class="mb-4">
            <strong>Total de la commande :</strong> {{ number_format($order->total, 2) }} €
        </div>

        <h3 class="text-purple-500 font-semibold text-lg mb-4">Articles Commandés :</h3>

        <ul class="list-disc list-inside">
            @foreach($order->bundles as $bundle)
                <li>
                    <strong>{{ $bundle->product }}</strong> ({{ $bundle->pivot->quantity }} x {{ $bundle->price }} €)
                    = {{ number_format($bundle->pivot->quantity * $bundle->price, 2) }} €
                </li>
            @endforeach
        </ul>
    </div>

   
    <div class="text-center mt-6">
        <a href="{{ route('payment.show', $order->id) }}" class="bg-purple-600 text-white hover:bg-purple-700 px-6 py-2 rounded-lg transition duration-300">
            Payer maintenant
        </a>
    </div>

   
    <div class="text-center mt-4">
        <a href="{{ route('orders.index') }}" class="text-white underline">
            Retourner à mes commandes
        </a>
    </div>
</div>
@endsection
