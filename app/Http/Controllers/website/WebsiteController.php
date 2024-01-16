<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index(){
        return view('website.home.index',[
            'products'=>Product::where('status',1)->get(),
            'categories'=>Category::where('status',1)->latest()->get(),
            'featured_Products'=>Product::where('featured_status',1)->where('status',1)->latest()->take(10)->get(),
            'latest_products'=>Product::where('status',1)->latest()->get(),
        ]);
    }
    public function category(){
        return view('website.category.index',[
            'categories'=>Category::where('status',1)->latest()->get(),
        ]);
    }
    public function product(){
        return view('website.product.index',[
            'products'=>Product::where('status',1)->latest()->paginate(12),
            'categories'=>Category::where('status',1)->latest()->get(),
        ]);
    }

    public function productByCategory($id){
        return view('website.category.product',[
            'products'=>Product::where('category_id',$id)->where('status',1)->latest()->paginate(12),
            'categories'=>Category::where('status',1)->latest()->paginate(12),
        ]);
    }
    public function productDetails($id){
        return view('website.product.product-details',[
            'categories'=>Category::where('status',1)->latest()->get(),
            'product'=>Product::find($id),
            'relatedProducts'=>Product::where('category_id',$id)->latest()->get(),
        ]);
    }
    public function brand(){
        return view('website.brand.index',[
            'brands'=>Brand::where('status',1)->latest()->get(),
            'categories'=>Category::where('status',1)->latest()->get(),
        ]);
    }
    public function productByBrand($id){
        return view('website.brand.product',[
            'products'=>Product::where('brand_id',$id)->where('status',1)->latest()->get(),
            'categories'=>Category::where('status',1)->latest()->get(),
        ]);
    }


}
