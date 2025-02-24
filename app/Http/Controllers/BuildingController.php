<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Building;
use Illuminate\Support\Facades\Gate;

class BuildingController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Building::class);
        $buildings = Building::all();
        return view('buildings.index', compact('buildings'));
    }

    public function create()
    {
        $this->authorize('create', Building::class);
        return view('buildings.create');
    }

    public function store(Request $request)
    {
        $building = Building::create($request->validated());
        return redirect()->route('buildings.show', ['building' => $building]);
    }

    public function show(Building $building)
    {
        $this->authorize('view', $building);
        return view('buildings.show', compact('building'));
    }

    public function edit(Building $building)
    {
        $this->authorize('update', $building);
        return view('buildings.edit', compact('building'));
    }

    public function update(Request $request, Building $building)
    {
        $building->update($request->validated());
        return redirect()->route('buildings.show', ['building' => $building]);
    }

    public function destroy(Building $building)
    {
        $this->authorize('delete', $building);
        $building->delete();
        return redirect()->route('buildings.index')->with('success', "Bâtiment supprimé avec succès.");
    }
}
