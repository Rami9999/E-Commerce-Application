<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Product;
class OrderItem extends Model
{
    use HasFactory;
    protected $table='order_items';


    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function review()
    {
        return $this->hasOne(review::class,'order_item_id');
    }
}
