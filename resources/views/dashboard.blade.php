@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="row">
        <!-- Welcome Card -->
        <div class="col-12 mb-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h4 class="card-title">Dashboard</h4>
                    <p class="card-text">Welcome to the Store Management System</p>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="col-md-6 mb-4">
            <div class="card bg-info text-white h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title">Products</h6>
                            <h2 class="mb-0">{{ $statistics['products_count'] }}</h2>
                        </div>
                        <i class="bi bi-box fs-1"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card bg-success text-white h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title">Orders</h6>
                            <h2 class="mb-0">{{ $statistics['orders_count'] }}</h2>
                        </div>
                        <i class="bi bi-cart fs-1"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions Cards -->
        <div class="col-12 mt-4">
            <h5 class="mb-4">Quick Actions</h5>
            <div class="row g-4">
                <!-- Add Product Card -->
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-plus-circle text-primary" style="font-size: 3rem;"></i>
                            <h5 class="card-title mt-3">Add New Product</h5>
                            <p class="card-text text-muted">Add new products to the store</p>
                            <a href="{{ route('products.create') }}" class="btn btn-primary mt-3">
                                Add Product
                            </a>
                        </div>
                    </div>
                </div>

                <!-- View Products Card -->
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-grid text-info" style="font-size: 3rem;"></i>
                            <h5 class="card-title mt-3">View Products</h5>
                            <p class="card-text text-muted">Browse and edit existing products</p>
                            <a href="{{ route('products.index') }}" class="btn btn-info mt-3 text-white">
                                View Products
                            </a>
                        </div>
                    </div>
                </div>

                <!-- View Orders Card -->
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-cart-check text-success" style="font-size: 3rem;"></i>
                            <h5 class="card-title mt-3">Manage Orders</h5>
                            <p class="card-text text-muted">View and track customer orders</p>
                            <a href="{{ route('admin.orders.index') }}" class="btn btn-success mt-3">
                                View Orders
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        transition: transform 0.2s ease-in-out;
        border: none;
        border-radius: 10px;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .bi {
        transition: transform 0.3s ease;
    }

    .card:hover .bi {
        transform: scale(1.1);
    }

    .btn {
        border-radius: 20px;
        padding: 8px 20px;
        font-weight: 500;
    }

    .text-muted {
        font-size: 0.9rem;
    }
</style>
@endsection