<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Building;
use App\Models\Type;
use App\Models\Sector;
use App\Http\Requests\BuildingRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BuildingController extends Controller
{
    use AuthorizesRequests;
    
    public function index()
    {
        $this->authorize('viewAny', Building::class);
        return view('buildings.index', ['buildings'=>Building::orderBy('sector_id')->get(), 'sectors'=>Sector::orderBy('id')->get()]);
    }

    public function create()
    {
        $this->authorize('create', Building::class);
        return view('buildings.create',["types"=>Type::all(), "sectors"=>Sector::all()]);
    }

    public function store(BuildingRequest $request)
    {
        $validated = $request->validated();
        $building = Building::create($validated);
        if ($request->has('type_id') && $request->input('type_id') != -1) {
            $building->type_id = $request->input('type_id');
        } else {
            $building->type_id = null;
        }
        if ($request->has('sector_id') && $request->input('sector_id') != -1) {
            $building->sector_id = $request->input('sector_id');
        } else {
            $owner->sector_id = null;
        }
        return redirect()->route('buildings.show', $building);
    }

    public function show(string $id)
    {
        $building = Building::findOrFail($id);
        $this->authorize('view', $building);
        return view('buildings.show', compact('building'));
    }

    public function edit(string $id)
    {
        $building = Building::findOrFail($id);
        $this->authorize('update', $building);
        return view('buildings.edit', ["building"=>$building,"types"=>Type::all(), "sectors"=>Sector::all()]);
    }

    public function update(BuildingRequest $request, string $id)
    {
        $building = Building::findOrFail($id);
        $building->update($request->validated());
        if ($request->has('type_id') && $request->input('type_id') != -1) {
            $building->type_id = $request->input('type_id');
        } else {
            $building->type_id = null;
        }
        if ($request->has('sector_id') && $request->input('sector_id') != -1) {
            $building->sector_id = $request->input('sector_id');
        } else {
            $owner->sector_id = null;
        }
        return redirect()->route('buildings.show', ['building' => $building]);
    }

    public function destroy(string $id)
    {
        $building = Building::findOrFail($id);
        $this->authorize('delete', $building);
        foreach ($building->places as $place) {
            $place->delete();
        }
        foreach($building->equipments as $equipment){
            $equipment->delete();
        }
        $building->delete();
        return redirect()->route('buildings.index')->with('success', "Bâtiment supprimé avec succès.");
    }
}
