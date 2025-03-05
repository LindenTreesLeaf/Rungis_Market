<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use Illuminate\Support\Facades\Gate;

class TypeController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Type::class);
        $types = Type::validated();
        return view('types.index', compact('types'));
    }

    public function create()
    {
        $this->authorize('create', Type::class);
        return view('types.create');
    }

    public function store(Request $request)
    {
        $type = Type::create($request->validated());
        return redirect()->route('types.show', ['type' => $type]);
    }

    public function show(Type $type)
    {
        $this->authorize('view', $type);
        return view('types.show', compact('type'));
    }

    public function edit(Type $type)
    {
        $this->authorize('update', $type);
        return view('types.edit', compact('type'));
    }

    public function update(Request $request, Type $type)
    {
        $type->update($request->validated());
        return redirect()->route('types.show', ['type' => $type]);
    }

    public function destroy(Type $type)
    {
        $this->authorize('delete', $type);
        $type->delete();
        return redirect()->route('types.index')->with('success', "Type supprimé avec succès.");
    }
}
