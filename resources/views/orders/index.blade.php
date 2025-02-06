@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">الطلبات</h2>
    </div>

    @if($orders->count() > 0)
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>رقم الطلب</th>
                                <th>اسم العميل</th>
                                <th>البريد الإلكتروني</th>
                                <th>Instagram</th>
                                <th>رقم الهاتف</th>
                                <th>العنوان</th>
                                <th>إجمالي المبلغ</th>
                                <th>تاريخ ووقت الطلب</th>
                                <th>التفاصيل</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->email }}</td>
                                <td>
                                    @if($order->instagram_username)
                                        <i class="bi bi-instagram"></i>
                                        <a href="https://instagram.com/{{ $order->instagram_username }}" 
                                           target="_blank"
                                           class="instagram-link">
                                            {{ $order->instagram_username }}
                                        </a>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->address }}</td>
                                <td>{{ number_format($order->total_amount, 2) }} ج.م</td>
                                <td>
                                    <div>{{ $order->created_at->format('Y-m-d') }}</div>
                                    <small class="text-muted">{{ $order->created_at->format('h:i A') }}</small>
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#orderModal{{ $order->id }}">
                                        <i class="bi bi-eye"></i>
                                        عرض التفاصيل
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modals for Order Details -->
        @foreach($orders as $order)
        <div class="modal fade" id="orderModal{{ $order->id }}" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">تفاصيل الطلب #{{ $order->id }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>المنتج</th>
                                        <th>الصورة</th>
                                        <th>الكمية</th>
                                        <th>السعر</th>
                                        <th>المقاس</th>
                                        <th>الإجمالي</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->items as $item)
                                    <tr>
                                        <td>{{ $item['name'] }}</td>
                                        <td>
                                            @if(isset($item['image']))
                                                <img src="{{ asset('storage/' . $item['image']) }}" 
                                                     alt="{{ $item['name'] }}" 
                                                     style="width: 50px; height: 50px; object-fit: cover;">
                                            @endif
                                        </td>
                                        <td>{{ $item['quantity'] }}</td>
                                        <td>{{ number_format($item['price'], 2) }} ج.م</td>
                                        <td>{{ $item['size'] ?? 'غير محدد' }}</td>
                                        <td>{{ number_format($item['price'] * $item['quantity'], 2) }} ج.م</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-3">
                            <h6>إجمالي الطلب: {{ number_format($order->total_amount, 2) }} ج.م</h6>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    @else
        <div class="alert alert-info">
            لا توجد طلبات حالياً
        </div>
    @endif
</div>

<style>
    .table {
        vertical-align: middle;
    }

    .table th {
        background-color: #f8f9fa;
        font-weight: 600;
    }

    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
    }

    .btn i {
        margin-left: 0.25rem;
    }

    .modal-header {
        background-color: #f8f9fa;
    }

    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
    }

    @media (max-width: 768px) {
        .table-responsive {
            font-size: 0.875rem;
        }
    }

    .instagram-link {
        color: #333;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .instagram-link:hover {
        color: #E4405F;
        text-decoration: underline;
    }

    .bi-instagram {
        color: #E4405F;
        margin-left: 5px;
    }
</style>
@endsection
