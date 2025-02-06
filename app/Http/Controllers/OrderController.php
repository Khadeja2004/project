<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        Log::info('بيانات الطلب المستلمة:', $request->all());

        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'phone' => 'required|string',
                'instagram_username' => 'nullable|string|max:255',
                'address' => 'required|string',
            ]);

            $cartItems = session()->get('cart', []);
            
            if (empty($cartItems)) {
                return response()->json(['success' => false, 'message' => 'العربة فارغة'], 400);
            }

            $totalAmount = 0;
            foreach ($cartItems as $item) {
                $totalAmount += $item['price'] * $item['quantity'];
            }

            $order = Order::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
                'instagram_username' => $validatedData['instagram_username'],
                'address' => $validatedData['address'],
                'items' => $cartItems,
                'total_amount' => $totalAmount
            ]);

            session()->forget('cart');

            return response()->json([
                'success' => true, 
                'message' => 'تم إنشاء الطلب بنجاح',
                'order_id' => $order->id
            ]);

        } catch (\Exception $e) {
            Log::error('خطأ في إنشاء الطلب: ' . $e->getMessage());
            return response()->json([
                'success' => false, 
                'message' => 'حدث خطأ أثناء إنشاء الطلب. يرجى المحاولة مرة أخرى.'
            ], 500);
        }
    }

}
