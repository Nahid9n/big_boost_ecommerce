<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSlider extends Model
{
    use HasFactory;
    private static $slider,$image,$imageName,$directory,$imageUrl,$path,$extension,$bannerUrl,$bannerName,$banner;
    private static function getImage($request)
    {
        self::$image = $request->file('image');
        self::$extension = self::$image->getClientOriginalExtension();
        self::$imageName = time().'.'.self::$extension;
        self::$directory = 'uploads/website-details/sliders/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory . self::$imageName;
        return self::$imageUrl;
    }
    private static function getBanner($request)
    {
        self::$banner = $request->file('banner');
        self::$extension = self::$banner->getClientOriginalExtension();
        self::$bannerName = time().'.'.self::$extension;
        self::$directory = 'uploads/website-details/banners/';
        self::$banner->move(self::$directory, self::$bannerName);
        self::$bannerUrl = self::$directory . self::$bannerName;
        return self::$bannerUrl;
    }

    public static function newSlider($request){
        self::$slider = new WebsiteSlider();
        self::$slider->title = $request->title;
        self::$slider->slogan = $request->slogan;
        self::$slider->banner = $request->file('banner') ? self::getBanner($request):'';
        self::$slider->image = $request->file('image') ? self::getImage($request):'';
        self::$slider->meta = $request->meta;
        self::$slider->meta_description = $request->meta_description;
        self::$slider->status = $request->status;
        self::$slider->save();
    }
    public static function updateSlider($request,$id){
        self::$slider = WebsiteSlider::find($id);
        self::$slider->title = $request->title;
        self::$slider->slogan = $request->slogan;
        self::$imageUrl = $request->file('image') ? self::getImage($request):'';
        if ($request->file('image')){
            if(file_exists(self::$slider->image)){
                unlink(self::$slider->image);
            }
            self::$slider->image = self::$imageUrl;
        }
        self::$bannerUrl = $request->file('banner') ? self::getBanner($request):'';
        if ($request->file('banner')){
            if(file_exists(self::$slider->banner)){
                unlink(self::$slider->banner);
            }
            self::$slider->banner = self::$bannerUrl;
        }
        self::$slider->meta = $request->meta;
        self::$slider->meta_description = $request->meta_description;
        self::$slider->status = $request->status;
        self::$slider->save();
    }
    public static function deleteSlider($id){
        self::$slider = WebsiteSlider::find($id);
        if(file_exists(self::$slider->image)){
            unlink(self::$slider->image);
        }
        if(file_exists(self::$slider->banner)){
            unlink(self::$slider->banner);
        }
        self::$slider->delete();
    }
}
