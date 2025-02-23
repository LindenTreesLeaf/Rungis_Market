<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Gate;

class OrderController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Order::class);
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $this->authorize('create', Order::class);
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $order = Order::create($request->all());
        return redirect()->route('orders.show', ['order' => $order]);
    }

    public function show(Order $order)
    {
        $this->authorize('viewAny', $order);
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $this->authorize('update', $order);
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $order->update($request->all());
        return redirect()->route('orders.show', ['order' => $order]);
    }

    public function destroy(Order $order)
    {
        $this->authorize('delete', $order);
        $order->delete();
        return redirect()->route('orders.index')->with('success', "Commande supprimée avec succès.");
    }
}
