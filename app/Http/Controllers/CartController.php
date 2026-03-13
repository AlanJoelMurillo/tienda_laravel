<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;     
use App\Models\OrderItem; 
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CartController extends Controller
{
    // Mostrar el carrito
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        foreach($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('cart.index', compact('cart', 'total'));
    }

    // Añadir producto al carrito
    public function add(Product $product)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image_path
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Producto añadido al carrito');
    }

    // Eliminar un item
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', 'Producto eliminado');
        }
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);
        if(empty($cart)) return redirect()->route('store.index');

        $total = 0;
        foreach($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('cart.checkout', compact('cart', 'total'));
    }

    // He quitado los "use" que estaban aquí estorbando
    public function processPayment(Request $request)
    {
        $cart = session()->get('cart');
        if(!$cart) return redirect()->route('store.index');

        $total = 0;
        foreach($cart as $item) { 
            $total += $item['price'] * $item['quantity']; 
        }

        // 1. Crear el Pedido
        $order = Order::create([
            'user_id' => auth()->id(),
            'order_number' => 'ORD-' . strtoupper(Str::random(10)),
            'total_amount' => $total,
            'status' => 'completado'
        ]);

        // 2. Crear los Items del Pedido
        foreach($cart as $id => $details) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $details['quantity'],
                'price' => $details['price']
            ]);
            
            $product = Product::find($id);
            if($product) {
                $product->decrement('stock', $details['quantity']);
            }
        }

        session()->forget('cart');
        return view('cart.success', compact('order'));
    }
}