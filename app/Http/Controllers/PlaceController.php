<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;
use Illuminate\Support\Facades\Gate;

class PlaceController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Place::class);
        $places = Place::validated();
        return view('places.index', compact('places'));
    }

    public function create()
    {
        $this->authorize('create', Place::class);
        return view('places.create');
    }

    public function store(Request $request)
    {
        if (Gate::denies('create place')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de créer un lieu.");
        }
        $place = Place::create($request->validated());
        return redirect()->route('places.show', ['place' => $place]);
    }

    public function show(Place $place)
    {
        $this->authorize('view', $place);
        return view('places.show', compact('place'));
    }

    public function edit(Place $place)
    {
        $this->authorize('update', $place);
        return view('places.edit', compact('place'));
    }

    public function update(Request $request, Place $place)
    {
        $place->update($request->validated());
        return redirect()->route('places.show', ['place' => $place]);
    }

    public function destroy(Place $place)
    {
        $this->authorize('delete', $place);
        $place->delete();
        return redirect()->route('places.index')->with('success', "Lieu supprimé avec succès.");
    }

    public function getAvailablePlaces($buildingId)
    {
        $places = Place::where('building_id', $buildingId)
        ->where('status', 'available') 
        ->get();
        return response()->json(['places' => $places]);
    }

}
