<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Bundle;
use App\Models\Building;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class OrderController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $user = Auth::user();
        $this->authorize('viewAny', Order::class);
        $passedOrders = $user->passedOrders();
        $ongoingOrders = $user->ongoingOrders();
        return view('orders.index', ['passedOrders' => $passedOrders, 'ongoingOrders' => $ongoingOrders]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        $order = Order::findOrFail($id);
        $this->authorize('view', $order);
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
       //
    }

    public function update(Request $request, Order $order)
    {
        //
    }

    public function destroy(Order $order)
    {
        //
    }

    public function addToCart(string $id){
        $bundle = Bundle::findOrFail($id);
        $this->authorize("buy", $bundle);
        $user = Auth::user();

        //recherche si l'utilisateur à déjà un "panier"
        foreach($user->cards()->where('id', 1)->get() as $card){
            if($card->subscription->end > date('Y-m-d'))
                foreach($user->orders as $order){
                    if($order->state_id == 1)
                        $panier = $order;
                }
        }
        //création du panier s'il n'existe pas
        if(!isset($panier)){
            $panier = $user->orders()->create([
                'date_passed' => null,
                'date_retreive' => null,
                'state_id' => 1,
                'user_id' => $user->id,
            ]);
        }

        $panier->bundles()->attach($bundle);

        return back()->with('message', "Lot ajouté au panier.");
    }

    public function removeFromCart(string $id){
        $bundle = Bundle::findOrFail($id);
        $user = Auth::user();
        $panier = $user->orders()->where('state_id', 1)->first();
        $panier->bundles()->detach($bundle);
        return back();
    }

    public function buy(string $id){
        $order = Order::findOrFail($id);
        $order->state_id = 2;
        $order->date_passed = date('Y-m-d');
        $order->date_retrieve = date('Y-m-d', mktime(0,0,0,date('m'), date('d')+7, date('Y')));
        $order->building_id = Building::where('type_id', 3)->inRandomOrder()->first()->id;
        $order->save();
        return redirect()->route('orders.index')->with('message', "Commande commandée.");
    }

    public function cancel(string $id){
        $order = Order::findOrFail($id);
        $order->state_id = 4;
        $order->save();
        return back()->with('message', "Commande annulée.");
    }
}
