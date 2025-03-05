<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function show()
    {
        return view('profile.show'); // Affiche la vue show.blade.php
    }

    // Affiche le formulaire de modification du profil
    public function edit()
    {
        return view('profile.edit'); // Affiche la vue edit.blade.php
    }

    // Met à jour les informations du profil
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'password' => 'nullable|confirmed|min:8',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone_number = $request->phone_number;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('profile.show')->with('success', 'Profil mis à jour avec succès!');
    }

    // Supprime le profil de l'utilisateur
    public function destroy()
    {
        $user = Auth::user();
        $user->delete();

        Auth::logout();

        return redirect()->route('home')->with('success', 'Votre profil a été supprimé.');
    }
}
