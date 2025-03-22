@extends('layouts.app')

@section('title') Commandes @endsection

@section('content')
@if(session('message'))
    <div class="alert alert-success" role="alert">{{ session('message') }}</div>
@endif
<x-display-index>
    <x-slot name="title">Vos commandes en cours</x-slot>
    <x-slot name="content">
        @if(count($ongoingOrders) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"><span class="textcolorinfo">Numéro de Commande</span></th>
                        <th scope="col"><span class="textcolorinfo">Statut</span></th>
                        <th scope="col"><span class="textcolorinfo">Date commande</span></th>
                        <th scope="col"><span class="textcolorinfo">Date récupération</span></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ongoingOrders as $order)
                        <tr>
                            <td scope="row">{{ $order->id }}</td>
                            <td>{{ $order->state->name }}
                            @if($order->state->id == 2)
                                <td>{{ date('d/m/Y', strtotime($order->date_passed)) }}</td>
                                <td>{{ date('d/m/Y', strtotime($order->date_retrieve)) }}</td>
                            @else
                                <td><span class="text-gray-500">N/A</span></td>
                                <td><span class="text-gray-500">N/A</span></td>
                            @endif
                            @can('view', $order)
                                <td><a href="{{route('orders.show', $order->id)}}" class="btn btn-sm btn-primary mb-1"><i class="bi bi-eye"></i></a></td>
                            @endcan
                            @if($order->state_id == 1)
                                <td><a href="{{route('orders.buy', $order->id)}}" class="btn btn-sm btn-primary mb-1"><i class="bi bi-cart-check"></i></a></td>
                            @elseif($order->state_id == 2)
                                <td><button type="button" class="btn btn-sm btn-outline-dark mb-1" data-bs-toggle="modal" data-bs-target="#deleteModal_{{$order->id}}">Annuler</button></td>
                                <x-bootstrap.deleteModal>
                                    <x-slot:id>deleteModal_{{$order->id}}</x-slot>
                                    <x-slot:title>Annuler la commande #{{$order->id}} ?</x-slot>
                                    <x-slot:slot>
                                        <div class="row">
                                            <div class="col-1">
                                                <form action="{{route('orders.cancel', $order->id)}}" method="get">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-primary mb-1">Oui</button>
                                                </form>
                                            </div>
                                            <div class="col-1">
                                                <button class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Non</button>
                                            </div>
                                        </div>
                                    </x-slot>
                                </x-bootstrap>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="row"><span>Vous n'avez aucune commande en cours pour le moment.</span></div>
        @endif
    </x-slot>
</x-display-index>

<x-display-index>
    <x-slot name="title">Vos commandes passées</x-slot>
    <x-slot name="content">
        @if(count($passedOrders) > 0)
        <table class="table">
                <thead>
                    <tr>
                        <th scope="col"><span class="textcolorinfo">Numéro de Commande</span></th>
                        <th scope="col"><span class="textcolorinfo">Statut</span></th>
                        <th scope="col"><span class="textcolorinfo">Date commande</span></th>
                        <th scope="col"><span class="textcolorinfo">Date récupération</span></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($passedOrders as $order)
                        <tr>
                            <td scope="row">{{ $order->id }}</td>
                            <td>{{ $order->state->name }}
                            @if($order->state->id == 3)
                                <td>{{ date('d/m/Y', strtotime($order->date_passed)) }}</td>
                                <td>{{ date('d/m/Y', strtotime($order->date_retreive)) }}</td>
                            @else
                                <td><span class="text-gray-500">{{ date('d/m/Y', strtotime($order->date_passed)) }}</span></td>
                                <td><span class="text-gray-500">N/A</span></td>
                            @endif
                            @can('view', $order)
                                <td><a href="{{route('orders.show', $order)}}" class="btn btn-sm btn-primary mb-1"><i class="bi bi-eye"></i></a></td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="row"><span>Vous n'avez aucune commande passée.</span></div>
        @endif
    </x-slot>
</x-display-index>
@endsection
