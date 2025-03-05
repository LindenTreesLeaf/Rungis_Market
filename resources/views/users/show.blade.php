@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-center text-purple-600 text-3xl font-bold mb-6">Détails de l'Utilisateur</h1>

    <div class="bg-black text-white p-6 rounded-lg shadow-md">
        <div class="mb-4">
            <strong class="text-purple-500">Nom :</strong> {{ $user->name }}
        </div>
        <div class="mb-4">
            <strong class="text-purple-500">Email :</strong> {{ $user->email }}
        </div>
        <div class="mb-4">
            <strong class="text-purple-500">Rôle :</strong> {{ $user->getRoleNames()->first() }}
        </div>

       
        <h3 class="text-purple-500 font-semibold text-xl mb-4">Commandes Passées :</h3>
        @if($user->orders->isEmpty())
            <p class="text-gray-500">Aucune commande passée.</p>
        @else
            <ul class="list-disc list-inside">
                @foreach($user->orders as $order)
                    <li>
                        <strong>Commande #{{ $order->id }}</strong> - 
                        {{ $order->created_at->format('d/m/Y H:i') }} - 
                        Total : {{ number_format($order->total, 2) }} €
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    
    <div class="text-center mt-6">
        <a href="{{ route('users.index') }}" class="bg-purple-600 text-white hover:bg-purple-700 px-6 py-2 rounded-lg transition duration-300">
            Retourner à la liste des utilisateurs
        </a>
    </div>
</div>
@endsection
