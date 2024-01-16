<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    private static $product, $image,$imageName,$extension, $directory,$imageUrl;

    private static function getImageUrl($request)
    {

        self::$image = $request->file('image');
        self::$extension = self::$image->getClientOriginalExtension();
        self::$imageName = time() . '.' . self::$extension;
        self::$directory = "uploads/products/All-product/";
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl     = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function newProduct($request)
    {
        if ($request->file('image')) {
            self::$imageUrl = self::getImageUrl($request);
        } else {
            self::$imageUrl = 'admin/img/product.jpg';
        }

        self::$product = new Product();
        self::$product->category_id = $request->category_id;
        self::$product->sub_category_id = $request->sub_category_id;
        self::$product->brand_id = $request->brand_id;
        self::$product->unit_id = $request->unit_id;
        self::$product->name = $request->name;
        self::$product->sku = $request->sku;
        self::$product->code = $request->code;
        self::$product->type_id = $request->type_id;
        self::$product->short_description = $request->short_description;
        self::$product->long_description = $request->long_description;
        self::$product->image = self::$imageUrl;
        self::$product->regular_price = $request->regular_price;
        self::$product->selling_price = $request->selling_price;
        self::$product->stock_amount = $request->stock_amount;
        self::$product->tags = $request->tags;
        self::$product->refund = $request->refund;
        self::$product->cash_on = $request->cash_on;
        self::$product->shipping_cost = $request->shipping_cost;
        self::$product->flash_deal = $request->flash_deal;
        self::$product->flash_deal_discount = $request->flash_deal_discount;
        self::$product->status = $request->status;
        self::$product->featured_status = $request->featured_status;
        self::$product->save();
        return self::$product;
    }
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
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
    public function colors()
    {
        return $this->hasMany(ProductColor::class);
    }
    public function sizes()
    {
        return $this->hasMany(ProductSize::class);
    }
    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function type(){
        return $this->belongsTo(ProductType::class);
    }
    public static function updateProduct($request, $product)
    {
        self::$product = Product::find($product->id);
        if ($request->file('image'))
        {
            if (file_exists($product->image))
            {
                unlink($product->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        } else {
            self::$imageUrl = $product->image;
        }
        self::$product->category_id = $request->category_id;
        self::$product->sub_category_id = $request->sub_category_id;
        self::$product->brand_id = $request->brand_id;
        self::$product->unit_id = $request->unit_id;
        self::$product->name = $request->name;
        self::$product->sku = $request->sku;
        self::$product->code = $request->code;
        self::$product->type_id = $request->type_id;
        self::$product->short_description = $request->short_description;
        self::$product->long_description = $request->long_description;
        self::$product->image = self::$imageUrl;
        self::$product->regular_price = $request->regular_price;
        self::$product->selling_price = $request->selling_price;
        self::$product->stock_amount = $request->stock_amount;
        self::$product->tags = $request->tags;
        self::$product->refund = $request->refund;
        self::$product->cash_on = $request->cash_on;
        self::$product->shipping_cost = $request->shipping_cost;
        self::$product->flash_deal = $request->flash_deal;
        self::$product->flash_deal_discount = $request->flash_deal_discount;
        self::$product->featured_status = $request->featured_status;
        self::$product->status = $request->status;
        self::$product->save();
    }
   public static function deleteProduct($id){
       self::$product = Product::find($id);
       if(file_exists(self::$product->image)){
           unlink(self::$product->image);
       }
        self::$product->delete();
   }
}
