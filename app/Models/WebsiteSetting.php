<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    use HasFactory;
    private static $website,$logo,$banner,$icon,$logoName,$bannerName,$iconName,$directory,$bannerUrl,$iconUrl,$logoUrl;

    private static function getLogo($request){
        self::$logo = $request->file('logo');
        self::$logoName = self::$logo->getClientOriginalName();
        self::$directory = 'uploads/website-details/logo/';
        self::$logo->move(self::$directory,self::$logoName);
        self::$logoUrl = self::$directory.self::$logoName;
        return self::$logoUrl;
    }
    private static function getBanner($request){
        self::$banner = $request->file('banner');
        self::$bannerName = self::$banner->getClientOriginalName();
        self::$directory = 'uploads/website-details/banner/';
        self::$banner->move(self::$directory,self::$bannerName);
        self::$bannerUrl = self::$directory.self::$bannerName;
        return self::$bannerUrl;
    }
    private static function getIcon($request){
        self::$icon = $request->file('icon');
        self::$iconName = self::$icon->getClientOriginalName();
        self::$directory = 'uploads/website-details/icon/';
        self::$icon->move(self::$directory,self::$iconName);
        self::$iconUrl = self::$directory.self::$iconName;
        return self::$iconUrl;
    }

    public static function updateWebsiteDetails($request,$id){
        self::$website = WebsiteSetting::find($id);
        self::$bannerUrl = $request->file('banner') ? self::getBanner($request):'';
        if ($request->file('banner')){
            if(file_exists(self::$website->banner)){
                unlink(self::$website->banner);
            }
            self::$website->banner = self::$bannerUrl;
        }
        self::$iconUrl = $request->file('icon') ? self::getIcon($request):'';
        if ($request->file('icon')){
            if(file_exists(self::$website->icon)){
                unlink(self::$website->icon);
            }
            self::$website->icon = self::$iconUrl;
        }
        self::$logoUrl = $request->file('logo') ? self::getLogo($request):'';
        if ($request->file('logo')){
            if(file_exists(self::$website->logo)){
                unlink(self::$website->logo);
            }
            self::$website->logo = self::$logoUrl;
        }
        self::$website->slogan = $request->slogan;
        self::$website->email = $request->email;
        self::$website->mobile = $request->mobile;
        self::$website->address = $request->address;
        self::$website->about = $request->about;
        self::$website->facebook = $request->facebook;
        self::$website->twitter = $request->twitter;
        self::$website->youtube = $request->youtube;
        self::$website->linkedIn = $request->linkedIn;
        self::$website->map = $request->map;
        self::$website->status = $request->status;
        self::$website->save();
    }

}
