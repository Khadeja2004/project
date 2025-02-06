@extends('layouts.app')

@section('title', $product->name . ' -  agiesegy_shop')

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa:wght@400;700&family=Baskervville+SC&family=Oswald:wght@200..700&display=swap" rel="stylesheet">
<style>
    body {
        background-color: #fafafa;
    }

    .product-container {
        background-color: white;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
        margin-bottom: 30px;
    }

    .swiper-container {
        width: 100%;
        height: 400px;
        border-radius: 10px;
        overflow: hidden;
    }

    .swiper-slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .swiper-button-next, .swiper-button-prev {
        color: #333 !important;
    }

    .swiper-pagination-bullet-active {
        background-color: #333 !important;
    }

    .size-btn {
        border: 2px solid #333;
        background-color: white;
        color: #333;
        padding: 8px 16px;
        margin: 5px;
        border-radius: 20px;
        transition: all 0.3s ease;
    }

    .size-btn:hover, .size-btn.active {
        background-color: #333;
        color: white;
    }

    .btn-add-to-cart {
        background-color: white;
        color: #333;
        border: 2px solid #333;
        transition: all 0.3s ease;
        padding: 10px 30px;
        border-radius: 25px;
    }

    .btn-add-to-cart:hover {
        background-color: #333;
        color: white;
    }

    .shipping-policy {
        background-color: white;
        border-radius: 10px;
        padding: 20px;
        margin-top: 30px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }

    .shipping-policy h3 {
        color: #333;
        margin-bottom: 15px;
        border-bottom: 3px solid #333;
        display: inline-block;
        padding-bottom: 5px;
    }

    .shipping-policy p {
        margin-bottom: 10px;
        color: #333;
    }

    .shipping-policy ul {
        padding-left: 20px;
        color: #333;
    }

    .discounted-price {
        text-decoration: line-through;
        color: #999;
        font-size: 0.9em;
    }

    h1 {
        font-family: "Oswald", sans-serif;
        font-weight: 500;
        display: inline-block;
        border-bottom: 1px solid #999999;
        padding-bottom: 2px;
    }

    .product-description {
        color: #333;
        line-height: 1.6;
    }

    .price {
        color: #333;
        font-size: 1.5rem;
        font-weight: bold;
    }

    /* للخط Oswald */
    .oswald-heading {
        font-family: "Oswald", sans-serif;
        font-optical-sizing: auto;
        font-weight: 500; /* يمكنك اختيار وزن من 200 إلى 700 */
        font-style: normal;
    }

    /* للخط Baskervville SC */
    .baskervville-sc-regular {
        font-family: "Baskervville SC", serif;
        font-weight: 400;
        font-style: normal;
    }

    /* للخط Aref Ruqaa */
    .aref-ruqaa-regular {
        font-family: "Aref Ruqaa", serif;
        font-weight: 400;
        font-style: normal;
    }

    .aref-ruqaa-bold {
        font-family: "Aref Ruqaa", serif;
        font-weight: 700;
        font-style: normal;
    }

    .sale-badge {
        position: absolute;
        top: 20px;
        left: 20px;
        background: linear-gradient(45deg, #ff4444, #ff0000);
        color: white;
        padding: 10px 20px;
        border-radius: 30px;
        font-weight: 700;
        font-family: "Oswald", sans-serif;
        font-size: 1.1rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        box-shadow: 0 4px 15px rgba(255, 0, 0, 0.3);
        z-index: 10;
        transform: rotate(-5deg);
        border: 2px solid rgba(255, 255, 255, 0.3);
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% {
            transform: rotate(-5deg) scale(1);
        }
        50% {
            transform: rotate(-5deg) scale(1.05);
        }
        100% {
            transform: rotate(-5deg) scale(1);
        }
    }

    .sale-badge::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, rgba(255,255,255,0.2), transparent);
        border-radius: 30px;
    }

    /* Add these new styles */
    .size-chart-btn {
        background-color: #f8f9fa;
        color: #333;
        border: 1px solid #ddd;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        margin-left: 10px;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .size-chart-btn:hover {
        background-color: #333;
        color: white;
        transform: translateY(-1px);
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .size-chart-btn i {
        font-size: 0.8rem;
    }

    .size-chart-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
        box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }

    .size-chart-table th, .size-chart-table td {
        border: 1px solid #eee;
        padding: 12px;
        text-align: center;
        font-size: 0.95rem;
    }

    .size-chart-table th {
        background-color: #f8f9fa;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
    }

    .size-chart-table tr:hover {
        background-color: #f8f9fa;
    }

    .modal-content {
        border-radius: 15px;
    }

    .size-chart-modal .modal-header {
        border-bottom: 2px solid #333;
    }

    .size-chart-modal .modal-title {
        font-family: "Oswald", sans-serif;
        font-weight: 500;
    }
</style>
@endsection

@section('content')
<div class="container mt-5">
    <div class="product-container">
        <div class="row">
            <div class="col-md-6">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($product->{'image-'.$i})
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/' . $product->{'image-'.$i}) }}" alt="{{ $product->name }} - صورة {{ $i }}">
                                </div>
                            @endif
                        @endfor
                    </div>
                    
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
            <div class="col-md-6">
               <b> <h1 class="mb-4">{{ $product->name }}</h1></b>
                

                    <p class="fw-bold fs-4 mb-4">Price: {{ number_format($product->price, 2) }} L.E</p> 
                    <p class="card-text discounted-price">{{ number_format($product->{'discount_price'}, 2) }} L.E</p>
                <form action="{{ route('cart.add') }}" method="POST" id="addToCartForm">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    
                    <div class="mb-4">
                        <label class="form-label fw-bold">Size:</label>
                       
                        <div>
                            @if ($product->sizes->count() > 0)
                                 @foreach($product->sizes as $size)
                                <input type="radio" name="size" id="size{{ $size->id }}" value="{{ $size->id }}" class="d-none" required>
                                <label for="size{{ $size->id }}" class="size-btn">{{ $size->size }}</label>
                            @endforeach
                            @else
                            <p> <b>SOLD OUT</b></p>
                            @endif
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="quantity" class="form-label fw-bold">Quantity:</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1" required style="max-width: 100px;">
                    </div>
                    
                    <button type="submit" class="btn btn-add-to-cart">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">
    

    <div class="shipping-policy">
        <h3><i class="fas fa-truck"></i> Shipping</h3>
        <p>Regular orders take 2-6 business days</p>
        <p>Pre-orders take 10-15 business days</p>

        <h3 class="mt-4"><i class="fas fa-shield-alt"></i> Return Policy</h3>
        <ul>
                <li>Check that the order fits you well before payment. If not, please return it with the mailer at the site and pay only the shipping costs. There are no returns after payment, only exchanges within 14 days of purchase. Note: Customers are responsible for any additional costs.</li>
            <li><strong>Return Policy:</strong> Once the mailer leaves, there is no exchange or refund</li>
            <li><strong>No returns or exchanges on discounted items:</strong> Items purchased at reduced prices cannot be returned or exchanged. You can try the item while waiting for the mailer, but once they leave, there will be no exchange or refund available.</li>
        </ul>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    document.querySelectorAll('.size-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.size-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // Wait for DOM to be fully loaded
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('addToCartForm');
        if (form) {
            form.addEventListener('submit', function(event) {
                console.log('Form submitted');
                const sizeSelected = document.querySelector('input[name="size"]:checked');
                if (!sizeSelected) {
                    event.preventDefault();
                    alert('من فضلك حدد المقاس');
                }
            });
        } else {
            console.error('Form not found');
        }
    });
</script>
@endsection

<!-- Size Chart Modal -->
<div class="modal fade size-chart-modal" id="sizeChartModal" tabindex="-1" aria-labelledby="sizeChartModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sizeChartModalLabel">Size Chart</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        </div>
    </div>
</div>