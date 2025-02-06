<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>إنشاء منتج جديد</title>
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
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h1 class="mb-0">إنشاء منتج جديد</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">اسم المنتج</label>
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="image-1" class="form-label">الصورة الأولى</label>
                                <input type="file" class="form-control" name="image-1" id="image-1" accept="image/*" required>
                            </div>
                            <div class="mb-3">
                                <label for="image-2" class="form-label">الصورة الثانية</label>
                                <input type="file" class="form-control" name="image-2" id="image-2" accept="image/*">
                            </div>
                            <div class="mb-3">
                                <label for="image-3" class="form-label">الصورة الثالثة</label>
                                <input type="file" class="form-control" name="image-3" id="image-3" accept="image/*">
                            </div>
                            <div class="mb-3">
                                <label for="image-4" class="form-label">الصورة الرابعة</label>
                                <input type="file" class="form-control" name="image-4" id="image-4" accept="image/*">
                            </div>
                            <div class="mb-3">
                                <label for="image-5" class="form-label">الصورة الخامسة</label>
                                <input type="file" class="form-control" name="image-5" id="image-5" accept="image/*">
                            </div>
                            <div class="mb-3">
                                <label for="image-6" class="form-label">الصورة السادسة</label>
                                <input type="file" class="form-control" name="image-6" id="image-6" accept="image/*">
                            </div>
                            <div class="mb-3">
                                <label for="image-7" class="form-label">الصورة السابعة</label>
                                <input type="file" class="form-control" name="image-7" id="image-7" accept="image/*">
                            </div>
                            <div class="mb-3">
                                <label for="image-8" class="form-label">الصورة الثامنة</label>
                                <input type="file" class="form-control" name="image-8" id="image-8" accept="image/*">
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">السعر</label>
                                <div class="input-group">
                                    <span class="input-group-text">ج.م</span>
                                    <input type="number" class="form-control" name="price" id="price" step="0.01" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="discount_price" class="form-label">السعر قبل الخصم</label>
                                <input type="number" step="0.01" class="form-control" id="discount_price" name="discount_price" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">الوصف</label>
                                <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="stock" class="form-label">المخزون</label>
                                <input type="number" class="form-control" name="stock" id="stock" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">المقاسات المتاحة:</label>
                                <div>
                                    @foreach(['XS', 'S', 'M', 'L', 'XL', 'XXL'] as $size)
                                        <input type="checkbox" id="size-{{ $size }}" name="sizes[]" value="{{ $size }}" class="size-checkbox">
                                        <label for="size-{{ $size }}" class="size-label">{{ $size }}</label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-plus-circle me-2"></i>إنشاء المنتج
                                </button>
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
