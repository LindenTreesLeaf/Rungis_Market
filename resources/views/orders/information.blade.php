@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-center text-purple-600 text-3xl font-bold mb-6">Informations de l'Entreprise et Livraison</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded-lg mb-6">
            <strong>Succès !</strong> {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="bg-red-500 text-white p-4 rounded-lg mb-6">
            <strong>Erreur !</strong> {{ session('error') }}
        </div>
    @endif

   
    <div class="bg-black text-white p-6 rounded-lg shadow-md mb-6">
        <h2 class="text-center text-purple-500 text-xl font-semibold mb-4">Complétez les informations suivantes</h2>

        <form action="{{ route('order.confirm') }}" method="POST">
            @csrf

            
            <div class="mb-4">
                <label for="company_name" class="text-purple-500 font-semibold">Nom de l'Entreprise</label>
                <input type="text" name="company_name" id="company_name" class="form-control border-gray-300 rounded-md w-full p-3 mt-1" required placeholder="Entrez le nom de votre entreprise">
            </div>

           
            <div class="mb-4">
                <label for="siret" class="text-purple-500 font-semibold">Numéro SIRET</label>
                <input type="text" name="siret" id="siret" class="form-control border-gray-300 rounded-md w-full p-3 mt-1" required placeholder="Entrez votre numéro SIRET">
            </div>

            
            <div class="mb-4">
                <label for="delivery_address" class="text-purple-500 font-semibold">Adresse de Livraison</label>
                <input type="text" name="delivery_address" id="delivery_address" class="form-control border-gray-300 rounded-md w-full p-3 mt-1" required placeholder="Entrez l'adresse de livraison">
            </div>

            
            <div class="mb-4">
                <label for="postal_code" class="text-purple-500 font-semibold">Code Postal</label>
                <input type="text" name="postal_code" id="postal_code" class="form-control border-gray-300 rounded-md w-full p-3 mt-1" required placeholder="Entrez le code postal">
            </div>

           
            <div class="mb-4">
                <label for="city" class="text-purple-500 font-semibold">Ville</label>
                <input type="text" name="city" id="city" class="form-control border-gray-300 rounded-md w-full p-3 mt-1" required placeholder="Entrez votre ville">
            </div>

            <div class="text-center mt-6">
                <button type="submit" class="bg-purple-600 text-white hover:bg-purple-700 px-6 py-2 rounded-lg transition duration-300">
                    Passer au Paiement
                </button>
            </div>
        </form>
    </div>

    
    <div class="text-center mt-4">
        <a href="{{ route('cart') }}" class="text-white underline">
            Retour au panier
        </a>
    </div>
</div>
@endsection
