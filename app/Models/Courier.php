<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    use HasFactory;
    private static $courier,$image,$imageName,$directory,$extension,$imageUrl;
    private static function getImage($request){
        self::$image = $request->file('image');
        self::$extension = self::$image->getClientOriginalExtension();
        self::$imageName = time().'.'.self::$extension;
        self::$directory = "uploads/courier/";
        self::$image->move(self::$directory,self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;
    }
    public static function newCourier($request){
        self::$courier = new Courier();
        self::$courier->name = $request->name;
        self::$courier->image = $request->file('image') ? self::getImage($request):'';
        self::$courier->status = $request->status;
        self::$courier->save();
    }
    public static function updateCourier($request,$id){
        self::$courier = Courier::find($id);
        self::$courier->name = $request->name;
        self::$imageUrl = $request->file('image') ? self::getImage($request):'';
        if ($request->file('image')){
            if (file_exists(self::$courier->image)){
                unlink(self::$courier->image);
            }
            self::$courier->image = self::$imageUrl;
        }
        self::$courier->status = $request->status;
        self::$courier->save();
    }
    public static function deleteCourier($id){
        self::$courier = Courier::find($id);
        if (file_exists(self::$courier->image)){
            unlink(self::$courier->image);
        }
        self::$courier->delete();
    }
}
