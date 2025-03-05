<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;
use Illuminate\Support\Facades\Gate;

class EquipmentController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Equipment::class);
        $equipment = Equipment::validated();
        return view('equipment.index', compact('equipment'));
    }

    public function create()
    {
        $this->authorize('create', Equipment::class);
        return view('equipment.create');
    }

    public function store(Request $request)
    {
        $equipment = Equipment::create($request->validated());
        return redirect()->route('equipment.show', ['equipment' => $equipment]);
    }

    public function show(Equipment $equipment)
    {
        $this->authorize('view', $equipment);
        return view('equipment.show', compact('equipment'));
    }

    public function edit(Equipment $equipment)
    {
        $this->authorize('update', $equipment);
        return view('equipment.edit', compact('equipment'));
    }

    public function update(Request $request, Equipment $equipment)
    {
        $equipment->update($request->validated());
        return redirect()->route('equipment.show', ['equipment' => $equipment]);
    }

    public function destroy(Equipment $equipment)
    {
        $this->authorize('delete', $equipment);
        $equipment->delete();
        return redirect()->route('equipment.index')->with('success', "Équipement supprimé avec succès.");
    }
}
