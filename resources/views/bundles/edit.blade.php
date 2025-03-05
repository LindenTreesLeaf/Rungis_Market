@extends('layouts.app')

@section('title', 'Modifier un Lot')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-semibold text-gray-800">Modifier un lot</h1>

   
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

   
    <form action="{{ route('bundles.update', $bundle->id) }}" method="POST">
        @csrf
        @method('PUT')

        
        <div class="mt-4">
            <label for="product" class="block text-sm font-semibold text-gray-700">Produit</label>
            <input type="text" id="product" name="product" value="{{ old('product', $bundle->product) }}" class="mt-2 block w-full px-4 py-2 bg-gray-800 text-white border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
        </div>

        
        <div class="mt-4">
            <label for="quantity" class="block text-sm font-semibold text-gray-700">Quantité</label>
            <input type="number" id="quantity" name="quantity" value="{{ old('quantity', $bundle->quantity) }}" class="mt-2 block w-full px-4 py-2 bg-gray-800 text-white border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
        </div>

       
        <div class="mt-4">
            <label for="price" class="block text-sm font-semibold text-gray-700">Prix</label>
            <input type="number" id="price" name="price" value="{{ old('price', $bundle->price) }}" class="mt-2 block w-full px-4 py-2 bg-gray-800 text-white border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
        </div>

        
        <div class="mt-4">
            <label for="user_id" class="block text-sm font-semibold text-gray-700">Utilisateur</label>
            <select name="user_id" id="user_id" class="mt-2 block w-full px-4 py-2 bg-gray-800 text-white border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id', $bundle->user_id) == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        
        <div class="mt-4">
            <label for="order_id" class="block text-sm font-semibold text-gray-700">Commande</label>
            <select name="order_id" id="order_id" class="mt-2 block w-full px-4 py-2 bg-gray-800 text-white border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                @foreach ($orders as $order)
                    <option value="{{ $order->id }}" {{ old('order_id', $bundle->order_id) == $order->id ? 'selected' : '' }}>{{ $order->id }}</option>
                @endforeach
            </select>
        </div>

       
        <div class="mt-4">
            <label for="unit_id" class="block text-sm font-semibold text-gray-700">Unité</label>
            <select name="unit_id" id="unit_id" class="mt-2 block w-full px-4 py-2 bg-gray-800 text-white border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                @foreach ($units as $unit)
                    <option value="{{ $unit->id }}" {{ old('unit_id', $bundle->unit_id) == $unit->id ? 'selected' : '' }}>{{ $unit->name }}</option>
                @endforeach
            </select>
        </div>

        
        <div class="mt-6 flex justify-end">
            <button type="submit" class="px-6 py-2 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Mettre à jour</button>
        </div>
    </form>
</div>
@endsection
