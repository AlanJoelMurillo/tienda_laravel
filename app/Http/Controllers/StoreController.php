<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(Request $request)
    {
        // Cargamos las categorías para el menú lateral/filtro
        $categories = Category::all();

        // Query base: solo productos con stock (si quieres) y cargando su categoría
        $query = Product::with('category');

        // Filtro por categoría opcional
        if ($request->has('category')) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $products = $query->latest()->paginate(12);

        return view('store.index', compact('products', 'categories'));
    }

    public function show(Product $product)
    {
        return view('store.show', compact('product'));
    }
}
