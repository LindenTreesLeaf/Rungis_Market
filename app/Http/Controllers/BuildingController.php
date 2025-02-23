<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Building;
use Illuminate\Support\Facades\Gatphp e;

class BuildingController extends Controller
{
    public function index()
    {
        $buildings = Building::all();
        return view('buildings.index', compact('buildings'));
    }

    public function create()
    {
        if (Gate::denies('create building')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de créer un bâtiment.");
        }
        return view('buildings.create');
    }

    public function store(Request $request)
    {
        if (Gate::denies('create building')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de créer un bâtiment.");
        }
        $building = Building::create($request->all());
        return redirect()->route('buildings.show', ['building' => $building]);
    }

    public function show(Building $building)
    {
        return view('buildings.show', compact('building'));
    }

    public function edit(Building $building)
    {
        if (Gate::denies('update building')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de modifier ce bâtiment.");
        }
        return view('buildings.edit', compact('building'));
    }

    public function update(Request $request, Building $building)
    {
        if (Gate::denies('update building')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de modifier ce bâtiment.");
        }
        $building->update($request->all());
        return redirect()->route('buildings.show', ['building' => $building]);
    }

    public function destroy(Building $building)
    {
        if (Gate::denies('delete building')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de supprimer ce bâtiment.");
        }
        $building->delete();
        return redirect()->route('buildings.index')->with('success', "Bâtiment supprimé avec succès.");
    }
}
