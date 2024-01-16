<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAuth extends Model
{
    use HasFactory;
    private static $customer;

    public static function newCustomer($request){
        self::$customer = new CustomerAuth();
        self::$customer->name = $request->name;
        self::$customer->email = $request->email;
        self::$customer->password = bcrypt($request->password);
        if (self::$customer->password = bcrypt($request->confirm_password)){
            self::$customer->save();
        }
        else{
            return back()->with('message','sorry confirm password not matched');
        }
    }

    public static function deleteCustomer($id){
        self::$customer = CustomerAuth::find($id);
        self::$customer->delete();
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
