<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sector;
use App\Models\Building;
use App\Http\Requests\SectorRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SectorController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sector = Sector::findOrFail($id);
        $this->authorize('edit sector');
        return view('sectors.edit', ['sector'=>$sector,'buildings'=>Building::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SectorRequest $request, string $id)
    {
        $sector = Sector::findOrFail($id);
        $sector->update($request->validated());
        // Les buildings sont forcément dans un sector donc la gestion de la déselection n'est pas gérée.
        if ($request->has('buildings')) {
            $buildings_id = $request->input('buildings');
            foreach($buildings_id as $building_id){
                $building = Building::findOrFail($building_id);
                $building->sector()->associate($sector);
                $building->save();
            }
        }
        return redirect()->route('buildings.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
