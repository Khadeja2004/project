@extends('layouts.app')

@section('title', 'CART - TERYAQ shop')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">CART</h1>
    @if(count($cartItems) > 0)
        <div class="row">
            <div class="col-md-8">
                @foreach($cartItems as $id => $details)
                    <div class="card mb-3 shadow-sm" data-id="{{ $id }}">
                        <div class="row g-0">
                            <div class="col-md-3">
                                @if(isset($details['image']))
                                    <img src="{{ asset('storage/' . $details['image']) }}" alt="{{ $details['name'] }}" class="img-fluid rounded-start" style="height: 100%; object-fit: cover;">
                                @else
                                    <img src="{{ asset('images/placeholder.jpg') }}" alt="صورة افتراضية" class="img-fluid rounded-start" style="height: 100%; object-fit: cover;">
                                @endif
                            </div>
                            <div class="col-md-9">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $details['name'] }}</h5>
                                    <p class="card-text">SIZE: {{ $details['size'] }}</p>
                                    <p class="card-text">QUANTITY: {{ $details['quantity'] }}</p>
                                    <p class="card-text">PRICE: {{ number_format($details['price'], 2) }} L.E</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <button class="btn btn-outline-danger remove-from-cart">
                                            <i class="fas fa-trash-alt me-2"></i> REMOVE
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"> SUMMARY </h5>
                        @php
                            $subtotal = array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, $cartItems));
                            $shipping = 100;
                            $total = $subtotal + $shipping;
                        @endphp
                        <p class="card-text">PRODUCTS TOTAL: <strong>{{ number_format($subtotal, 2) }} L.E</strong></p>
                        <p class="card-text">SHIPPING COST: <strong>{{ number_format($shipping, 2) }} L.E</strong></p>
                        <hr>
                        <p class="card-text"><b>TOTAL: <strong>{{ number_format($total, 2) }} L.E</strong></b></p>
                        <a href="{{ route('shop.index') }}" class="btn btn-primary w-100 mb-2">
                            <i class="fas fa-shopping-bag me-2"></i>CONTINUE SHOPPING
                        </a>
                        <button class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#checkoutModal">
                            <i class="fas fa-credit-card me-2"></i>CONFIRM ORDER
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-info text-center">
            <h4> EMPTY CART</h4>
            <p>You haven't added any products to the cart yet.</p>
            <a href="{{ route('shop.index') }}" class="btn btn-primary mt-3">
                <i class="fas fa-shopping-bag me-2"></i>SHOP NOW
            </a>
        </div>
    @endif
</div>

<!-- Modal -->
<div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="checkoutModalLabel">CLIENT DETAILS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="orderForm">
                    <form id="checkoutForm">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">NAME</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">EMAIL</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">PHONE</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="instagram_username" class="form-label">INSTAGRAM USERNAME</label>
                            <input type="text" class="form-control" id="instagram_username" name="instagram_username" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">ADDRESS</label>
                            <textarea class="form-control" id="address" name="address" required></textarea>
                        </div>
                    </form>
                </div>
                <div id="orderSuccess" style="display: none;">
                    <div class="text-center">
                        <i class="fas fa-check-circle text-success" style="font-size: 5rem;"></i>
                        <h4 class="mt-3">ORDER CONFIRMED SUCCESSFULLY</h4>
                        <p>The order will be processed within 2 to 7 days</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
                <button type="button" class="btn btn-primary" id="submitOrder">CONFIRM ORDER</button>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">
   

    <div class="shipping-policy">
        <h3><i class="fas fa-truck"></i> SHIPPING</h3>
        <p>Regular orders take 2-6 business days</p>
        <p>Pre-orders take 10-15 business days</p>

        <h3 class="mt-4"><i class="fas fa-shield-alt"></i> RETURN & REFUND POLICY</h3>
        <ul>
            <li>Make sure the order suits you before payment. If not, please return it with the mailer at the site and pay only the shipping cost. There are no returns after payment, only exchange within 14 days of purchase. Note: Customers are responsible for any additional costs.</li>
            <li><strong>RETURN & REFUND POLICY :</strong> Once the mailer leaves, there is no exchange or refund</li>
            <li><strong>No returns or exchanges on discounted items:</strong> Items purchased at reduced prices cannot be returned or exchanged. You can try the item while waiting for the mailer, but once they leave, there will be no exchange or refund available.</li>
        </ul>
    </div>
</div>

<!-- Modal for Delete Confirmation -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">DELETE CONFIRMATION</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <i class="fas fa-exclamation-triangle text-warning" style="font-size: 3rem;"></i>
                <p class="mt-3">Are you sure you want to delete this product from the cart?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">CONFIRM DELETE</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Order Success -->
<div class="modal fade" id="orderConfirmationModal" tabindex="-1" aria-labelledby="orderConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content success-modal">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center pb-5">
                <div class="success-animation">
                    <div class="checkmark-circle">
                        <div class="checkmark draw"></div>
                    </div>
                </div>
                <h3 class="mt-4 mb-3">ORDER CONFIRMED SUCCESSFULLY!</h3>
                <div class="order-number mb-3">
                    <span class="label">ORDER NUMBER:</span>
                    <span class="number" id="orderNumber"></span>
                </div>
                <p class="processing-text">Your order will be processed as soon as possible.<br>Thank you for shopping with us!</p>
                <div class="mt-4">
                    <button type="button" class="btn btn-outline-secondary me-2" data-bs-dismiss="modal">CLOSE</button>
                    <a href="{{ route('shop.index') }}" class="btn btn-dark">CONTINUE SHOPPING</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    body {
        background-color: #fafafa;
    }

    /* تنسيق البطاقات */
    .card {
        border: none;
        border-radius: 15px;
        background-color: white;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }

    /* تنسيق الأزرار الرئيسية */
    .btn-primary, .btn-success {
        background-color: white !important;
        color: #333 !important;
        border: 2px solid #333 !important;
        border-radius: 25px;
        padding: 10px 20px;
        transition: all 0.3s ease;
    }

    .btn-primary:hover, .btn-success:hover {
        background-color: #333 !important;
        color: white !important;
        transform: translateY(-2px);
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    /* تنسيق خاص لأزرار السلة */
    .card .btn-primary, 
    .card .btn-success {
        width: 100%;
        margin-bottom: 10px;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* تنسيق الأيقونات داخل الأزرار */
    .btn i {
        margin-right: 8px;
    }

    /* تنسيق زر الحذف */
    .btn-outline-danger.remove-from-cart {
        border: 2px solid #333;
        color: #333;
        background-color: white;
        border-radius: 20px;
        padding: 8px 15px;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .btn-outline-danger.remove-from-cart:hover {
        background-color: #333;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    /* تنسيق قسم سياسة الشحن */
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

    /* تنسيق النوافذ المنبثقة */
    .modal-content {
        border: none;
        border-radius: 15px;
    }

    .modal-header {
        background-color: #333 !important;
        color: white !important;
        border-radius: 15px 15px 0 0;
    }

    /* تنسيق أيقونات النوافذ المنبثقة */
    #orderConfirmationModal .fa-check-circle {
        color: #333 !important;
    }

    .fa-exclamation-triangle {
        color: #333 !important;
    }

    /* تنسيق أزرار النوافذ المنبثقة */
    .modal .btn-secondary {
        background-color: #666;
        border-color: #666;
        border-radius: 25px;
    }

    .modal .btn-danger {
        background-color: #333;
        border-color: #333;
        border-radius: 25px;
    }

    /* تنسيق العناوين */
    h1, h5.card-title {
        color: #333;
    }

    /* تنسيق النصوص */
    .card-text {
        color: #333;
    }

    /* تنسيق الإطار عند العربة الفارغة */
    .alert-info {
        background-color: white;
        border: none;
        border-radius: 15px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
        color: #333;
    }

    /* Modal Styles */
    .modal-content {
        border: none;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }

    .modal-header {
        border-radius: 15px 15px 0 0;
        padding: 1.5rem;
    }

    .modal-header .btn-close {
        opacity: 0.8;
        transition: all 0.3s ease;
    }

    .modal-header .btn-close:hover {
        opacity: 1;
        transform: rotate(90deg);
    }

    .modal-body {
        padding: 2rem;
    }

    .modal-footer {
        border-top: 1px solid rgba(0,0,0,0.1);
        padding: 1.5rem;
    }

    /* Button Styles */
    .modal .btn {
        padding: 0.6rem 1.5rem;
        border-radius: 25px;
        text-transform: uppercase;
        font-weight: 500;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
    }

    .modal .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 3px 10px rgba(0,0,0,0.2);
    }

    .modal .btn-secondary {
        background-color: #6c757d;
        border: none;
    }

    .modal .btn-danger {
        background-color: #dc3545;
        border: none;
    }

    .modal .btn-primary {
        background-color: #333;
        border: none;
    }

    /* Icon Animations */
    .fa-exclamation-triangle {
        animation: shake 0.8s ease-in-out;
    }

    .fa-check-circle {
        animation: scale 0.5s ease-in-out;
    }

    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        75% { transform: translateX(5px); }
    }

    @keyframes scale {
        0% { transform: scale(0); }
        50% { transform: scale(1.2); }
        100% { transform: scale(1); }
    }

    /* Text Styles */
    .modal-title {
        font-family: "Oswald", sans-serif;
        letter-spacing: 1px;
    }

    .modal .lead {
        color: #333;
        font-weight: 500;
    }

    /* Success Modal Specific */
    #orderConfirmationModal .modal-body {
        background-color: #fff;
    }

    #orderConfirmationModal .fa-check-circle {
        color: #28a745;
    }

    /* Delete Modal Specific */
    #deleteConfirmationModal .fa-exclamation-triangle {
        color: #ffc107;
    }

    #deleteConfirmationModal .modal-body p {
        color: #333;
        font-size: 1.1rem;
    }

    /* Success Modal Styles */
    .success-modal {
        border: none;
        border-radius: 20px;
        overflow: hidden;
    }

    .success-modal .modal-header {
        padding: 1rem;
        background: transparent;
    }

    .success-modal .btn-close {
        background: transparent url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23000'%3e%3cpath d='M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707a1 1 0 010-1.414z'/%3e%3c/svg%3e") center/1em auto no-repeat;
        opacity: 0.5;
        transition: all 0.3s ease;
    }

    .success-modal .btn-close:hover {
        opacity: 1;
        transform: rotate(90deg);
    }

    /* Success Animation */
    .success-animation {
        margin: 20px auto;
    }

    .checkmark-circle {
        width: 100px;
        height: 100px;
        position: relative;
        display: inline-block;
        vertical-align: top;
        margin: auto;
        background-color: #28a745;
        border-radius: 50%;
    }

    .checkmark {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 50px;
        height: 25px;
        transform: translate(-50%, -50%) rotate(45deg);
    }

    .checkmark:before, .checkmark:after {
        content: '';
        position: absolute;
        background-color: white;
        border-radius: 3px;
    }

    .checkmark:before {
        width: 5px;
        height: 25px;
        left: 22px;
        top: 0;
    }

    .checkmark:after {
        width: 25px;
        height: 5px;
        top: 20px;
        left: 0;
    }

    /* Text Styles */
    .success-modal h3 {
        color: #333;
        font-family: 'Oswald', sans-serif;
        font-weight: 500;
        letter-spacing: 1px;
    }

    .order-number {
        background: #f8f9fa;
        display: inline-block;
        padding: 10px 20px;
        border-radius: 25px;
        font-family: 'Oswald', sans-serif;
    }

    .order-number .label {
        color: #666;
        margin-right: 5px;
    }

    .order-number .number {
        color: #333;
        font-weight: bold;
        font-size: 1.1em;
    }

    .processing-text {
        color: #666;
        line-height: 1.6;
    }

    /* Button Styles */
    .success-modal .btn {
        padding: 12px 30px;
        border-radius: 25px;
        text-transform: uppercase;
        font-weight: 500;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
    }

    .success-modal .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    }

    .success-modal .btn-outline-secondary {
        color: #666;
        border-color: #ddd;
    }

    .success-modal .btn-outline-secondary:hover {
        background-color: #f8f9fa;
        border-color: #ddd;
        color: #333;
    }

    .success-modal .btn-dark {
        background-color: #333;
        border-color: #333;
    }

    .success-modal .btn-dark:hover {
        background-color: #000;
        border-color: #000;
    }

    /* تنسيقات الجدول */
    .table {
        width: 100%;
        margin-bottom: 2rem;
        background-color: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 0 15px rgba(0,0,0,0.05);
    }

    .table thead {
        background-color: #f8f9fa;
        border-bottom: 2px solid #dee2e6;
    }

    .table th {
        padding: 1.2rem 1rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-size: 0.9rem;
        color: #333;
        border-right: 1px solid #dee2e6;
        vertical-align: middle;
    }

    .table td {
        padding: 1.2rem 1rem;
        vertical-align: middle;
        border-right: 1px solid #dee2e6;
        color: #333;
    }

    .table th:last-child,
    .table td:last-child {
        border-right: none;
    }

    .table tbody tr {
        border-bottom: 1px solid #dee2e6;
        transition: all 0.3s ease;
    }

    .table tbody tr:last-child {
        border-bottom: none;
    }

    .table tbody tr:hover {
        background-color: #f8f9fa;
    }

    /* تنسيق الصور في الجدول */
    .table img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    /* تنسيق النصوص في الجدول */
    .table .product-name {
        font-weight: 600;
        color: #333;
    }

    .table .product-price {
        font-weight: 600;
        color: #333;
    }

    .table .product-quantity {
        font-weight: 500;
        color: #666;
    }

    /* تنسيق خاص للموبايل */
    @media (max-width: 768px) {
        .table thead {
            display: none;
        }

        .table tbody tr {
            display: block;
            margin-bottom: 1rem;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            background: white;
        }

        .table td {
            display: block;
            text-align: right;
            padding: 0.8rem;
            border-right: none;
            border-bottom: 1px solid #dee2e6;
        }

        .table td:last-child {
            border-bottom: none;
        }

        .table td::before {
            content: attr(data-label);
            float: left;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
        }

        .table img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            margin-bottom: 1rem;
        }
    }
</style>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    let productToDelete = null;

    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
        productToDelete = $(this).closest(".card");
        $('#deleteConfirmationModal').modal('show');
    });

    $("#confirmDelete").click(function() {
        if (productToDelete) {
            let productId = productToDelete.data("id");
            $.ajax({
                url: '{{ route('cart.remove') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: productId
                },
                success: function (response) {
                    productToDelete.remove();
                    updateCartSummary();
                    $('#deleteConfirmationModal').modal('hide');
                    
                    // إذا كانت العربة فارغة، قم بتحديث الصفحة
                    if($(".card").length === 0) {
                        location.reload();
                    }
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                    alert("حدث خطأ أثناء حذف المنتج. الرجاء المحاولة مرة أخرى.");
                }
            });
        }
    });

    // دالة لتحديث ملخص العربة
    function updateCartSummary() {
        $.ajax({
            url: '{{ route('cart.summary') }}',
            method: 'GET',
            success: function(response) {
                
                $(".card-text:contains('الإجمالي الكلي')").html('الإجمالي الكلي: <strong>' + response.total + ' ج.م</strong>');
            }
        });
    }

    // إضافة معالج حدث النقر لزر تأكيد الطلب
    $("#submitOrder").click(function(e) {
        e.preventDefault();
        
        // تعطيل الزر وإضافة أيقونة التحميل
        const submitButton = $(this);
        submitButton.prop('disabled', true)
            .html('<i class="fas fa-spinner fa-spin me-2"></i>Processing...');

        var formData = $("#checkoutForm").serialize();

        $.ajax({
            url: '{{ route('order.store') }}',
            method: 'POST',
            data: formData,
            success: function(response) {
                if(response.success) {
                    $('#orderNumber').text(response.order_id);
                    $('#orderConfirmationModal').modal('show');
                } else {
                    alert('حدث خطأ: ' + response.message);
                }
            },
            error: function() {
                alert('حدث خطأ أثناء إرسال الطلب. يرجى المحاولة مرة أخرى.');
            },
            complete: function() {
                // إعادة تفعيل الزر وإرجاع النص الأصلي
                submitButton.prop('disabled', false)
                    .html('<i class="fas fa-credit-card me-2"></i>CONFIRM ORDER');
            }
        });
    });

    // إغلاق النافذة المنبثقة وإعادة التوجيه عند النقر على "متابعة التسوق"
    $('#orderConfirmationModal').on('hidden.bs.modal', function () {
        window.location.href = '{{ route('shop.index') }}';
    });
});
</script>
@endsection
