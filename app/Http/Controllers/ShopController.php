<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
   public function index(Request $request)
   {
    $query = Product::query();

    // Filter by name
    if ($request->filled('name')) {
        $query->where('name', 'LIKE', '%' . $request->name . '%');
    }

    // Filter by price range
    if ($request->filled('price_from')) {
        $query->where('price', '>=', (float)$request->price_from);
    }
    
    if ($request->filled('price_to')) {
        $query->where('price', '<=', (float)$request->price_to);
    }

    $products = $query->get();

    return view('shop.index', compact('products'));
   }
   public function show($id)
   {
    $product = Product::findOrFail($id);
    return view('shop.show', compact('product'));
   }

   public function search(Request $request)
   {
    $query = $request->input('query');
    $products = Product::where('name', 'like', "%$query%")
                       ->orWhere('description', 'like', "%$query%")
                       ->paginate(12);
    
    return view('shop.index', compact('products', 'query'));
   }
}
