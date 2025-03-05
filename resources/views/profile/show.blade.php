@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-white">Mon Profil</h1>
    
    <div class="card">
        <div class="card-body">
            <h3>Informations Personnelles</h3>
            <p><strong>Nom :</strong> {{ Auth::user()->name }}</p>
            <p><strong>Email :</strong> {{ Auth::user()->email }}</p>
            <p><strong>Adresse :</strong> {{ Auth::user()->address }}</p>
            <p><strong>Numéro de téléphone :</strong> {{ Auth::user()->phone_number }}</p>

            <
            <a href="{{ route('profile.edit') }}" class="btn btn-primary">Modifier</a>
        </div>
    </div>
</div>
@endsection
