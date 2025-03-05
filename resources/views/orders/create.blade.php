@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-center text-purple-600 text-3xl font-bold mb-6">Passer une commande</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded-lg mb-6">
            <strong>Succès !</strong> {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="bg-red-500 text-white p-4 rounded-lg mb-6">
            <strong>Erreur !</strong> {{ session('error') }}
        </div>
    @endif

    
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        
        <div class="bg-black text-white p-6 rounded-lg shadow-md">
            <h2 class="text-center text-purple-500 text-xl font-semibold mb-4">Sélectionnez vos Bundles</h2>

            @foreach($bundles as $bundle)
                <div class="mb-4">
                    <div class="flex justify-between items-center">
                        <div class="text-lg">
                            <strong>{{ $bundle->product }}</strong> - {{ $bundle->price }} €
                        </div>
                        <div>
                            <label for="quantity_{{ $bundle->id }}" class="form-label text-purple-500">Quantité</label>
                            <input type="number" name="bundles[{{ $bundle->id }}]" id="quantity_{{ $bundle->id }}" class="form-control border-gray-300 rounded-md w-20 p-2 mt-1" min="1" value="1" required>
                        </div>
                    </div>
                    <p class="text-sm text-gray-400">{{ $bundle->description }}</p>
                </div>
            @endforeach
        </div>

        
        <div class="bg-black text-white p-6 rounded-lg shadow-md mt-6">
            <div class="flex justify-between items-center mb-4">
                <strong>Total de la commande :</strong>
                <span id="total_amount">{{ number_format($totalAmount, 2) }} €</span>
            </div>
        </div>

        
        <div class="text-center mt-6">
            <button type="submit" class="bg-purple-600 text-white hover:bg-purple-700 px-6 py-2 rounded-lg transition duration-300">
                Passer la commande
            </button>
        </div>
    </form>
</div>
@endsection
