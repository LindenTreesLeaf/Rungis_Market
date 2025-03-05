@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-center text-purple-600 text-3xl font-bold mb-6">Liste des Commandes</h1>

    <div class="bg-black text-white p-6 rounded-lg shadow-md">
        @if($orders->isEmpty())
            <p class="text-gray-400">Aucune commande en cours.</p>
        @else
            <table class="table-auto w-full text-left text-gray-200">
                <thead>
                    <tr>
                        <th class="py-2 px-4">Numéro de Commande</th>
                        <th class="py-2 px-4">Client</th>
                        <th class="py-2 px-4">Statut</th>
                        <th class="py-2 px-4">Date</th>
                        <th class="py-2 px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td class="py-2 px-4">{{ $order->id }}</td>
                            <td class="py-2 px-4">{{ $order->user->name }}</td>
                            <td class="py-2 px-4">
                                <span class="px-3 py-1 rounded-full {{ $order->statut == 'En cours' ? 'bg-purple-600' : 'bg-green-600' }} text-white">{{ $order->statut }}</span>
                            </td>
                            <td class="py-2 px-4">{{ $order->created_at->format('d/m/Y') }}</td>
                            <td class="py-2 px-4">
                                <a href="{{ route('orders.show', $order->id) }}" class="text-purple-500 hover:underline">Voir</a>
                                |
                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Êtes-vous sûr de vouloir annuler cette commande ?')">Annuler</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
