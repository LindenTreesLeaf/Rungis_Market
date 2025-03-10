<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Http\Requests\TypeRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TypeController extends Controller
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

    public function show(Type $type)
    {
        //
    }

    public function edit(Type $type)
    {
        //
    }

    public function update(TypeRequest $request, string $id)
    {
        $type = Type::findOrFail($id);
        $this->authorize('update', $type);
        $type->update($request->validated());
        return redirect()->route('buildings.index');
    }

    public function destroy(Type $type)
    {
        //
    }
}
