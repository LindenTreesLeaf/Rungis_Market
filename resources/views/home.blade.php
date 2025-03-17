@extends('layouts.app')

@section('title') Accueil @endsection

@section('content')
    @auth
        @if(Auth::user()->hasrole('seller'))
            <header class="bg-yellow-500 text-center p-2 text-lg font-semibold">
                Offre Spéciale : Pour 2 zones prises, 1 zone offerte !
            </header>
        @endif
    @endauth

    <div class="container">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <h1 class="maintitle">Bienvenue au Marché de Rungis</h1>
            <p class="subtitle">
                Le plus grand marché de produits frais en Europe ! Découvrez nos produits et profitez de nos services.
            </p>

            <div class="row mt-4">
                <div class="row my-2">
                    <h2 class="sectiontitle text-center my-2">Les Produits que Vous Pouvez Retrouver</h2>
                </div>
                <div class="row justify-content-center">
                    <div class="col-4 my-3">
                        <div class="contentdisplay">
                            <a href="{{route('bundles.index', 1)}}" class="text-lg font-semibold text-gray-900 dark:text-white">Fruits et Légumes</a>
                            <p class="text-gray-700 dark:text-gray-300 mt-2">Fruits, légumes, salades, champignons,...</p>
                        </div>
                    </div>

                    <div class="col-4 my-3">
                        <div class="contentdisplay">
                            <a href="{{route('bundles.index', 2)}}" class="text-lg font-semibold text-gray-900 dark:text-white">Produits carnés</a>
                            <p class="text-gray-700 dark:text-gray-300 mt-2">Bœuf, poulet, charcuterie,...</p>
                        </div>
                    </div>

                    <div class="col-4 my-3">
                        <div class="contentdisplay">
                            <a href="{{route('bundles.index', 3)}}" class="text-lg font-semibold text-gray-900 dark:text-white">Marée</a>
                            <p class="text-gray-700 dark:text-gray-300 mt-2">Poissons frais, entiers, fruits de mer,...</p>
                        </div>
                    </div>

                    <div class="col-4 my-3">
                        <div class="contentdisplay">
                            <a href="{{route('bundles.index', 4)}}" class="text-lg font-semibold text-gray-900 dark:text-white">Produits laitiers et de la gastronomie</a>
                            <p class="text-gray-700 dark:text-gray-300 mt-2">Lait, fromages, yaourts artisanaux, huiles, pâtes,...</p>
                        </div>
                    </div>

                    <div class="col-4 my-3">
                        <div class="contentdisplay">
                            <a href="{{route('bundles.index', 5)}}" class="text-lg font-semibold text-gray-900 dark:text-white">Horticulture et décoration</a>
                            <p class="text-gray-700 dark:text-gray-300 mt-2">Fleurs fraiches, en pot, séchées, en bouquets,...</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8 flex justify-center p-6">
                <img srcset="<?php echo asset('images/MarcheRungis-960.png'); ?> 960w,
                    <?php echo asset('images/MarcheRungis-750.png'); ?> 750w,
                    <?php echo asset('images/MarcheRungis-450.png'); ?> 450w,
                    <?php echo asset('images/MarcheRungis-300.png'); ?> 300w,
                    <?php echo asset('images/MarcheRungis-150.png'); ?> 150w,"
                    sizes="960px, 750px, 450px, 300px, 150px"
                    src="<?php echo asset('images/MarcheRungis-960.png'); ?>" title="Marché Rungis" class="img-fluid rounded-lg shadow-lg">
            </div>
        </div>
    </div>
@endsection
