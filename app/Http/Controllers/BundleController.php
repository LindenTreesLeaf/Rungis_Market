<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bundle;
use Illuminate\Support\Facades\Gate;

class BundleController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Bundle::class);
        $bundles = Bundle::all();
        return view('bundles.index', compact('bundles'));
    }

    public function create()
    {
        $this->authorize('create', Bundle::class);
        return view('bundles.create');
    }

    public function store(Request $request)
    {
        $bundle = Bundle::create($request->validated());
        return redirect()->route('bundles.show', ['bundle' => $bundle]);
    }

    public function show(Bundle $bundle)
    {
        return view('bundles.show',  ['bundle' => $bundle]);
        $this->authorize('view', $bundle);
        return view('bundles.show', compact('bundle'));
    }

    public function edit(Bundle $bundle)
    {
        $this->authorize('update', $bundle);
        return view('bundles.edit', compact('bundle'));
    }

    public function update(Request $request, Bundle $bundle)
    {
        $bundle->update($request->validated());
        return redirect()->route('bundles.show', ['bundle' => $bundle]);
    }

    public function destroy(Bundle $bundle)
    {
        $this->authorize('delete', $bundle);
        $bundle->delete();
        return redirect()->route('bundles.index')->with('success', "Bundle supprimé avec succès.");
    }
}
