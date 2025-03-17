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
                    </tr>
                </thead>
                <tbody>
                    @foreach($ongoingOrders as $order)
                        <tr>
                            <td scope="row">{{ $order->id }}</td>
                            <td>{{ $order->state->name }}
                            @if($order->state->id == 2)
                                <td>{{ date('Y-m-d', strtotime($order->date_passed)) }}</td>
                                <td>{{ date('Y-m-d', strtotime($order->date_retreive)) }}</td>
                            @else
                                <td><span class="text-gray-500">N/A</span></td>
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
                                <td>{{ date('Y-m-d', strtotime($order->date_passed)) }}</td>
                                <td>{{ date('Y-m-d', strtotime($order->date_retreive)) }}</td>
                            @else
                                <td><span class="text-gray-500">{{ date('Y-m-d', strtotime($order->date_passed)) }}</span></td>
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
