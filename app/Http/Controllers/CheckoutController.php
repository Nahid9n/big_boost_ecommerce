<?php

namespace App\Http\Controllers;

use App\Models\CustomerAuth;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\OrdersDetails;
use Illuminate\Http\Request;
use Session;

class CheckoutController extends Controller
{
    private $order,$customer;
    public function index(){
        $this->customer = ' ';
        if (Session::get('customer_id'))
        {
            $this->customer = CustomerAuth::find(Session::get('customer_id'));
        }
        return view('website.checkout.index', ['customer' => $this->customer]);
    }
    public function newOrder(Request $request){
        $this->customer = CustomerAuth::where('email',$request->email)->orWhere('mobile',$request->phone)->first();
        $this->order = Order::newOrder($this->customer,$request);
        OrdersDetails::newOrderDetails($this->order);
        return redirect('/customer-dashboard')->with('message','order placed. please waiting for your product.');
    }

}
