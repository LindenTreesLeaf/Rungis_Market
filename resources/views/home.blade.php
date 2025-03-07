@extends('layouts.app')

@section('content')
    <section class="bg-yellow-500 text-white text-center py-4">
        <p class="text-lg font-semibold">Offre Spéciale : Pour 2 zones prises, 1 zone offerte ! 🎉</p>
    </section>

    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white text-center">Bienvenue au Marché de Rungis</h1>
        <p class="text-lg text-gray-700 dark:text-gray-300 text-center mt-2">
            Le plus grand marché de produits frais en Europe ! Découvrez nos produits et profitez de nos services.
        </p>

        <section class="mt-8">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white text-center">Les Produits que Vous Pouvez Retrouver</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-6">
                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Fruits et Légumes</h3>
                    <p class="text-gray-700 dark:text-gray-300 mt-2">Pommes, carottes, salades, tomates, fraises, etc.</p>
                </div>

                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Viandes et Poissons</h3>
                    <p class="text-gray-700 dark:text-gray-300 mt-2">Bœuf, poulet, poisson frais, fruits de mer.</p>
                </div>

                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Produits Laitiers</h3>
                    <p class="text-gray-700 dark:text-gray-300 mt-2">Lait, fromages, yaourts artisanaux.</p>
                </div>

                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Boulangerie</h3>
                    <p class="text-gray-700 dark:text-gray-300 mt-2">Pains frais, viennoiseries, pâtisseries.</p>
                </div>

                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Épicerie</h3>
                    <p class="text-gray-700 dark:text-gray-300 mt-2">Riz, pâtes, huiles, condiments, conserves.</p>
                </div>
            </div>
        </section>

        <div class="mt-8 flex justify-center p-6">
            <img srcset="<?php echo asset('images/MarcheRungis-960.png'); ?> 960w,
                <?php echo asset('images/MarcheRungis-750.png'); ?> 750w,
                <?php echo asset('images/MarcheRungis-450.png'); ?> 450w,
                <?php echo asset('images/MarcheRungis-300.png'); ?> 300w,
                <?php echo asset('images/MarcheRungis-150.png'); ?> 150w,"
                sizes="960px, 750px, 450px, 300px, 150px"
                src="<?php echo asset('images/MarcheRungis-960.png'); ?>" title="Marché Rungis" class="img-fluid">
        </div>
    </div>
@endsection
