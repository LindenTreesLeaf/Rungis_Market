<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;
use Illuminate\Support\Facades\Gate;

class PlaceController extends Controller
{
    public function index()
    {
        if (Gate::denies('see place')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de voir les lieux.");
        }
        $places = Place::all();
        return view('places.index', compact('places'));
    }

    public function create()
    {
        if (Gate::denies('create place')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de créer un lieu.");
        }
        return view('places.create');
    }

    public function store(Request $request)
    {
        if (Gate::denies('create place')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de créer un lieu.");
        }
        $place = Place::create($request->all());
        return redirect()->route('places.show', ['place' => $place]);
    }

    public function show(Place $place)
    {
        if (Gate::denies('see place')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de voir ce lieu.");
        }
        return view('places.show', compact('place'));
    }

    public function edit(Place $place)
    {
        if (Gate::denies('update place')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de modifier ce lieu.");
        }
        return view('places.edit', compact('place'));
    }

    public function update(Request $request, Place $place)
    {
        if (Gate::denies('update place')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de modifier ce lieu.");
        }
        $place->update($request->all());
        return redirect()->route('places.show', ['place' => $place]);
    }

    public function destroy(Place $place)
    {
        if (Gate::denies('delete place')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de supprimer ce lieu.");
        }
        $place->delete();
        return redirect()->route('places.index')->with('success', "Lieu supprimé avec succès.");
    }
}
