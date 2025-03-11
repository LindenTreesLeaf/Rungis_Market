<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;
use App\Models\Condition;
use App\Models\Building;
use App\Http\Requests\EquipmentRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EquipmentController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        //
    }

    public function create(string $id)
    {
        $building = Building::findOrFail($id);
        $this->authorize('create', Equipment::class);
        return view('equipment.create', ["conditions" => Condition::all(), 'building' => $building]);
    }

    public function store(EquipmentRequest $request)
    {
        $validated = $request->validated();
        $equipment = Equipment::create($validated);
        return redirect()->route('equipments.show', $equipment);
    }

    public function show(string $id)
    {
        $equipment = Equipment::findOrFail($id);
        $this->authorize('view', $equipment);
        return view('equipment.show', compact('equipment'));
    }

    public function edit(string $id)
    {
        $equipment = Equipment::findOrFail($id);
        $this->authorize('update', $equipment);
        return view('equipment.edit', ['equipment' => $equipment, "conditions" => Condition::all(), "building" => $equipment->building]);
    }

    public function update(EquipmentRequest $request, Equipment $equipment)
    {
        $equipment->update($request->validated());
        return redirect()->route('equipments.show', $equipment);
    }

    public function destroy(string $id)
    {
        $equipment = Equipment::findOrFail($id);
        $this->authorize('delete', $equipment);
        $equipment->delete();
        return back()->with('success', "Équipement supprimé avec succès.");
    }
}
