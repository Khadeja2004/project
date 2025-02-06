<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get();
        return view('orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = CompleteOrder::findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'address' => 'required',
            ]);

            $order = Order::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'total' => $this->getCartTotal(),
            ]);

            $cartItems = session()->get('cart', []);

            foreach ($cartItems as $id => $details) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $id,
                    'quantity' => $details['quantity'],
                    'price' => $details['price'],
                    'size' => $details['size'],
                ]);
            }

            return response()->json(['success' => true, 'message' => 'تم إنشاء الطلب بنجاح']);
        } catch (\Exception $e) {
            \Log::error('خطأ في إنشاء الطلب: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'حدث خطأ أثناء إنشاء الطلب: ' . $e->getMessage()], 500);
        }
    }
}
