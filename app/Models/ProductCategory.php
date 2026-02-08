<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','bn_name','slug','image','banner','parent_id','description','status','deleted_at'
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class,'parent_id');
    }


    public function food()
    {
        return $this->hasMany(Product::class,'category_id');
    }

}
