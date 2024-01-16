<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Brand extends Model
{
    use HasFactory;
    private static $brand,$logo,$logoName,$directory,$logoUrl,$path;
    private static function getLogo($request)
    {
        self::$logo = $request->file('logo');
        self::$logoName = self::$logo->getClientOriginalName();
        self::$directory = 'uploads/products/brand/logo/';
        self::$logo->move(self::$directory, self::$logoName);
        self::$logoUrl = self::$directory . self::$logoName;
        return self::$logoUrl;
    }

    public static function newBrand($request){
        self::$brand = new Brand();
        self::$brand->name = $request->name;
        self::$brand->logo = $request->file('logo') ? self::getlogo($request):'';
        self::$brand->meta = $request->meta;
        self::$brand->meta_description = $request->meta_description;
        self::$brand->status = $request->status;
        self::$brand->save();
    }
    public static function updateBrand($request,$id){
        self::$brand = Brand::find($id);
        self::$brand->name = $request->name;
        self::$logoUrl = $request->file('logo') ? self::getlogo($request):'';
        if ($request->file('logo')){
            if(file_exists(self::$brand->logo)){
                unlink(self::$brand->logo);
            }
            self::$brand->logo = self::$logoUrl;
        }
        self::$brand->meta = $request->meta;
        self::$brand->meta_description = $request->meta_description;
        self::$brand->status = $request->status;
        self::$brand->save();
    }
    public static function deleteBrand($id){
        self::$brand = Brand::find($id);
        if(file_exists(self::$brand->logo)){
            unlink(self::$brand->logo);
        }
        self::$brand->delete();
    }
}
