<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Condition;
use Illuminate\Support\Facades\Gate;

class ConditionController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Condition::class);
        $conditions = Condition::all();
        return view('conditions.index', compact('conditions'));
    }

    public function create()
    {
        $this->authorize('create', Condition::class);
        return view('conditions.create');
    }

    public function store(Request $request)
    {
        $condition = Condition::create($request->all());
        return redirect()->route('conditions.show', ['condition' => $condition]);
    }

    public function show(Condition $condition)
    {
        $this->authorize('view', $condition);
        return view('conditions.show', compact('condition'));
    }

    public function edit(Condition $condition)
    {
        $this->authorize('update', $condition);
        return view('conditions.edit', compact('condition'));
    }

    public function update(Request $request, Condition $condition)
    {
        $condition->update($request->all());
        return redirect()->route('conditions.show', ['condition' => $condition]);
    }

    public function destroy(Condition $condition)
    {
        $this->authorize('delete', Condition::class);
        $condition->delete();
        return redirect()->route('conditions.index')->with('success', "Condition supprimée avec succès.");
    }
}
