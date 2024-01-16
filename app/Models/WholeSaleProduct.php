<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WholeSaleProduct extends Model
{
    use HasFactory;
     protected $guarded = [];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
     public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
     public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
     public function Color()
    {
        return $this->belongsTo(Color::class);
    }
     public function size()
    {
        return $this->belongsTo(Size::class);
    }
     public function type()
    {
        return $this->belongsTo(WholeSaleProductType::class , "type_id", "id");
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

}
