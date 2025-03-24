@extends('layouts.app')

@section('title', 'Produits')

@section('content')
@if(session('message'))
    <div class="alert alert-success" role="alert">{{ session('message') }}</div>
@endif
<x-display-index>
    <x-slot name="title">Produits à retrouver sur le Marché</x-slot>
    <x-slot name="content">
        <div class="container mx-auto px-4 py-6">
            <div class="row">
                <nav class="navbar navbar-expand-lg">
                    <div class="collapse navbar-collapse">
                        <form class="container-fluid justify-content-start">
                            <a class="btn btn-small btn-outline-success" href="{{route('bundles.index', 1)}}">Fruits et Légumes</a>
                            <a class="btn btn-small btn-outline-danger" href="{{route('bundles.index', 2)}}">Produits carnés</a>
                            <a class="btn btn-small btn-outline-info" href="{{route('bundles.index', 3)}}">Marée</a>
                            <a class="btn btn-small btn-outline-warning" href="{{route('bundles.index', 4)}}">Gastronomie</a>
                            <a class="btn btn-small btn-outline-success" href="{{route('bundles.index', 5)}}">Horticulture</a>
                        </form>
                    </div>
                </nav>
            </div>
            <div class="row">
                @foreach($bundles as $bundle)
                    <div class="col-6">
                        <div class="contentdisplay my-3">
                            <div class="row">
                                <div class="col-8">
                                    <p class="textcolorhighlight fs-4">{{ $bundle->product }}</p>
                                    <p><srtong class="text-gray-500 mb-4">Quantité :</strong> {{ $bundle->quantity }} {{$bundle->unit->name_u}}</p>
                                    <p><strong class="text-gray-500 mb-4">Prix :</strong> {{ number_format($bundle->price, 2) }} €</p>
                                    @if($bundle->validated == 1 && !$bundle->isReserved())
                                        <a href="{{route('order.addToCart', $bundle->id)}}" class="btn btn-primary btn-sm">Commander</a>
                                    @else
                                        <span class="btn btn-outline-dark btn-sm">Rutpture de stock</span>
                                    @endif
                                </div>
                                <div class="col-4 justify-content-end">
                                    @if(file_exists(public_path('images/products/' . $bundle->product . '-120.png')))
                                        <img srcset="<?php echo asset('images/products/' . $bundle->product . '-120.png'); ?> 120w,
                                            <?php echo asset('images/products/' . $bundle->product . '-150.png'); ?> 150w,"
                                            sizes="150px, 120px"
                                            src="<?php echo asset('images/products/' . $bundle->product . '-150.png'); ?>" title={{$bundle->product}} class="img-fluid rounded-lg shadow-lg">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </x-slot>
</x-display-index>
@endsection
