<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use Illuminate\Support\Facades\Gate;

class CardController extends Controller
{
    public function index()
    {
        // Ajoutez ici la logique pour afficher toutes les cartes si nécessaire
    }

    public function create()
    {
        if (Gate::denies('create card')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de créer une carte.");
        }
        return view('cards.create');
    }

    public function store(Request $request)
    {
        if (Gate::denies('create card')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de créer une carte.");
        }
        $card = Card::create($request->all());
        return redirect()->route('cards.show', ['card' => $card]);
    }

    public function show(Card $card)
    {
        return view('cards.show', compact('card'));
    }

    public function edit(Card $card)
    {
        if (Gate::denies('edit card')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de modifier cette carte.");
        }
        return view('cards.edit', compact('card'));
    }

    public function update(Request $request, Card $card)
    {
        if (Gate::denies('edit card')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de modifier cette carte.");
        }
        $card->update($request->all());
        return redirect()->route('cards.show', ['card' => $card]);
    }

    public function destroy(Card $card)
    {
        if (Gate::denies('delete card')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de supprimer cette carte.");
        }
        $card->delete();
        return redirect()->route('cards.index')->with('success', "Carte supprimée avec succès.");
    }
}
