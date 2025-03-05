@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-center text-purple-600 text-3xl font-bold mb-6">Création d'un Utilisateur</h1>

    <div class="bg-black text-white p-6 rounded-lg shadow-md">
        <h2 class="text-center text-purple-500 text-xl font-semibold mb-4">Informations de l'Utilisateur</h2>

        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="text-purple-500">Nom</label>
                <input type="text" name="name" id="name" class="form-control border-gray-300 rounded-md w-full p-3 mt-1" value="{{ old('name') }}" required>
            </div>

            <div class="mb-4">
                <label for="email" class="text-purple-500">Email</label>
                <input type="email" name="email" id="email" class="form-control border-gray-300 rounded-md w-full p-3 mt-1" value="{{ old('email') }}" required>
            </div>

            <div class="mb-4">
                <label for="password" class="text-purple-500">Mot de passe</label>
                <input type="password" name="password" id="password" class="form-control border-gray-300 rounded-md w-full p-3 mt-1" required>
            </div>

            <div class="mb-4">
                <label for="role" class="text-purple-500">Choisir un rôle</label>
                <select name="role" id="role" class="form-control border-gray-300 rounded-md w-full p-3 mt-1" required>
                    <option value="client" {{ old('role') == 'client' ? 'selected' : '' }}>Client</option>
                    <option value="marchand" {{ old('role') == 'marchand' ? 'selected' : '' }}>Marchand</option>
                </select>
            </div>

            <div class="text-center mt-6">
                <button type="submit" class="bg-purple-600 text-white hover:bg-purple-700 px-6 py-2 rounded-lg transition duration-300">
                    Créer l'Utilisateur
                </button>
            </div>
        </form>
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('users.index') }}" class="text-white underline">
            Retour à la liste des utilisateurs
        </a>
    </div>
</div>
@endsection
