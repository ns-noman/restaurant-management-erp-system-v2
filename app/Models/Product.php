<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','bn_name','slug','image','category_id','price','discount_price','price_active','menu_type_id','description','status','deleted_at'
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class,'category_id');
    }

    public function menutype()
    {
        return $this->belongsTo(MenuType::class,'menu_type_id');
    }

}
