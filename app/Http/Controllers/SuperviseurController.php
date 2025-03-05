<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Building;
use App\Models\Place;
use App\Models\Equipment;
use App\Models\Order;

class SuperviseurController extends Controller
{
    public function dashboard()
    {
        // Récupération des statistiques
        $totalBuildings = Building::count();
        $totalPlaces = Place::count();
        $totalEquipments = Equipment::count();

        // Récupération des dernières commandes
        $recentOrders = Order::with('user')->latest()->take(5)->get();

        // Envoyer les données à la vue
        return view('dashboard', compact('totalBuildings', 'totalPlaces', 'totalEquipments', 'recentOrders'));
    }
}
