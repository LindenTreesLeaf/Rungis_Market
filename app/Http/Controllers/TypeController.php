<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use Illuminate\Support\Facades\Gate;

class TypeController extends Controller
{
    public function index()
    {
        if (Gate::denies('see types')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de voir les types.");
        }
        $types = Type::all();
        return view('types.index', compact('types'));
    }

    public function create()
    {
        if (Gate::denies('create type')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de créer un type.");
        }
        return view('types.create');
    }

    public function store(Request $request)
    {
        if (Gate::denies('create type')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de créer un type.");
        }
        $type = Type::create($request->all());
        return redirect()->route('types.show', ['type' => $type]);
    }

    public function show(Type $type)
    {
        return view('types.show', compact('type'));
    }

    public function edit(Type $type)
    {
        if (Gate::denies('update type')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de modifier ce type.");
        }
        return view('types.edit', compact('type'));
    }

    public function update(Request $request, Type $type)
    {
        if (Gate::denies('update type')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de modifier ce type.");
        }
        $type->update($request->all());
        return redirect()->route('types.show', ['type' => $type]);
    }

    public function destroy(Type $type)
    {
        if (Gate::denies('delete type')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de supprimer ce type.");
        }
        $type->delete();
        return redirect()->route('types.index')->with('success', "Type supprimé avec succès.");
    }
}
