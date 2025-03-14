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
        $debut = $building->places()->count()+1;
        $fin = $debut + $request->input('number');
        for($i = $debut ; $i < $fin ; $i++)
            $place = Place::create(
                ['name' => ($building->name).(string)($i),
                'building_id' => $building->id,]
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
        if($request->input('user_id') != -1){
            $user = User::findOrFail($request->input('user_id'));
            $place->users()->sync([$user->id => ['end' => date('Y-m-d', mktime(0,0,0,date('m'),date('d')+5,date('Y')))]]);
        }
        else
            $place->users()->detach();
        return redirect()->route('buildings.show', $place->building);
    }

    public function destroy(string $id)
    {
        $place = Place::findOrFail($id);
        $this->authorize('delete', $place);
        $place->delete();
        return back()->with('success', "Place supprimée avec succès.");
    }

    public function reserve(string $id){
        $place = Place::findOrFail($id);
        $this->authorize('reserve', $place);

        //suppression des réservations de plus d'un mois de la BDD ; à voir si on garde ou pas
        $expire = date('Y-m-d', mktime(0,0,0,date('m')-1,date('d'),date('Y')));
        $max = date('Y-m-d', mktime(0,0,0,date('m'),date('d')+5,date('Y')));
        foreach($place->users as $user){
            if($user->reservation->end < $expire)
                $user->places()->wherePivotNotBetween('end', [$expire,$max])->detach($place->id);
        }

        //réservation
        $user = Auth::user();
        if($user->places->count() < 5){
            $user->places()->attach($place->id, ['end' => $max]);
            return back()->with('message', "Place réservée avec succès.");
        }
        
        return back();
    }
}
