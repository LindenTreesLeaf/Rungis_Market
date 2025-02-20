<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bundle;
use Illuminate\Support\Facades\Gate;

class BundleController extends Controller
{
    public function index()
    {
        // Ajoutez ici la logique pour afficher tous les bundles si nécessaire
    }

    public function create()
    {
        if (Gate::denies('create bundle')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de créer un bundle.");
        }
        return view('bundles.create');
    }

    public function store(Request $request)
    {
        if (Gate::denies('create bundle')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de créer un bundle.");
        }
        $bundle = Bundle::create($request->all());
        return redirect()->route('bundles.show', ['bundle' => $bundle]);
    }

    public function show(Bundle $bundle)
    {
        return view('bundles.show', compact('bundle'));
    }

    public function edit(Bundle $bundle)
    {
        if (Gate::denies('edit bundle')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de modifier ce bundle.");
        }
        return view('bundles.edit', compact('bundle'));
    }

    public function update(Request $request, Bundle $bundle)
    {
        if (Gate::denies('edit bundle')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de modifier ce bundle.");
        }
        $bundle->update($request->all());
        return redirect()->route('bundles.show', ['bundle' => $bundle]);
    }

    public function destroy(Bundle $bundle)
    {
        if (Gate::denies('delete bundle')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de supprimer ce bundle.");
        }
        $bundle->delete();
        return redirect()->route('bundles.index')->with('success', "Bundle supprimé avec succès.");
    }
}
