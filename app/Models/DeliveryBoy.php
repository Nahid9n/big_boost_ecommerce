<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryBoy extends Model
{
    use HasFactory;
    private static $deliveryBoy,$image,$imageName,$imageUrl,$extension,$directory;
    public static function getImage($request){
        self::$image = $request->file('image');
        self::$extension = self::$image->getClientOriginalExtension();
        self::$imageName = time().'.'.self::$extension;
        self::$directory = 'uploads/delivery-boy/';
        self::$image->move(self::$directory , self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;
    }
    public static function addDeliveryBoy($request){

        self::$deliveryBoy = new DeliveryBoy();
        self::$deliveryBoy->name = $request->name;
        self::$deliveryBoy->designation = $request->designation;
        self::$deliveryBoy->image = self::getImage($request);
        self::$deliveryBoy->email = $request->email;
        self::$deliveryBoy->mobile = $request->mobile;
        self::$deliveryBoy->blood = $request->blood;
        self::$deliveryBoy->gender = $request->gender;
        self::$deliveryBoy->date = $request->date;
        self::$deliveryBoy->present_address = $request->present_address;
        self::$deliveryBoy->permanentAddress = $request->permanentAddress;
        self::$deliveryBoy->short_description = $request->short_description;
        self::$deliveryBoy->biography = $request->biography;
        self::$deliveryBoy->experience = $request->experience;
        self::$deliveryBoy->facebook = $request->facebook;
        self::$deliveryBoy->twitter = $request->twitter;
        self::$deliveryBoy->linkedIn = $request->linkedIn;
        self::$deliveryBoy->website = $request->website;
        self::$deliveryBoy->status = $request->status;
        self::$deliveryBoy->save();
    }
    public static function updateDeliveryBoy($request,$id){
        self::$deliveryBoy = DeliveryBoy::find($id);
        if ($request->file('image')){
            if (file_exists(self::$deliveryBoy->image)){
                unlink(self::$deliveryBoy->image);
            }
            self::$deliveryBoy->image = self::getImage($request);
        }
        self::$deliveryBoy->name = $request->name;
        self::$deliveryBoy->designation = $request->designation;
        self::$deliveryBoy->email = $request->email;
        self::$deliveryBoy->mobile = $request->mobile;
        self::$deliveryBoy->blood = $request->blood;
        self::$deliveryBoy->gender = $request->gender;
        self::$deliveryBoy->date = $request->date;
        self::$deliveryBoy->present_address = $request->present_address;
        self::$deliveryBoy->permanentAddress = $request->permanentAddress;
        self::$deliveryBoy->short_description = $request->short_description;
        self::$deliveryBoy->biography = $request->biography;
        self::$deliveryBoy->experience = $request->experience;
        self::$deliveryBoy->facebook = $request->facebook;
        self::$deliveryBoy->twitter = $request->twitter;
        self::$deliveryBoy->linkedIn = $request->linkedIn;
        self::$deliveryBoy->status = $request->status;
        self::$deliveryBoy->save();
    }

    public static function deleteDeliveryBoy($id){
        self::$deliveryBoy = DeliveryBoy::find($id);
        if (file_exists(self::$deliveryBoy->image)){
            unlink(self::$deliveryBoy->image);
        }
        self::$deliveryBoy->delete();
    }
}
