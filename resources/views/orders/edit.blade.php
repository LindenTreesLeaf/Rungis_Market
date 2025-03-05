@extends('layouts.app')

@section('title', 'Modifier une Commande')

@section('content')
    <h1 class="text-2xl">Modifier la Commande</h1>

    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nom du client :</label>
        <input type="text" name="customer_name" value="{{ $order->customer_name }}" class="block w-full p-2 bg-gray-800 text-white">

        <label>Produits :</label>
        <select name="items[]" multiple class="block w-full p-2 bg-gray-800 text-white">
            @foreach ($products as $product)
                <option value="{{ $product->id }}" {{ in_array($product->id, $order->items->pluck('id')->toArray()) ? 'selected' : '' }}>
                    {{ $product->name }} ({{ $product->price }} €)
                </option>
            @endforeach
        </select>

        <label>Total :</label>
        <input type="number" name="total_price" step="0.01" value="{{ $order->total_price }}" class="block w-full p-2 bg-gray-800 text-white">

        <button type="submit" class="btn mt-4">Modifier</button>
    </form>
@endsection
