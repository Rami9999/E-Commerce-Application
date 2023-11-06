<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\OrderItem;

class Product extends Model
{
    use HasFactory;
    protected $table='products';

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function orderItem()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class,'subcategory_id');
    }

}
