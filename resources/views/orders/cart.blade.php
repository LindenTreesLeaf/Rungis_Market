@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-center text-purple-600 text-3xl font-bold mb-6">Votre Panier</h1>

    
    @if($bundles->isEmpty())
        <div class="bg-white shadow-md rounded-lg p-4">
            <h2 class="text-lg font-semibold text-gray-600">Votre panier est vide.</h2>
            <a href="{{ route('products.index') }}" class="text-purple-500 hover:underline">Retourner à la liste des produits</a>
        </div>
    @else
        
        <div class="bg-white shadow-md rounded-lg p-4 mb-6">
            <table class="w-full table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left">Produit</th>
                        <th class="px-4 py-2 text-left">Quantité</th>
                        <th class="px-4 py-2 text-left">Prix Unitaire</th>
                        <th class="px-4 py-2 text-left">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bundles as $bundle)
                        <tr>
                            <td class="px-4 py-2">{{ $bundle->product }}</td>
                            <td class="px-4 py-2">{{ $bundle->quantity }}</td>
                            <td class="px-4 py-2">{{ number_format($bundle->price, 2) }} €</td>
                            <td class="px-4 py-2">{{ number_format($bundle->price * $bundle->quantity, 2) }} €</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        
        <div class="bg-white shadow-md rounded-lg p-4 mb-6">
            <h2 class="text-lg font-semibold text-purple-500 mb-4">Total</h2>
            <p class="text-lg text-gray-700">Total à payer : <span class="font-bold">{{ number_format($total, 2) }} €</span></p>
        </div>

        
        <div class="flex justify-between">
            <a href="{{ route('products.index') }}" class="bg-purple-500 text-white px-6 py-2 rounded-lg hover:bg-purple-600">Retourner à la liste des produits</a>
            <a href="{{ route('orders.checkout') }}" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600">Passer au paiement</a>
        </div>

        
        <div class="mt-4">
            <a href="{{ route('bundles.index') }}" class="bg-yellow-500 text-white px-6 py-2 rounded-lg hover:bg-yellow-600">Retourner à la liste des bundles à acheter</a>
        </div>
    @endif
</div>
@endsection
