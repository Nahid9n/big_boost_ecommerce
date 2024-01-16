<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public static $product;
    public function index()
    {
        return view('website.cart.index',[
            'products'=>Cart::content(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        self::$product = Product::find($request->id);

        Cart::add(
            [
                'id' => $request->id,
                'name' => self::$product->name,
                'qty' => $request->qty,
                'price' => $request->price,
                'options' => [
                    'size' => $request->size,
                    'color' => $request->color,
                    'image' => self::$product->image,
                    'code' => self::$product->code,
                    'shipping_cost' => self::$product->shipping_cost,
                ]
            ]);
        return back()->with('message','add to cart success.');
    }
//    public function buyNow(Request $request)
//    {
//
//        self::$product = Product::find($request->id);
//
//        Cart::add(
//            [
//                'id' => $request->id,
//                'name' => self::$product->name,
//                'qty' => $request->qty,
//                'price' => $request->price,
//                'options' => [
//                    'size' => $request->size,
//                    'color' => $request->color,
//                    'image' => self::$product->image,
//                    'code' => self::$product->code,
//                    'shipping_cost' => self::$product->shipping_cost,
//                ]
//            ]);
//        return redirect('')->with('message','add to cart success.');
//    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }

    public function deleteProduct(string $rowId){
        Cart::remove($rowId);
        Toastr::success("cart product has been successfully remove.");
        return back()->with('message','cart product remove successfully.');
    }
    public function updateProduct(Request $request){


        foreach ($request->data as $item){
            Cart::update($item['rowId'], $item['qty']);
        }
        Toastr::success("cart product has been successfully updated.");
        return redirect('/cart')->with('message','cart product update successfully.');
    }



}
