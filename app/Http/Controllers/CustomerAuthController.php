<?php

namespace App\Http\Controllers;

use App\Models\CustomerAuth;
use Illuminate\Http\Request;
use Session;
use Illuminate\Validation\Rule;

class CustomerAuthController extends Controller
{
    private $customer,$confirm_password;
    public function index(){
        return view('customer.auth.login');
    }
    public function indexRegister(){
        return view('customer.auth.register');
    }
    public function register(Request $request){

        $this->validate($request, [
            'name' => 'required|min:3|max:60',
            'email' => 'email | unique:customer_auths,email',
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',
        ],[
                'password.required_with'=>'confirm password did not matched'
            ]
        );
        $this->customer = new CustomerAuth();
        $this->customer->name = $request->name;
        $this->customer->email = $request->email;
        $this->customer->password = bcrypt($request->password);
        $this->customer->save();
        Session::put('customer_name',$this->customer->name);
        Session::put('customer_id',$this->customer->id);
        Session::put('customer_email',$this->customer->email);
        Session::put('customer_mobile',$this->customer->mobile);
        return back()->with('message','registration success please login.');
    }
    public function login(Request $request){
        $this->customer = CustomerAuth::where('email',$request->email)->where('status',1)->first();
        if ($this->customer){
            if (password_verify($request->password , $this->customer->password)){
                Session::put('customer_name',$this->customer->name);
                Session::put('customer_id',$this->customer->id);
                Session::put('customer_email',$this->customer->email);
                Session::put('customer_mobile',$this->customer->mobile);

                return redirect('/customer-dashboard');
            }
            else{
                return back()->with('message','sorry....invalid password.');
            }
        }
        else{
            return back()->with('message','sorry....invalid email.');
        }
    }
    public function logout(){

        Session::forget('customer_name');
        Session::forget('customer_id');
        Session::forget('customer_email');
        Session::forget('customer_mobile');

        return redirect('/');
    }

}
