<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    protected $fillable = ['order_id', 'status', 'notes'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function statuses()
    {
        return $this->hasMany(OrderStatus::class);
    }

    public function latestStatus()
    {
        return $this->hasOne(OrderStatus::class)->latest();
    }
}
