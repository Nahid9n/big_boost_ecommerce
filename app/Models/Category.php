<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    private static $category,$banner,$icon,$cover,$bannerName,$iconName,$coverName,$directory,$bannerUrl,$iconUrl,$coverUrl;
    private static function getBanner($request){
        self::$banner = $request->file('banner');
        self::$bannerName = self::$banner->getClientOriginalName();
        self::$directory = 'uploads/products/categories/banner/';
        self::$banner->move(self::$directory,self::$bannerName);
        self::$bannerUrl = self::$directory.self::$bannerName;
        return self::$bannerUrl;
    }
    private static function getIcon($request){
        self::$icon = $request->file('icon');
        self::$iconName = self::$icon->getClientOriginalName();
        self::$directory = 'uploads/products/categories/icon/';
        self::$icon->move(self::$directory,self::$iconName);
        self::$iconUrl = self::$directory.self::$iconName;
        return self::$iconUrl;
    }
    private static function getCover($request){
        self::$cover = $request->file('cover');
        self::$coverName = self::$cover->getClientOriginalName();
        self::$directory = 'uploads/products/categories/cover/';
        self::$cover->move(self::$directory,self::$coverName);
        self::$coverUrl = self::$directory.self::$coverName;
        return self::$coverUrl;
    }
    public static function newCategory($request){
        self::$category = new Category();
        self::$category->name = $request->name;
        self::$category->type_id = $request->type_id;
        self::$category->orderNumber = $request->orderNumber;
        self::$category->banner = $request->file('banner') ? self::getBanner($request):'';
        self::$category->icon = $request->file('icon') ? self::getIcon($request):'';
        self::$category->cover = $request->file('cover') ? self::getCover($request):'';
        self::$category->meta = $request->meta;
        self::$category->metaDescription = $request->metaDescription;
        self::$category->status = $request->status;
        self::$category->save();
    }
    public static function updateCategory($request,$id){
        self::$category = Category::find($id);
        self::$category->name = $request->name;
        self::$category->type_id = $request->type_id;
        self::$category->orderNumber = $request->orderNumber;
        self::$bannerUrl = $request->file('banner') ? self::getBanner($request):'';
        if ($request->file('banner')){
            if(file_exists(self::$category->banner)){
                unlink(self::$category->banner);
            }
            self::$category->banner = self::$bannerUrl;
        }
        self::$iconUrl = $request->file('icon') ? self::getIcon($request):'';
        if ($request->file('icon')){
            if(file_exists(self::$category->icon)){
                unlink(self::$category->icon);
            }
            self::$category->icon = self::$iconUrl;
        }
        self::$coverUrl = $request->file('cover') ? self::getCover($request):'';
        if ($request->file('cover')){
            if(file_exists(self::$category->cover)){
                unlink(self::$category->cover);
            }
            self::$category->cover = self::$coverUrl;
        }
        self::$category->meta = $request->meta;
        self::$category->metaDescription = $request->metaDescription;
        self::$category->status = $request->status;
        self::$category->save();
    }
    public static function deleteCategory($id){
        self::$category = Category::find($id);
        if(file_exists(self::$category->banner)){
            unlink(self::$category->banner);
        }
        if(file_exists(self::$category->icon)){
            unlink(self::$category->icon);
        }
        if(file_exists(self::$category->cover)){
            unlink(self::$category->icon);
        }
        self::$category->delete();
    }
    public function type(){
        return $this->belongsTo(ProductType::class);
    }
    public function subCategory(){
        return $this->hasMany(SubCategory::class);
    }
    public function product(){
        return $this->hasMany(Product::class);
    }

}
