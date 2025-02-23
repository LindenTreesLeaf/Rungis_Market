<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;
use Illuminate\Support\Facades\Gate;

class EquipmentController extends Controller
{
    public function index()
    {
        if (Gate::denies('see equipment')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de voir les équipements.");
        }
        $equipment = Equipment::all();
        return view('equipment.index', compact('equipment'));
    }

    public function create()
    {
        if (Gate::denies('create equipment')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de créer un équipement.");
        }
        return view('equipment.create');
    }

    public function store(Request $request)
    {
        if (Gate::denies('create equipment')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de créer un équipement.");
        }
        $equipment = Equipment::create($request->all());
        return redirect()->route('equipment.show', ['equipment' => $equipment]);
    }

    public function show(Equipment $equipment)
    {
        if (Gate::denies('see equipment')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de voir cet équipement.");
        }
        return view('equipment.show', compact('equipment'));
    }

    public function edit(Equipment $equipment)
    {
        if (Gate::denies('update equipment')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de modifier cet équipement.");
        }
        return view('equipment.edit', compact('equipment'));
    }

    public function update(Request $request, Equipment $equipment)
    {
        if (Gate::denies('update equipment')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de modifier cet équipement.");
        }
        $equipment->update($request->all());
        return redirect()->route('equipment.show', ['equipment' => $equipment]);
    }

    public function destroy(Equipment $equipment)
    {
        if (Gate::denies('delete equipment')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de supprimer cet équipement.");
        }
        $equipment->delete();
        return redirect()->route('equipment.index')->with('success', "Équipement supprimé avec succès.");
    }
}
