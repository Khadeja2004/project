<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>تعديل المنتج</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-label {
            font-weight: bold;
        }
        .size-checkbox {
            display: none;
        }
        .size-label {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
        }
        .size-checkbox:checked + .size-label {
            background-color: #ffc107;
            color: black;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-warning text-dark">
                        <h1 class="mb-0">تعديل المنتج</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">اسم المنتج</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="image-1" class="form-label">الصورة الأولى</label>
                                <input type="file" class="form-control" name="image-1" id="image-1" accept="image/*">
                                @if($product->{'image-1'})
                                    <img src="{{ asset('storage/' . $product->{'image-1'}) }}" alt="الصورة الحالية" class="img-thumbnail mt-2" width="100">
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="image-2" class="form-label">الصورة الثانية</label>
                                <input type="file" class="form-control" name="image-2" id="image-2" accept="image/*">
                                @if($product->{'image-2'})
                                    <img src="{{ asset('storage/' . $product->{'image-2'}) }}" alt="الصورة الحالية" class="img-thumbnail mt-2" width="100">
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="image-3" class="form-label">الصورة الثالثة</label>
                                <input type="file" class="form-control" name="image-3" id="image-3" accept="image/*">
                                @if($product->{'image-3'})
                                    <img src="{{ asset('storage/' . $product->{'image-3'}) }}" alt="الصورة الحالية" class="img-thumbnail mt-2" width="100">
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="image-4" class="form-label">الصورة الرابعة</label>
                                <input type="file" class="form-control" name="image-4" id="image-4" accept="image/*">
                                @if($product->{'image-4'})
                                    <img src="{{ asset('storage/' . $product->{'image-4'}) }}" alt="الصورة الحالية" class="img-thumbnail mt-2" width="100">
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="image-5" class="form-label">الصورة الخامسة</label>
                                <input type="file" class="form-control" name="image-5" id="image-5" accept="image/*">
                                @if($product->{'image-5'})
                                    <img src="{{ asset('storage/' . $product->{'image-5'}) }}" alt="الصورة الحالية" class="img-thumbnail mt-2" width="100">
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">السعر</label>
                                <div class="input-group">
                                    <span class="input-group-text">ج.م</span>
                                    <input type="number" class="form-control" name="price" id="price" step="0.01" value="{{ $product->price }}" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="discount-price" class="form-label"> السعر قبل التخفيض </label>
                                <div class="input-group">
                                    <span class="input-group-text">ج.م</span>
                                    <input type="number" class="form-control" name="discount-price" id="discount-price" step="0.01" value="{{ $product->discount_price }}" required>
                                </div>
                             </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">الوصف</label>
                                <textarea class="form-control" name="description" id="description" rows="3" required>{{ $product->description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="stock" class="form-label">المخزون</label>
                                <input type="number" class="form-control" name="stock" id="stock" value="{{ $product->stock }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">المقاسات المتاحة:</label>
                                <div>
                                    @php
                                        $productSizes = $product->sizes ? $product->sizes->pluck('size')->toArray() : [];
                                    @endphp
                                    @foreach(['XS', 'S', 'M', 'L', 'XL', 'XXL'] as $size)
                                        <input type="checkbox" id="size-{{ $size }}" name="sizes[]" value="{{ $size }}" class="size-checkbox"
                                            {{ in_array($size, $productSizes) ? 'checked' : '' }}>
                                        <label for="size-{{ $size }}" class="size-label">{{ $size }}</label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">المقاسات المحددة حاليًا:</label>
                                <div>
                                    @forelse($productSizes as $size)
                                        <span class="badge bg-success me-2">{{ $size }}</span>
                                    @empty
                                        <span class="text-muted">لا توجد مقاسات محددة</span>
                                    @endforelse
                                </div>
                            </div>
                            @foreach(['image-1', 'image-2', 'image-3', 'image-4', 'image-5', 'image-6', 'image-7', 'image-8',] as $imageField)
                            <h2> تعديل الصور </h2>
                                <div class="mb-3">
                                    <label for="{{ $imageField }}" class="form-label">{{ __("الصورة " . substr($imageField, -1)) }}</label>
                                    <input type="file" class="form-control" name="{{ $imageField }}" id="{{ $imageField }}" accept="image/*">
                                    @if($product->{$imageField})
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $product->{$imageField}) }}" alt="الصورة الحالية" class="img-thumbnail" width="100">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remove_{{ $imageField }}" id="remove_{{ $imageField }}">
                                                <label class="form-check-label" for="remove_{{ $imageField }}">
                                                    إزالة هذه الصورة
                                                </label>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-warning btn-lg">
                                    <i class="fas fa-save me-2"></i>تحديث المنتج
                                </button>
                                <a href="{{ route('products.index') }}" class="btn btn-secondary btn-lg">
                                    <i class="fas fa-arrow-left me-2"></i>العودة للقائمة
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>