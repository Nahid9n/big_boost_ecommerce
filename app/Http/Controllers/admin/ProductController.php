<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Size;
use App\Models\SubCategory;
use App\Models\Unit;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\Models\ProductSize;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $subCategories, $product;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product.product-all.index',['products'=>Product::all()]);
    }

    public function productByType($id)
        {
            return view('admin.product.product-by-type.index',[
                'type'=>ProductType::find($id),
                'products'=>Product::where('type_id',$id)->get()
            ]);
        }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.product-all.add', [
            'categories'        => Category::where('status',1)->get(),
            'sub_categories'    => SubCategory::where('status',1)->get(),
            'brands'            => Brand::where('status',1)->get(),
            'units'             => Unit::where('status',1)->get(),
            'colors'            => Color::where('status',1)->get(),
            'sizes'             => Size::where('status',1)->get(),
            'productTypes'      => ProductType::where('status',1)->get(),

        ]);
    }


    public function getSubCategoryByCategory()
    {
        $this->subCategories = SubCategory::where('category_id', $_GET['id'])->get();
        return response()->json($this->subCategories);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required | max:255',
            'flash_deal_discount'=>'max:100',
//            'image'=>'dimensions:width=500,height=500','mimes:jpg,png,jpeg,gif,svg','max:2048',
        ],[
            'name.required'=>'Product Name Required',
//            'image.dimensions'=>'image Must Be Width 500 & Height : 500',
            'image.mimes'=>'image Must Be jpg,png,jpeg,gif,svg',
            'image.max'=>'image Maximum 2048',
        ]);
        $this->product = Product::newProduct($request);
        ProductColor::newProductColor($request->colors, $this->product->id);
        ProductSize::newProductSize($request->sizes, $this->product->id);
        if ($request->other_images)
        {
            ProductImage::newProductImage($request->other_images, $this->product->id);
        }
        return back()->with('message','product info save successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.product.product-all.product-details',['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.product.product-all.edit', [
            'product'           => $product,
            'categories'        => Category::where('status',1)->get(),
            'sub_categories'    => SubCategory::where('status',1)->get(),
            'brands'            => Brand::where('status',1)->get(),
            'units'             => Unit::where('status',1)->get(),
            'colors'            => Color::where('status',1)->get(),
            'sizes'             => Size::where('status',1)->get(),
            'productTypes'      => ProductType::where('status',1)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        Product::updateProduct($request,$product);
        ProductColor::updateProductColor($request->colors, $product->id);
        ProductSize::updateProductSize($request->sizes, $product->id);
        if ($request->other_images)
        {
            ProductImage::updateProductImage($request->other_images, $product->id);
        }
        return redirect('admin/product')->with('message','Product info update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Product::deleteProduct($product->id);
        return back()->with('message','delete product success');
    }

    public function productReview(){
        return view('admin.product.review.index',[
            'products'=>Product::all(),
        ]);
    }

}
