<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ProductType;
use App\Models\Seller;
use App\Models\SellerProduct;
use App\Models\Size;
use App\Models\SubCategory;
use App\Models\Unit;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class SellerProductController extends Controller
{
    public function index()
    {
        $seller_products = SellerProduct::with([
            "seller",
            "category",
            "subCategory",
            "brand",
            "size",
            "unit",
            "type"])->get();
        return view("admin.sellers.all_product.index",compact("seller_products"));
    }
    public function create()
    {
        $sellers = Seller::all();
        $categories = Category::all();
        $subCategories =SubCategory::all();
        $brands = Brand::all();
        $units = Unit::all();
        $sizes = Size::all();
        $types = ProductType::all();
        return view("admin.sellers.all_product.create",
        compact("sellers",
                "categories",
                "subCategories",
                "brands",
                "units",
                "sizes",
                "types"));
    }
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            "seller_id"             =>"required",
            "category_id"            =>"required",
            "sub_category_id"       =>"required",
            "brand_id"              =>"required",
            "unit_id"               =>"required",
            "size_id"               =>"required",
            "type_id"               =>"required",
            "name"                  =>"required|string",
            "code"                  =>"required|string",
            "short_description"     =>"required|string",
            "long_description"      =>"required|string",
            "regular_price"         =>"required| numeric|min:0",
            "selling_price"         =>"required| numeric|min:0",
            "stock"                 =>"required|numeric|min:0",
            "refund"                =>"required",
            "tags"                  =>"required",
             "image"              =>'required|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);
        if($validate->fails())
        {
            Toastr::error($validate->getMessageBag()->first());
            return redirect()->back();
        }
        $imageName = null;
        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/sellers/all_products'),$imageName);
        }

        SellerProduct::create([
            "seller_id"             =>$request->seller_id,
            "category_id"          =>$request->category_id,
            "sub_category_id"      =>$request->sub_category_id,
            "brand_id"             =>$request->brand_id,
            "unit_id"              =>$request->unit_id,
            "size_id"              =>$request->size_id,
            "type_id"               =>$request->type_id,
            "name"                  =>$request->name,
            "code"                  =>$request->code,
            "short_description"     =>$request->short_description,
            "long_description"      =>$request->long_description,
            "regular_price"         =>$request->regular_price,
            "selling_price"         =>$request->selling_price,
            "stock"                 =>$request->stock,
            "refund"                =>$request->refund,
            "tags"                  =>$request->tags,
            "status"                =>$request->status,
            "image"                 =>$imageName,
        ]);
        Toastr::success("Seller Product has been successfully created.");
        return redirect()->route('product-seller.index');
    }
    public function show($productsId)
    {
        $product_seller = SellerProduct::find($productsId);
        return view("admin.Sellers.all_seller.show",compact("product_seller"));
    }
    public function edit($productId)
    {
        $product_seller = SellerProduct::find($productId);
        $sellers = Seller::all();
        $categories = Category::all();
        $subCategories =SubCategory::all();
        $brands = Brand::all();
        $units = Unit::all();
        $sizes = Size::all();
        $types = ProductType::all();
        return view("admin.Sellers.all_product.edit",
        compact(
            "product_seller",
            "sellers",
            "categories",
            "subCategories",
            "brands",
            "units",
            "sizes",
            "types"));
    }
    public function update(Request $request,$productId)
    {
        $seller_product = SellerProduct::find($productId);
        try{
            $validate = Validator::make($request->all(),[
                "seller_id"             =>"required",
                "category_id"            =>"required",
                "sub_category_id"       =>"required",
                "brand_id"              =>"required",
                "unit_id"               =>"required",
                "size_id"               =>"required",
                "type_id"               =>"required",
                "name"                  =>"required|string",
                "code"                  =>"required|string",
                "short_description"     =>"required|string",
                "long_description"      =>"required|string",
                "regular_price"         =>"required| numeric|min:0",
                "selling_price"         =>"required| numeric|min:0",
                "stock"                 =>"required|numeric|min:0",
                "refund"                =>"required",
                "tags"                  =>"required",
                 "image"              =>'required|image|mimes:jpeg,png,jpg,gif|max:2048',

            ]);
            if($validate->fails())
            {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back();
            }
            $imageName = $request->image;
            if($request->hasFile('image'))
            {
                $image = $request->file('image');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('uploads/sellers/all_products'),$imageName);
            }

            $seller_product->update([
                "seller_id"             =>$request->seller_id,
                "category_id"          =>$request->category_id,
                "sub_category_id"      =>$request->sub_category_id,
                "brand_id"             =>$request->brand_id,
                "unit_id"              =>$request->unit_id,
                "size_id"              =>$request->size_id,
                "type_id"               =>$request->type_id,
                "name"                  =>$request->name,
                "code"                  =>$request->code,
                "short_description"     =>$request->short_description,
                "long_description"      =>$request->long_description,
                "regular_price"         =>$request->regular_price,
                "selling_price"         =>$request->selling_price,
                "stock"                 =>$request->stock,
                "refund"                =>$request->refund,
                "tags"                  =>$request->tags,
                "status"                =>$request->status,
                "image"                 =>$imageName,
            ]);
            Toastr::success("Seller Product has been successfully created.");
            return redirect()->back();
        }catch(Exception $e){
            Log::error("Something went wrong!".$e->getMessage());
            return redirect()->back();
        }
    }
    public function delete($productId)
    {
        $product_delete = SellerProduct::find($productId);
        $product_delete->delete();
        Toastr::success("Seller Product has been successfully Delete.");
        return redirect()->back();
    }
}
