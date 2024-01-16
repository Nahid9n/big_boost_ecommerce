<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Courier;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminSalesController extends Controller
{
    public function order(){
        return view('admin.sales.order',[
            'orders'=>Order::all(),
        ]);
    }
    public function inHouseOrder(){
        return view('admin.sales.in-house-orders',[
            'products'=>Product::all(),
        ]);
    }
    public function sellerOrder(){
        return view('admin.sales.seller-orders',[
            'products'=>Product::all(),
        ]);
    }
    public function pickUpPointOrder(){
        return view('admin.sales.pickup-point-orders',[
            'products'=>Product::all(),
        ]);
    }
}
