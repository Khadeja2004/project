@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <!-- Products Grid -->
    <div class="row g-4">
        @foreach ($products as $product)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100">
                    <img src="{{ asset('/storage/' . $product->{'image-1'}) }}" 
                         class="card-img-top" 
                         alt="{{ $product->name }}"
                         style="height: 200px; object-fit: cover;">
                    
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <div class="mb-2">
                            @if($product->discount_price > $product->price)
                                <p class="text-muted mb-1">
                                    <del>{{ number_format($product->discount_price, 2) }} ج.م</del>
                                </p>
                                <p class="text-success fw-bold">
                                    {{ number_format($product->price, 2) }} ج.م
                                </p>
                            @else
                                <p class="fw-bold">
                                    {{ number_format($product->price, 2) }} ج.م
                                </p>
                            @endif
                        </div>
                        <p class="card-text">
                            <span class="badge bg-{{ $product->stock > 0 ? 'success' : 'danger' }}">
                                {{ $product->stock > 0 ? 'متوفر' : 'غير متوفر' }}
                            </span>
                            <span class="ms-2">المخزون: {{ $product->stock }}</span>
                        </p>
                    </div>

                    <div class="card-footer bg-transparent border-top-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{ route('products.edit', $product->id) }}" 
                                   class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil"></i>
                                    تعديل
                                </a>
                                <a href="{{ route('products.show', $product->id) }}" 
                                   class="btn btn-sm btn-outline-secondary">
                                    <i class="bi bi-eye"></i>
                                    عرض
                                </a>
                            </div>
                            <form action="{{ route('products.destroy', $product->id) }}" 
                                  method="POST" 
                                  class="d-inline"
                                  onsubmit="return confirm('هل أنت متأكد من حذف هذا المنتج؟')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i>
                                    حذف
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<style>
    .card {
        transition: transform 0.2s ease-in-out;
        border: none;
        border-radius: 10px;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.15);
    }

    .btn-group .btn {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
    }

    .btn-group .btn i {
        margin-left: 0.25rem;
    }

    .badge {
        padding: 0.5em 0.75em;
        font-weight: 500;
    }

    .card-title {
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .text-muted del {
        font-size: 0.9rem;
    }
</style>
@endsection