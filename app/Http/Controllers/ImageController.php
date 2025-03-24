<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Http\Requests\ImageRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ImageController extends Controller
{
    use AuthorizesRequests;
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Image::all();
        $this->authorize("viewAny", Image::class);
        return view('images.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ImageRequest $request)
    {
        $this->authorize('create', Image::class);
        $validated = $request->validated();
        $image = Image::create($validated);
        return back()->with('message', "L'URL vers l'image a bien été enregistrée.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ImageRequest $request, string $id)
    {
        $image = Image::findOrFail($id);
        $this->authorize('update', $image);
        $validated = $request->validated();
        $image->update($validated);
        return back()->with('message', "L'URL vers l'image a bien été modifiée.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $image = Image::findOrFail($id);
        $this->authorize('delete', $image);
        $image->delete();
        return back()->with('message', "L'URL a bien été supprimée.");
    }
}
