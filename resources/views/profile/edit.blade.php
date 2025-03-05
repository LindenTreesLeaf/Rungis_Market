@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-center text-purple-600 text-3xl font-bold mb-6">Modifier mon Profil</h1>

    <form action="{{ route('profile.update') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PATCH')

        <div class="mb-4">
            <label for="name" class="form-label text-purple-500">Nom</label>
            <input type="text" name="name" id="name" class="form-control border-gray-300 rounded-md w-full p-3 mt-1" value="{{ Auth::user()->name }}" required>
        </div>

        <div class="mb-4">
            <label for="email" class="form-label text-purple-500">Email</label>
            <input type="email" name="email" id="email" class="form-control border-gray-300 rounded-md w-full p-3 mt-1" value="{{ Auth::user()->email }}" required>
        </div>

        <div class="mb-4">
            <label for="address" class="form-label text-purple-500">Adresse</label>
            <input type="text" name="address" id="address" class="form-control border-gray-300 rounded-md w-full p-3 mt-1" value="{{ Auth::user()->address }}" required>
        </div>

        <div class="mb-4">
            <label for="phone_number" class="form-label text-purple-500">Numéro de téléphone</label>
            <input type="text" name="phone_number" id="phone_number" class="form-control border-gray-300 rounded-md w-full p-3 mt-1" value="{{ Auth::user()->phone_number }}" required>
        </div>

        <div class="mb-4">
            <label for="password" class="form-label text-purple-500">Nouveau mot de passe (facultatif)</label>
            <input type="password" name="password" id="password" class="form-control border-gray-300 rounded-md w-full p-3 mt-1">
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="form-label text-purple-500">Confirmer le mot de passe</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control border-gray-300 rounded-md w-full p-3 mt-1">
        </div>

        <div class="text-center">
            <button type="submit" class="bg-purple-600 text-white hover:bg-purple-700 px-6 py-2 rounded-lg transition duration-300">
                Mettre à jour
            </button>
        </div>
    </form>

    <!-- Formulaire pour supprimer le profil -->
    <form action="{{ route('profile.destroy') }}" method="POST" style="display:inline;" class="mt-6 text-center">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-600 text-white hover:bg-red-700 px-6 py-2 rounded-lg transition duration-300" onclick="return confirm('Êtes-vous sûr de vouloir supprimer votre profil ?')">
            Supprimer mon profil
        </button>
    </form>
</div>
@endsection
