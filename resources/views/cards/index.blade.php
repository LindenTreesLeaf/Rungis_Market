@extends('layouts.app')

@section('title') Abonnements @endsection

@section('content')
    <div class="container">
        @if(session('message'))
            <div class="alert alert-success" role="alert">{{ session('message') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
        @endif
        <div class="row">
            <h1 class="text-center mb-4 mt-2">Abonnements</h1>
        </div>
        @can('create', App\Models\Card::class)
            <div class="row my-1">
                <div class="col-3">
                    <button type="button" class="btn btn-primary p-1 font-semibold" data-bs-toggle="modal" data-bs-target="#createModal">+ Ajouter une carte</button>
                </div>
                <x-bootstrap.createModal>
                    <x-slot:id>createModal</x-slot>
                    <x-slot:title>Création d'une carte</x-slot>
                    <x-slot:slot>
                        <div class="row">
                            <form action="{{route('cards.store')}}" method="post">
                                @csrf
                                <div class="mb-3 row">
                                <div class="row"><label for="tier" class="form-label">Nom de la carte :</label></div>
                                <div class="row"><input type="text" name="tier" id="tier" required class="form-control @error('tier') is-invalid @enderror" placeholder="Saisir le nom de la carte" autofocus></div>
                                    @error('tier')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <button type="submit" class="btn btn-success btn-sm">Confirmer</button>
                                    </div>
                                    <div class="col-2">
                                        <span class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Annuler</span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </x-slot>
                </x-bootstrap>
            </div>
        @endcan
        <div class="row">
            @foreach($cards as $card)
                <div class="col my-1">
                    <div class="card border-light">
                        <div class="card-body contentdisplay">
                            <div class="card-title cardtitleborder">Tier : {{$card->tier}}</div>
                            @if($card->tier == $cards[0]->tier)
                                <p>
                                    Abonnement pour les professionnels voulant venir acheter sur le marché. Donne un accès à l'ensemble
                                    du marché et de ses vendeur(euse)s. L'abonnement à une validité d'un mois et nécessite un 
                                    justificatif de profession.
                                </p>
                            @elseif($card->tier == $cards[1]->tier)
                                <p>
                                    Abonnement pour les professionnels voulant proposer leurs produits sur le marché. Permet de réserver
                                    jusqu'à 5 emplacements sur le marché. L'abonnement à une validité d'un mois et nécessite un
                                    justificatif de profession.
                                </p>
                            @elseif($card->tier == $cards[2]->tier)
                                <p>
                                    Si vous n'êtes pas encore sûr de vouloir acheter sur le marché, vous pouvez prendre un abonnement
                                    Découverte pour vous venir voir par vous même. L'abonnement ne dure que quelques jours mais vous
                                    ne pourrez pas acheter sur le marché. Ne peut être réservé plus d'une fois.
                                </p>
                            @endif
                            @unlessrole('admin|supervisor')
                                <a href="{{ route('card.reserve', $card->id) }}" class="btn btn-primary p-1 font-semibold">Réserver</a>
                            @endunlessrole
                            @can('update', $card)
                                <button type="button" class="btn btn-sm btn-outline-warning mb-1" data-bs-toggle="modal" data-bs-target="#editModal_{{$card->id}}"><i class="bi bi-pencil-square"></i></button>
                            @endcan
                            @can('delete', $card)
                                <button type="button" class="btn btn-sm btn-outline-dark mb-1" data-bs-toggle="modal" data-bs-target="#deleteModal_{{$card->id}}"><i class="bi bi-trash"></i></button>
                            @endcan
                        </div>
                    </div>
                </div>
                <x-bootstrap.editModal>
                    <x-slot:id>editModal_{{$card->id}}</x-slot>
                    <x-slot:title>Edition de la carte {{$card->tier}}</x-slot>
                    <x-slot:slot>
                        <div class="row">
                            <form action="{{route('cards.update', $card->id)}}" method="post">
                                @csrf
                                @method('put')
                                <div class="mb-3 row">
                                    <div class="row"><label for="tier" class="form-label">Nom de la carte :</label></div>
                                    <div class="row"><input type="text" name="tier" id="tier" required class="form-control @error('tier') is-invalid @enderror" placeholder="Saisir le nom de la carte" value="{{ old('tier', $card->tier ?? '') }}" autofocus></div>
                                    @error('tier')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <button type="submit" class="btn btn-success btn-sm">Confirmer</button>
                                    </div>
                                    <div class="col-2">
                                        <span class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Annuler</span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </x-slot>
                </x-bootstrap>
                <x-bootstrap.deleteModal>
                    <x-slot:id>deleteModal_{{$card->id}}</x-slot>
                    <x-slot:title>Voulez-vous supprimer la carte {{$card->tier}} ?</x-slot>
                    <x-slot:slot>
                        <div class="row">
                            <div class="col-1">
                                <form action="{{route('cards.destroy', $card->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-primary mb-1">Oui</button>
                                </form>
                            </div>
                            <div class="col-1">
                                <button class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Non</button>
                            </div>
                        </div>
                    </x-slot>
                </x-bootstrap>
            @endforeach
        </div>
        @if(Auth::user()->cards()->count() > 0)
            <div class="row">
                <div class="card border-light my-2">
                    <div class="card-body">
                        <div class="card-title cardtitleborder">Vos abonnements :</div>
                        <!--Actuellement ne contient qu'une seule carte, mais pas impossible d'en avoir plusieurs par le futur-->
                        @foreach(Auth::user()->onGoingSubscription as $card)
                            <div class="mb-2">
                                <div class="textcolorhighlight fs-5">En cours</div>
                                <div class="row">
                                    <div class="col-10">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="textcolorinfo">Tier :</div>
                                            </div>
                                            <div class="col">
                                                {{$card->tier}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="textcolorinfo">Fin de validité :</div>
                                            </div>
                                             <div class="col">
                                                {{date('d/m/Y', strtotime($card->subscription->end))}}
                                            </div>
                                        </div>
                                    </div>
                                    @if($card->subscription->end > date('Y-m-d'))
                                        <div class="col-2 justify-content-end">
                                            <a href="{{ route('card.resign', $card->id) }}" class="btn btn-outline-dark p-1 font-semibold">Résigner</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                        @foreach(Auth::user()->endedSubscription as $card)
                            <div class="mb-2">
                                <div class="textcolorhighlight fs-5">Terminés</div>
                                <div class="row">
                                    <div class="col-10">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="textcolorinfo">Tier :</div>
                                            </div>
                                            <div class="col">
                                                {{$card->tier}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="textcolorinfo">Début de validité :</div>
                                            </div>
                                             <div class="col">
                                                {{date('d/m/Y', strtotime($card->subscription->start))}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="textcolorinfo">Fin de validité :</div>
                                            </div>
                                             <div class="col">
                                                {{date('d/m/Y', strtotime($card->subscription->end))}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection