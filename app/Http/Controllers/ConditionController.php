<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Condition;
use App\models\Equipment;
use App\Http\Requests\ConditionRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ConditionController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Condition $condition)
    {
        //
    }

    public function edit(Condition $condition)
    {
        //
    }

    public function update(ConditionRequest $request, string $id_cond)
    {
        $condition = Condition::findOrFail($id_cond);
        $this->authorize('update', $condition);
        $condition->update($request->validated());
        return back()->with('message', 'Condition modifiée.');
    }

    public function destroy(Condition $condition)
    {
        //
    }
}
