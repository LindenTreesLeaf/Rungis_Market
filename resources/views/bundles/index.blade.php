@extends('layouts.app')

@section('title', 'Produits')

@section('content')
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
                                <a href="#" class="btn btn-primary btn-sm">Commander</a>
                            @else
                                <span class="btn btn-outline-dark btn-sm">Rutpture de stock</span>
                            @endif
                        </div>
                        <div class="col">
                            <!--Image ?-->
                                <div class="flex-shrink-0">
                                    @if($bundle->product == "Orchidées séchées") 
                                    <img srcset="<?php echo asset('images/orchidees-sechees-150.png') ?> 150w,
                                        <?php echo asset('images/orchidees-sechees-120.png') ?> 120w,
                                        <?php echo asset('images/orchidees-sechees-100.png') ?> 100w"
                                        sizes=" (max-width: 120px) 100px, 120px"
                                        src="<?php echo asset('images/orchidees-sechees-120.png')?> "  title="Orchidées séchées" class="object-cover rounded-lg shadow w-32 h-32">
                                    @endif
                                </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </x-slot>
</x-display-index>
@endsection
