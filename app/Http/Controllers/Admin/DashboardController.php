<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $statistics = [
            'products_count' => Product::count(),
            'orders_count' => Order::count(),
            
            'total_revenue' => Order::sum('total_amount'),
        ];

        return view('dashboard', compact('statistics'));
    }
}
