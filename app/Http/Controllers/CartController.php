<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Size;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = session()->get('cart', []);
        return view('cart.index', compact('cartItems'));
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'size' => 'required|exists:sizes,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($request->product_id);
        $size = Size::findOrFail($request->size);

        $cart = session()->get('cart', []);

        $cartItemId = $product->id . '-' . $size->id;

        if (isset($cart[$cartItemId])) {
            $cart[$cartItemId]['quantity'] += $request->quantity;
        } else {
            $cart[$cartItemId] = [
                "name" => $product->name,
                "quantity" => $request->quantity,
                "price" => $product->price,
                "size" => $size->size,
                "image" => $product->{'image-1'} // استخدم الصورة الأولى للمنتج
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'تمت إضافة المنتج إلى العربة');
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return response()->json(['success' => true]);
        }
    }

    public function clear()
    {
        session()->forget('cart');
        return response()->json(['success' => true]);
    }
    //
}