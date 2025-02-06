<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderStatus;
use Illuminate\Http\Request;

class OrderStatusController extends Controller
{
    public function update(Request $request, $orderId)
    {
        try {
            $order = Order::findOrFail($orderId);

            $status = new OrderStatus([
                'status' => $request->status,
                'notes' => $request->notes ?? null
            ]);

            $order->statuses()->save($status);

            return response()->json([
                'success' => true,
                'message' => 'تم تحديث حالة الطلب بنجاح',
                'newStatus' => $status->status
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء تحديث حالة الطلب: ' . $e->getMessage()
            ], 500);
        }
    }

    public function getLatestStatus($orderId)
    {
        $order = Order::findOrFail($orderId);
        $latestStatus = $order->latestStatus;

        return response()->json([
            'status' => $latestStatus ? $latestStatus->status : 'pending',
            'notes' => $latestStatus ? $latestStatus->notes : null
        ]);
    }

    public function test()
    {
        return response()->json(['message' => 'Test successful']);
    }

    public function deleteOrder($orderId)
    {
        try {
            $order = Order::findOrFail($orderId);
            $order->delete();

            return response()->json([
                'success' => true,
                'message' => 'تم حذف الطلب بنجاح'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء حذف الطلب: ' . $e->getMessage()
            ], 500);
        }
    }
}
