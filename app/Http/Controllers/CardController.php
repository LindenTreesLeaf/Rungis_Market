<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use App\Http\Requests\CardRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CardController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Card::class);
        $cards = Card::all();
        return view('cards.index', compact('cards'));
    }

    public function create()
    {
        //
    }

    public function store(CardRequest $request)
    {
        Card::create($request->validated());
        return back();
    }

    public function show(Card $card)
    {
        //
    }

    public function edit(Card $card)
    {
        //
    }

    public function update(CardRequest $request, string $id)
    {
        $card = Card::findOrFail($id);
        $this->authorize('update', $card);
        $card->update($request->validated());
        return back()->with('message', "Carte modifiée avec succès.");
    }

    public function destroy(string $id)
    {
        $card = Card::findOrFail($id);
        $this->authorize('delete', $card);
        $card->delete();
        return redirect()->route('cards.index')->with('message', "Carte supprimée avec succès.");
    }

    public function reserve(string $id){
        $card = Card::findOrFail($id);
        $this->authorize('reserve', $card);
        $user = Auth::user();
        if($user->onGoingSubscription->count() >= 1)
            return back()->with('error', "Vous ne pouvez pas avoir plusieurs abonnements à la fois.");
        else{
            if($card->tier == "Acheteur" || $card->tier == "Vendeur")
                $enddate = date('Y-m-d', mktime(0,0,0,date('m')+1,date('d'),date('Y')));
            else
                $enddate = date('Y-m-d', mktime(0,0,0,date('m'),date('d')+7,date('Y')));
            $user->cards()->attach($card->id, [
                'start' => date('Y-m-d'),
                'end' => $enddate
            ]);

            if($card->tier == "Acheteur")
                $user->syncRoles(['client']);
            if($card->tier == "Vendeur")
                $user->syncRoles(['seller']);
            return back();
        }
    }

    public function resign(string $id){
        $card = Card::findOrFail($id);
        $user = Auth::user();
        $user->cards()->updateExistingPivot($card->id, ['end' => date('Y-m-d')]);
        return back()->with('message', "Abonnement résigné.");
    }
}
