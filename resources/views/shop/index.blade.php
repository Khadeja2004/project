@extends('layouts.app')

@section('title', 'ageisegy_shop')

@section('content')
<div class="container mt-5">
    <!-- Filter Modal -->
    <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="filterModalLabel">Filter Products</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('shop.index') }}" method="GET">
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" 
                                   class="form-control" 
                                   id="name" 
                                   name="name" 
                                   value="{{ request('name') }}" 
                                   placeholder="Search by name...">
                        </div>
                        <div class="mb-3">
                            <label for="price_from" class="form-label">Price From</label>
                            <input type="number" 
                                   class="form-control" 
                                   id="price_from" 
                                   name="price_from" 
                                   value="{{ request('price_from') }}" 
                                   placeholder="Min price">
                        </div>
                        <div class="mb-3">
                            <label for="price_to" class="form-label">Price To</label>
                            <input type="number" 
                                   class="form-control" 
                                   id="price_to" 
                                   name="price_to" 
                                   value="{{ request('price_to') }}" 
                                   placeholder="Max price">
                        </div>
                        <button type="submit" class="btn btn-dark w-100">Apply Filter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <h1 class="collection-title text-center mb-4">COLLECTION</h1>
    <div class="row row-cols-2 row-cols-md-3 g-4">
        @if ($products->count() > 0)
        @foreach ($products as $product)
            <div class="col">
                <div class="card h-100">
                    <div class="card-img-wrapper">
                        <div class="description-badge">{{ $product->description }}</div>
                        <a href="{{ route('shop.show', $product->id) }}">
                            <img src="{{ Storage::url($product['image-1']) }}" class="card-img-top" alt="{{ $product->name }}">
                        </a>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title product-name">{{ $product->name }}</h5>
                        <p class="card-text fw-bold">{{ number_format($product->price, 2) }}L.E</p>
                        <p class="card-text discounted-price">{{ number_format($product['discount_price'], 2) }}L.E</p>
                    </div>
                </div>
            </div>
        @endforeach
        @else
        <div class="col" style="display: flex; justify-content: center; align-items: center; height: 100%;">
            <div class="card h-100" style="display: flex; justify-content: center; align-items: center; height: 100%;">
                <div class="card-body text-center">
                    <h5 class="card-title">NO PRODUCTS FOUND</h5>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

@section('styles')
<style>
    body {
        background-color: #ffffff;
    }

    :root {
        --primary-color: #000000;
        --secondary-color: #1a1a1a;
        --accent-color: #333333;
        --text-color: #ffffff;
        --light-bg: #f8f9fa;
        --border-color: #e9ecef;
    }

    /* Modal Styles */
    .modal-content {
        border-radius: 5px;
        border: none;
    }

    .modal-header {
        border-bottom: 1px solid var(--border-color);
    }

    .modal-title {
        color: var(--primary-color);
        font-weight: 600;
    }

    /* Button Styles */
    .btn-dark {
        background-color: var(--primary-color);
        border: none;
        padding: 8px 20px;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    .btn-dark:hover {
        background-color: var(--secondary-color);
        transform: translateY(-2px);
    }

    /* Form Styles */
    .form-label {
        color: var(--primary-color);
        font-weight: 500;
        font-size: 14px;
    }

    .form-control {
        border: 1px solid var(--border-color);
        padding: 8px 12px;
        font-size: 14px;
        border-radius: 4px;
    }

    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: none;
    }

    /* Collection Title */
    .collection-title {
        color: var(--primary-color);
        font-weight: 600;
        margin-bottom: 30px;
    }

    /* Card Styles */
    .card {
        border: none;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card-img-top {
        height: 300px;
        object-fit: cover;
    }

    .product-name {
        color: var(--primary-color);
        font-weight: 500;
        margin-bottom: 10px;
        position: relative;
        padding-bottom: 10px;
    }

    .product-name::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 40px;
        height: 2px;
        background-color: #000;
        transition: width 0.3s ease;
    }

    .card:hover .product-name::after {
        width: 60px;
    }

    .discounted-price {
        text-decoration: line-through;
        color: #999;
        font-size: 0.9em;
    }

    .description-badge {
        position: absolute;
        top: 20px;
        left: -60px;
        background: rgba(0, 0, 0, 0.9);
        color: #ffffff;
        width: 200px;
        padding: 5px 0;
        text-align: center;
        transform: rotate(-45deg);
        transform-origin: center;
        font-size: 0.85rem;
        font-weight: 600;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        animation: fadeInRotateLeft 0.5s ease-out;
    }

    @keyframes fadeInRotateLeft {
        from {
            opacity: 0;
            transform: rotate(-45deg) translateY(-100px);
        }
        to {
            opacity: 1;
            transform: rotate(-45deg) translateY(0);
        }
    }

    .card-img-wrapper {
        position: relative;
        overflow: hidden;
    }
</style>
@endsection