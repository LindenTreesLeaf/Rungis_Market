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
            @foreach($bundles as $bundle)
                <div class="contentdisplay my-3">
                    <div class="row">
                        <div class="col">
                            <p class="textcolorhighlight fs-4">{{ $bundle->product }}</p>
                            <p><srtong class="text-gray-500 mb-4">Quantité :</strong> {{ $bundle->quantity }}</p>
                            <p><strong class="text-gray-500 mb-4">Prix :</strong> {{ number_format($bundle->price, 2) }} €</p>
                            @if($bundle->validated == 1)
                                <a href="{{route('order.addToCart', $bundle->id)}}" class="btn btn-primary btn-sm">Commander</a>
                            @else
                                <span class="btn btn-outline-dark btn-sm">Rutpture de stock</span>
                            @endif
                        </div>
                        <div class="col">
                            @php
                                $productImages = [
                                    "Pommes" => "pommes-120.png",
                                    "Harricots verts" => "harricots-verts-120.png",
                                    "Cerises" => "cerises-120.png",
                                    "Brocolis" => "brocolis-120.png",
                                    "Truffes entières" => "truffes-entieres-120.png",
                                    "Igname" => "igname-120.png",
                                    "Courgettes" => "courgettes-120.png",
                                    "Courgettes rondes" => "courgettes-rondes-120.png",
                                    "Aubergines" => "aubergines-120.png",
                                    "Concombres" => "concombres-120.png",
                                    "Pousse de Soja" => "pousse-de-soja-120.png",
                                    "Sauté d'Agneau" => "saute-agneau-120.png",
                                    "Souris d'Agneau" => "souris-agneau-120.png",
                                    "Terrine Foie Gras mi-cuit" => "terrine-foie-gras-120.png",
                                    "Manchon de Canard" => "manchon-canard-120.png",
                                    "Jambon Cuit à la Truffe" => "jambon-truffe-120.png",
                                    "Saucisson Sec Court d'Auvergne" => "saucisson-sec-120.png",
                                    "Chute de Saumon Fumée" => "saumon-fume-120.png",
                                    "Truite fumée tranché" => "truite-fumee-120.png",
                                    "Bar Élevage" => "bar-elevage-120.png",
                                    "Crevettes Rose Cuite" => "crevettes-120.png",
                                    "Tentacules de Poulpe cuits" => "poulpe-120.png",
                                    "Salade de Calamar à la niçoise" => "calamar-nicoise-120.png",
                                    "Corail d'Oursin Pur" => "oursin-120.png",
                                    "Lait de vache" => "lait-vache-120.png",
                                    "Lait de brebis" => "lait-brebis-120.png",
                                    "Tomme de Savoie" => "tomme-savoie-120.png",
                                    "Brie à la truffe" => "brie-truffe-120.png",
                                    "Saint Marcellin" => "saint-marcellin-120.png",
                                    "Spaghetti" => "spaghetti-120.png",
                                    "Cannelloni" => "cannelloni-120.png",
                                    "Huile d'Olive Extra Vierge" => "huile-olive-120.png",
                                    "Pain burger premium sésame" => "pain-burger-120.png",
                                    "Tapenade Piment d'Espelette" => "tapenade-120.png",
                                    "Roses rouges coupées" => "roses-rouges-120.png",
                                    "Jonquilles en pot" => "jonquilles-120.png",
                                    "Lys en bouquet" => "lys-120.png",
                                    "Orchidées séchées" => "orchidees-sechees-120.png",
                                    "Pensées en pot" => "pensees-120.png"
                                ];
                                $imageName = $productImages[$bundle->product] ?? 'default-120.png';
                            @endphp
                        <div style="text-align: right;">
                            <img src="{{ asset('images/' . $imageName) }}" 
                                alt="{{ $bundle->product }}" 
                                style="width: 120px; height: auto; border-radius: 8px;">
                        </div>

                                   
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </x-slot>
</x-display-index>
@endsection
