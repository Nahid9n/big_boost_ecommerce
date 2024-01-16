<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogImage extends Model
{
    use HasFactory;
    private static $blogImage,$blogImages, $image, $imageName,$imageUrl, $extension, $directory ;

    private static function getImageUrl($image)
    {
        self::$image = $image;
        self::$extension = self::$image->getClientOriginalExtension();
        self::$imageName = rand(0, 50000).'.'.self::$extension;
        self::$directory = 'uploads/blogs/blogs-other-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function newBlogImage($images, $id)
    {
        foreach ($images as $image)
        {
            self::$blogImage                = new BlogImage();
            self::$blogImage->blog_id       = $id;
            self::$blogImage->image         = self::getImageUrl($image);
            self::$blogImage->save();
        }
    }

    public static function updateBlogImage($images, $id)
    {
        self::$blogImages = BlogImage::where('blog_id', $id)->get();
        foreach (self::$blogImages as $blogImage)
        {
            if (file_exists($blogImage->image))
            {
                unlink($blogImage->image);
            }
            $blogImage->delete();
        }
        self::newBlogImage($images, $id);
    }
}
