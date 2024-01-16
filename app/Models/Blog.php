<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    private static $blog,$banner,$bannerName,$bannerUrl,$directory,$extension,$metaImage,$metaImageName,$metaImageUrl;
    private static function getBanner($request){
        self::$banner = $request->file('banner');
        self::$extension = self::$banner->getClientOriginalExtension();
        self::$bannerName = time().'.'.self::$extension;
        self::$directory = 'uploads/blogs/all-blog/';
        self::$banner->move(self::$directory,self::$bannerName);
        self::$bannerUrl = self::$directory.self::$bannerName;
        return self::$bannerUrl;
    }
    private static function getMetaImage($request){
        self::$metaImage = $request->file('meta_image');
        self::$extension = self::$metaImage->getClientOriginalExtension();
        self::$metaImageName = time().'.'.self::$extension;
        self::$directory = 'uploads/blogs/meta-image/';
        self::$metaImage->move(self::$directory,self::$metaImageName);
        self::$metaImageUrl = self::$directory.self::$metaImageName;
        return self::$metaImageUrl;
    }

    public static function newBlog($request){
        self::$blog = new Blog();
        self::$blog->title = $request->title;
        self::$blog->category_id = $request->category_id;
        self::$blog->slug = $request->slug;
        self::$blog->banner = $request->file('banner') ? self::getBanner($request):'';
        self::$blog->short_description = $request->short_description;
        self::$blog->long_description = $request->long_description;
        self::$blog->meta_title = $request->meta_title;
        self::$blog->meta_image = $request->file('meta_image') ? self::getMetaImage($request):'';
        self::$blog->meta_description = $request->meta_description;
        self::$blog->meta_keyword = $request->meta_keyword;
        self::$blog->status = $request->status;
        self::$blog->save();
        return self::$blog;
    }
    public static function updateBlog($request,$id){
        self::$blog = Blog::find($id);
        self::$bannerUrl = $request->file('banner') ? self::getBanner($request):'';
        if ($request->file('banner')){
            if (file_exists(self::$blog->banner)){
                unlink(self::$blog->banner);
            }
            self::$blog->banner = self::$bannerUrl;
        }
        self::$metaImageUrl = $request->file('meta_image') ? self::getMetaImage($request):'';
        if($request->file('meta_image')){
            if (file_exists(self::$blog->meta_image)){
                unlink(self::$blog->meta_image);
            }
            self::$blog->meta_image = self::$metaImageUrl;
        }
        self::$blog->title = $request->title;
        self::$blog->category_id = $request->category_id;
        self::$blog->slug = $request->slug;
        self::$blog->short_description = $request->short_description;
        self::$blog->long_description = $request->long_description;
        self::$blog->meta_title = $request->meta_title;
        self::$blog->meta_description = $request->meta_description;
        self::$blog->meta_keyword = $request->meta_keyword;
        self::$blog->status = $request->status;
        self::$blog->save();
    }
    public static function deleteBlog($id){
        self::$blog = Blog::find($id);
        if(file_exists(self::$blog->banner)){
            unlink(self::$blog->banner);
        }
        if(file_exists(self::$blog->meta_image)){
            unlink(self::$blog->meta_image);
        }
        self::$blog->delete();
    }

    public function category(){
        return $this->belongsTo(BlogCategory::class);
    }

    public function blogImages()
    {
        return $this->hasMany(BlogImage::class);
    }
}
