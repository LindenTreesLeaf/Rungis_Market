<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Marché de Rungis</title>

    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
    <header class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
           
            <div class="shrink-0">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/monlogo.png') }}" alt="Marché de Rungis" class="h-10">
                </a>
            </div>

            
            <nav class="hidden sm:flex space-x-6">
                <x-nav-link :href="route('home')" :active="request()->routeIs('home')">Accueil</x-nav-link>
                <x-nav-link :href="route('about')" :active="request()->routeIs('about')">À propos de nous</x-nav-link>
                <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')">Nous contacter</x-nav-link>

                
                @auth
                    @if(Auth::user()->role === 'marchand')
                        <x-nav-link :href="route('buildings.index')">Bâtiments</x-nav-link>
                        <x-nav-link :href="route('zones.index')">Zones</x-nav-link>
                        <x-nav-link :href="route('equipments.index')">Équipements</x-nav-link>
                    @elseif(Auth::user()->role === 'client')
                        <x-nav-link :href="route('orders.index')">Mes Commandes</x-nav-link>
                        <x-nav-link :href="route('bundles.index')">Bundles</x-nav-link>
                    @elseif(Auth::user()->role === 'superviseur' || Auth::user()->role === 'admin')
                        <x-nav-link :href="route('admin.dashboard')">Admin</x-nav-link>
                        <x-nav-link :href="route('users.index')">Utilisateurs</x-nav-link>
                    @endif
                @endauth
            </nav>

            
            <div class="sm:flex items-center space-x-4">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300">
                                {{ Auth::user()->name }}
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">Profil</x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    Déconnexion
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <x-nav-link :href="route('login')">Connexion</x-nav-link>
                    <x-nav-link :href="route('register')">Inscription</x-nav-link>
                @endauth
            </div>
        </div>
    </header>

    
    <section class="bg-yellow-500 text-white text-center py-4">
        <p class="text-lg font-semibold">Offre Spéciale : Pour 2 zones prises, 1 zone offerte ! 🎉</p>
    </section>

    
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
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

        
        <div class="mt-8 flex justify-center">
            <img src="{{ asset('images/rungis-market.jpg') }}" alt="Marché de Rungis" class="w-full max-w-4xl rounded-lg shadow-lg">
        </div>
    </main>

   
    <footer class="bg-gray-800 text-white py-6 mt-12 text-center">
        <p>&copy; {{ date('Y') }} Marché de Rungis. Tous droits réservés.</p>
    </footer>
</body>
</html>
