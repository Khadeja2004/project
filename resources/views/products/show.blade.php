@if($product)
    <!DOCTYPE html>
    <html lang="ar" dir="rtl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>عرض المنتج - {{ $product->name }}</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <style>
            body {
                background-color: #f8f9fa;
            }
            .product-image {
                max-width: 100%;
                height: auto;
                border-radius: 8px;
            }
            .size-badge {
                font-size: 1rem;
                padding: 0.5rem 1rem;
                margin-right: 0.5rem;
                margin-bottom: 0.5rem;
            }
        </style>
    </head>
    <body>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-header bg-info text-white">
                            <h1 class="mb-0">{{ $product->name }}</h1>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            @php $activeSet = false; @endphp
                                            @foreach(['image-1', 'image-2', 'image-3', 'image-4', 'image-5'] as $image)
                                                @if($product->{$image})
                                                    <div class="carousel-item {{ !$activeSet ? 'active' : '' }}">
                                                        <img src="{{ asset('storage/' . $product->{$image}) }}" class="d-block w-100 product-image" alt="{{ $product->name }}">
                                                    </div>
                                                    @php $activeSet = true; @endphp
                                                @endif
                                            @endforeach
                                        </div>
                                        @if($activeSet)
                                            <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">السابق</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">التالي</span>
                                            </button>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="mb-3">تفاصيل المنتج</h4>
                                    <p><strong>السعر:</strong> {{ number_format($product->price, 2) }} ج.م</p>
                                    <p><strong>السعر قبل التخفيض:</strong> {{ number_format($product->discount_price, 2) }} ج.م</p>
                                    <p><strong>المخزون:</strong> {{ $product->stock }}</p>
                                    <p><strong>الوصف:</strong></p>
                                    <p>{{ $product->description }}</p>
                                    
                                    <!-- إضافة قسم المقاسات -->
                                    <h5 class="mt-4 mb-3">المقاسات المتاحة:</h5>
                                    <div>
                                        @if($product->sizes && $product->sizes->count() > 0)
                                            @foreach($product->sizes as $size)
                                                <span class="badge bg-primary size-badge">{{ $size->size }}</span>
                                            @endforeach
                                        @else
                                            <p class="text-muted">لا توجد مقاسات متاحة لهذا المنتج</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">
                                    <i class="fas fa-edit me-2"></i>تعديل
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد من حذف هذا المنتج؟')">
                                        <i class="fas fa-trash me-2"></i>حذف
                                    </button>
                                </form>
                                <a href="{{ route('products.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left me-2"></i>العودة للقائمة
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
@else
    <div class="alert alert-danger">
        المنتج غير موجود
    </div>
@endif