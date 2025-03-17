@extends('layouts.app')

@section('title') Détail de commande @endsection

@section('content')
<x-display-index>
    <x-slot name="title">Détails de la commande #{{ $order->id }}</x-slot>
    <x-slot name="content">
        <div class="row">
            <div class="row">
                <div class="col-3"><strong class="textcolorinfo">Statut : </strong></div>
                <div class="col">{{ $order->state->name }}</div>
            </div>
            <div class="row">
                <div class="col-3"><strong class="textcolorinfo">Date de Commande : </strong></div>
                @if($order->state->id != 1)
                    <div class="col">{{ date('Y-m-d', strtotime($order->date_passed)) }}</div>
                @else
                    <div class="col"><span class="text-gray-500">N/A</span></div>
                @endif
            </div>
            <div class="row">
                <div class="col-3"><strong class="textcolorinfo">Date de Retrait : </strong></div>
                @if($order->state->id != 1 && $order->state->id != 4)
                    <div class="col">{{ date('Y-m-d', strtotime($order->date_retreive)) }}</div>
                @else
                    <div class="col"><span class="text-gray-500">N/A</span></div>
                @endif
            </div>
            <div class="row">
                <strong class="textcolorinfo">Produits Commandés : </strong>
                <ul class="mt-2">
                    @foreach($order->bundles as $bundle)
                        <li class="listdisplay"><span class="textcolorinfo">{{ $bundle->product }}</span> - {{ $bundle->quantity }}{{ $bundle->unit->name_u }} - {{ $bundle->price }}€</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-2"><a href="{{ route('orders.index') }}" class="btn btn-outline-dark">Retour</a></div>
        </div>
    </x-slot>
</x-display-index>
@endsection
