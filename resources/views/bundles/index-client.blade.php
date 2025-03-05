@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-center text-purple-600 text-3xl font-bold mb-6">Liste des Bundles</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($bundles as $bundle)
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold text-purple-600 mb-4">{{ $bundle->product }}</h2>
                <p class="text-gray-500 mb-4">Quantité disponible : {{ $bundle->quantity }}</p>
                <p class="text-gray-500 mb-4">Prix : {{ number_format($bundle->price, 2) }} €</p>

                <form action="{{ route('cart.add', $bundle->id) }}" method="POST">
                    @csrf
                    <div class="flex items-center space-x-4">
                        <input type="number" name="quantity" value="1" min="1" class="border border-gray-300 rounded-lg w-16 p-2 text-center">
                        <button type="submit" class="bg-purple-600 text-white hover:bg-purple-700 px-6 py-2 rounded-lg transition duration-300">
                            Ajouter au Panier
                        </button>
                    </div>
                </form>
            </div>
        @endforeach
    </div>

    <div class="text-center mt-6">
        <a href="{{ route('cart.index') }}" class="bg-purple-600 text-white hover:bg-purple-700 px-6 py-2 rounded-lg transition duration-300">
            Voir mon Panier
        </a>
    </div>
</div>
@endsection
