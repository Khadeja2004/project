<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'price',
        'discount_price', // تم تغيير الشرطة
        'stock',
        'description',
        'image-1',
        'image-2',
        'image-3',
        'image-4',
        'image-5',
        'image-6',
        'image-7',
        'image-8',
    ];

    public function sizes()
    {
        return $this->hasMany(Size::class);
    }
}
