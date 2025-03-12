<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;
use App\Models\Building;
use App\Models\User;
use App\Http\Requests\PlaceRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PlaceController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Place::class);
        $user = Auth::user();
        $places = $user->places()->get();
        return view('places.index', compact('places'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request, string $id)
    {
        $building = Building::findOrFail($id);
        $this->authorize('create', Place::class);
        //pour éviter une boucle infinie (c'est du vécu...)
        $debut = $building->places()->count();
        $fin = $debut + $request->input('number');
        for($i = $debut ; $i < $fin ; $i++)
            $place = Place::create(
                ['name' => ($building->name).(string)($i),
                'building_id' => $building->id,
                'user_id' => null]
            );
        return back();
    }

    public function show(Place $place)
    {
        //
    }

    public function edit(string $id)
    {
        $place = Place::findOrFail($id);
        $this->authorize('update', $place);
        return view('places.edit', ['place' => $place, 'sellers' => User::role('seller')->get()]);
    }

    public function update(PlaceRequest $request, string $id)
    {
        $place = Place::findOrFail($id);
        $place->update($request->validated());
        return redirect()->route('buildings.show', $place->building);
    }

    public function destroy(string $id)
    {
        $place = Place::findOrFail($id);
        $this->authorize('delete', $place);
        $place->delete();
        return back()->with('success', "Place supprimée avec succès.");
    }
}
