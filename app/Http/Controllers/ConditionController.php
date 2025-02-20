 <?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Condition;
use Illuminate\Support\Facades\Gate;

class ConditionController extends Controller
{
    public function index()
    {
        if (Gate::denies('see condition')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de voir les conditions.");
        }
        $conditions = Condition::all();
        return view('conditions.index', compact('conditions'));
    }

    public function create()
    {
        if (Gate::denies('create condition')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de créer une condition.");
        }
        return view('conditions.create');
    }

    public function store(Request $request)
    {
        if (Gate::denies('create condition')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de créer une condition.");
        }
        $condition = Condition::create($request->all());
        return redirect()->route('conditions.show', ['condition' => $condition]);
    }

    public function show(Condition $condition)
    {
        if (Gate::denies('see condition')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de voir cette condition.");
        }
        return view('conditions.show', compact('condition'));
    }

    public function edit(Condition $condition)
    {
        if (Gate::denies('edit condition')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de modifier cette condition.");
        }
        return view('conditions.edit', compact('condition'));
    }

    public function update(Request $request, Condition $condition)
    {
        if (Gate::denies('edit condition')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de modifier cette condition.");
        }
        $condition->update($request->all());
        return redirect()->route('conditions.show', ['condition' => $condition]);
    }

    public function destroy(Condition $condition)
    {
        if (Gate::denies('delete condition')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de supprimer cette condition.");
        }
        $condition->delete();
        return redirect()->route('conditions.index')->with('success', "Condition supprimée avec succès.");
    }
}
