<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use Illuminate\Support\Facades\Gate;

class CardController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Card::class);
        $cards = Card::all();
        return view('cards.index', compact('cards'));
    }

    public function create()
    {
        $this->authorize('create', Card::class);
        return view('cards.create');
    }

    public function store(Request $request)
    {
        $card = Card::create($request->validated());
        return redirect()->route('cards.show', ['card' => $card]);
    }

    public function show(Card $card)
    {
        $this->authorize('view', $card);
        return view('cards.show', compact('card'));
    }

    public function edit(Card $card)
    {
        $this->authorize('update', $card);
        return view('cards.edit', compact('card'));
    }

    public function update(Request $request, Card $card)
    {
        $card->update($request->validated());
        return redirect()->route('cards.show', ['card' => $card]);
    }

    public function destroy(Card $card)
    {
        $this->authorize('delete', $card);
        $card->delete();
        return redirect()->route('cards.index')->with('success', "Carte supprimée avec succès.");
    }
}
