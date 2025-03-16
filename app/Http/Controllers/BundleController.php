<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bundle;
use App\Models\Sector;
use App\Models\User;
use App\Http\Requests\BundleRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BundleController extends Controller
{
    use AuthorizesRequests;

    public function index(string $id)
    {
        $sector = Sector::findOrFail($id);
        $bundles = Bundle::where('sector_id', $sector->id)->get();
        return view('bundles.index', compact('bundles'));
    }

    public function create()
    {
        $this->authorize('create', Bundle::class);
        return view('buildings.index', ['sectors' => Sector::all()]);
    }

    public function store(BundleRequest $request)
    {
        $bundle = Bundle::create($request->validated());
        return redirect()->route('bundles.show', ['bundle' => $bundle]);
    }

    public function show(string $id)
    {
        $user = User::findOrFail($id);
        $this->authorize('view', Bundle::class);
        $bundles = $user->bundles;
        return view('bundles.show', compact('bundles'));
    }

    public function edit(string $id)
    {
        $bundle = Bundle::findOrFail($id);
        $this->authorize('update', $bundle);
        return view('bundles.edit', ['bundle' => $bundle, 'sectors' => Sector::all()]);
    }

    public function update(BundleRequest $request, string $id)
    {
        $bundle = Bundle::findOrFail($id);
        $validated = $request->validated();
        $bundle->update($validated);
        return redirect()->route('bundles.show', $bundle->user->id);
    }

    public function destroy(string $id)
    {
        $this->authorize('delete', $bundle);
        $bundle->delete();
        return redirect()->route('bundles.index')->with('success', "Bundle supprimé avec succès.");
    }

    public function sell(string $id){
        $bundle = Bundle::findOrFail($id);
        $this->authorize('sell', $bundle);
        $bundle->validated = !$bundle->validated;
        $bundle->save();
        if($bundle->validated == 1)
            return back()->with('message', "Produit mis en vente.");
        else
            return back()->with('message', "Produit retiré de la vente.");
    }
}
