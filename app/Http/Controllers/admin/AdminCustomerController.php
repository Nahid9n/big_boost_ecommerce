<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AdminCustomer;
use App\Models\CustomerAuth;
use Illuminate\Http\Request;
use Session;
class AdminCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $customer;
    public function index()
    {
        return view('admin.customer.index',[
            'customers'=>CustomerAuth::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customer.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        CustomerAuth::newCustomer($request);
        return back()->with('message','customer added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AdminCustomer $adminCustomer)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdminCustomer $adminCustomer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdminCustomer $adminCustomer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        CustomerAuth::deleteCustomer($id);
        return back()->with('message','Customer Info Delete Successfully.');
    }
    public function loginAsCustomer(Request $request){
        $this->customer = CustomerAuth::where('email',$request->email)->first();
        if ($this->customer){
                Session::put('customer_name',$this->customer->name);
                Session::put('customer_id',$this->customer->id);
                Session::put('customer_email',$this->customer->email);
                Session::put('customer_mobile',$this->customer->mobile);

                return redirect('/customer-dashboard');
            }
        else{
            return back()->with('message','sorry....invalid email.');
        }
    }
}
