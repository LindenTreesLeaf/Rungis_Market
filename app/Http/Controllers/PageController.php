<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Méthode pour la page À propos de nous
    public function about()
    {
        return view('about'); // Cela va charger la vue 'about.blade.php'
    }

    // Méthode pour la page de contact
    public function contact()
    {
        return view('contact'); // Cela va charger la vue 'contact.blade.php'
    }
}
