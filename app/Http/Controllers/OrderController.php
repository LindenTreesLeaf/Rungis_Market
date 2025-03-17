<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
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
        $this->authorize('create', Order::class);
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $order = Order::create($request->validated());
        return redirect()->route('orders.show', ['order' => $order]);
    }

    public function show(string $id)
    {
        $order = Order::findOrFail($id);
        $this->authorize('view', $order);
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $this->authorize('update', $order);
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $order->update($request->validated());
        return redirect()->route('orders.show', ['order' => $order]);
    }

    public function destroy(Order $order)
    {
        $this->authorize('delete', $order);
        $order->delete();
        return redirect()->route('orders.index')->with('success', "Commande supprimée avec succès.");
    }
}
