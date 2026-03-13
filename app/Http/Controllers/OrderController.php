<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
   public function index()
{
    // Obtenemos solo los pedidos del usuario autenticado
    $orders = auth()->user()->orders()->with('items.product')->latest()->get();
    return view('orders.index', compact('orders'));
}
}
