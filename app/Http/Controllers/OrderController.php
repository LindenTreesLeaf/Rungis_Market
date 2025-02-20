<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Gate;

class OrderController extends Controller
{
    public function index()
    {
        if (Gate::denies('see order')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de voir les commandes.");
        }
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        if (Gate::denies('create order')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de créer une commande.");
        }
        return view('orders.create');
    }

    public function store(Request $request)
    {
        if (Gate::denies('create order')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de créer une commande.");
        }
        $order = Order::create($request->all());
        return redirect()->route('orders.show', ['order' => $order]);
    }

    public function show(Order $order)
    {
        if (Gate::denies('see order')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de voir cette commande.");
        }
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        if (Gate::denies('edit order')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de modifier cette commande.");
        }
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        if (Gate::denies('edit order')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de modifier cette commande.");
        }
        $order->update($request->all());
        return redirect()->route('orders.show', ['order' => $order]);
    }

    public function destroy(Order $order)
    {
        if (Gate::denies('delete order')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de supprimer cette commande.");
        }
        $order->delete();
        return redirect()->route('orders.index')->with('success', "Commande supprimée avec succès.");
    }
}
