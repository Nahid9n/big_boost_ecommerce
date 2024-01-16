<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use App\Models\SubCategory;
use App\Models\Unit;
use App\Models\WholeSaleProduct;
use App\Models\WholeSaleProductType;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Image;

class WholeSaleProductController extends Controller
{
      public function index()
    {
        $products = WholeSaleProduct::with(["category", "subcategory", "brand", "unit", "color", "type"])->get();
        return view("admin.whole_sale_products.product.index",
                compact("products"));
    }
     public function create()
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $brands = Brand::all();
        $types = WholeSaleProductType::where('status',1)->get();
        $units = Unit::all();
        $colors =Color::all();
        $sizes = Size::all();

        return view("admin.whole_sale_products.product.create",compact("categories","subCategories", "brands", "types", "units", "colors","sizes"));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $validator= Validator::make($request->all(), [
             "name"          => "required",
            "description"   => "required",
            "code"          => "required",
            "discount"      => "required",
            "stock"         => "required",
            "sale"          => "required",
            "status"        => "required",
            "sale_date"     => "required",
            // "image"         => "required",
            // "other_img"     => "required",
            "category_id"   =>"required",
            "sub_category_id"=>"required",
            "brand_id"      =>"required",
             "unit_id"      =>"required",
             "type_id"      =>"required",
            "size_id"      =>"required",
            "color_id"      =>"required",
        ]);
        if($validator->fails())
        {
            Toastr::error($validator->getMessageBag()->first());
            return redirect()->back();
        }
   /*      $image = $request->file('image');
        $imageName = time().'.'.$image->extension();

        $destinationPathThumbnail = public_path('/thumbnail');
        $img = Image::make($image->path());
        $img->resize(600, 400, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPathThumbnail.'/'.$imageName);
           $destinationPath = public_path('/uploads/whole_sale_product/');
        $image->move($destinationPath, $imageName); */


        WholeSaleProduct::create([
            "name"          => $request->name,
            "description"   => $request->description,
            "code"          => $request->code,
            "discount"      => $request->discount,
            "stock"         => $request->stock,
            "sale"          => $request->sale,
            "status"        => $request->status,
            "sale_date"     => $request->sale_date,
            "category_id"   =>$request->category_id,
            "sub_category_id"=>$request->sub_category_id,
            "brand_id"      =>$request->brand_id,
             "unit_id"      =>$request->unit_id,
             "type_id"      =>$request->type_id,
             "size_id"      =>$request->size_id,
            "color_id"      =>$request->color_id,
            // "image"         =>$imageName,

            // "other_image" =>$request->other_image
        ]);
        Toastr::success("WholeSaleProduct has been successfully created.");
        return redirect()->route('whole-sale-product.index');
    }
    public function show($id)
    {
        $product = WholeSaleProduct::find($id);
        return view("admin.whole_sale_products.product.show", compact("product"));
    }
    public function edit($id)
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $brands = Brand::all();
        $types = WholeSaleProductType::all();
        $units = Unit::all();
        $colors =Color::all();
        $sizes = Size::all();
        $product= WholeSaleProductType::find($id);
        return view("admin.whole_sale_products.product.edit", compact("product","categories","subCategories", "brands", "types", "units", "colors","sizes"));
    }
    public function update(Request $request,$id)
    {
         $validator= Validator::make($request->all(), [
             "name"          => "required",
            "description"   => "required",
            "code"          => "required",
            "discount"      => "required",
            "stock"         => "required",
            "sale"          => "required",
            "status"        => "required",
            "sale_date"     => "required",
            // "image"         => "required",
            // "other_img"     => "required",
            "category_id"   =>"required",
            "sub_category_id"=>"required",
            "brand_id"      =>"required",
             "unit_id"      =>"required",
             "type_id"      =>"required",
            "size_id"      =>"required",
            "color_id"      =>"required",
        ]);
        if($validator->fails())
        {
            Toastr::error($validator->getMessageBag()->first());
            return redirect()->back();
        }

        $product = WholeSaleProduct::find($id);
        $product->update([
            "name"          => $request->name,
            "description"   => $request->description,
            "code"          => $request->code,
            "discount"      => $request->discount,
            "stock"         => $request->stock,
            "sale"          => $request->sale,
            "status"        => $request->status,
            "sale_date"     => $request->sale_date,
            // "image"         => $request->image,
            // "other_img"     => $request->other_img,
            "category_id"   =>$request->category_id,
            "sub_category_id"=>$request->sub_category_id,
            "brand_id"      =>$request->brand_id,
             "unit_id"      =>$request->unit_id,
             "type_id"      =>$request->type_id,
             "size_id"      =>$request->size_id,
            "color_id"      =>$request->color_id,
           /*   "image" =>$request->image,
            "other_image" =>$request->other_image */
        ]);


        Toastr::success("WholeSaleProduct has been successfully updated.");
        return redirect()->route('whole-sale-product.index');
    }
     public function delete($id)
    {
      $product_type = WholeSaleProduct::find($id);
      $product_type->delete();
      Toastr::success("WholeSaleProduct has been successfully deleted.");
      return redirect()->back();
    }

}
