<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Session;

class CustomerController extends Controller
{
    public function index(){
        return view('customer.home.index',[
            'orders'=>Order::where('customer_id',Session::get('customer_id'))->latest()->get(),
        ]);
    }

}
