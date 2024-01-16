<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SellerRegistrationMail;
use App\Models\Seller;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SellerController extends Controller
{

    public function sellerRegistrationForm()
    {
        return view("admin.sellers.auth.register");
    }

    public function sellerRegistration(Request $request)
    {
        /*     $validate = Validator::make($request->all(),[
                "first_name"    =>"required|min:3",
                "last_name"     =>"required|min:3",
                "email"         =>"required|unique:sellers,email",
                "password"      =>"required|confirmed|min:6",
                "phone"         =>"required",
                "dob"           =>"required|date",
                "address"       =>"required|string|max:255",
                'gender'        =>'required|in:Male,Female,Other',
                'shop_name'       =>'required|string',
            ]);
            if($validate->fails())
            {
                Toastr::error($validate->getMessageBag()->first());

            } */
            $otp=rand(100000,999999);
            $seller=Seller::create([
                "first_name"        =>$request->first_name,
                "last_name"         =>$request->last_name,
                "email"             =>$request->email,
                "password"          =>bcrypt($request->password),
                "DOB"               =>$request->dob,
                "address"           =>$request->address,
                "phone"             =>$request->phone,
                "gender"            =>$request->gender,
                "join_date"         =>Carbon::now()->format('Y-m-d'),
                "shop_name"         =>$request->shop_name,
                "otp"               =>$otp,
                'otp_expired_at'   => Carbon::now()->addMinutes(3)
            ]);

            Mail::to($seller->email)->send(new SellerRegistrationMail($otp));
           Toastr::success('Successfully Register');

            return redirect()->route('seller.otpForm');
    }
    public function SellerOtpForm(){
        return view('admin.sellers.auth.otp');
    }
    public function otpVerified(Request $request)
    {
      /*  $validate=validator::make($request->all(),[
        'otp'=>'required |digits:6'
       ]);
       if($validate->fails()){
        Toastr::error($validate->getMessageBag());
       } */

       $otpExitCustomer=Seller::where('otp',$request->otp)->first();


       if($otpExitCustomer)
       {
            if($otpExitCustomer->otp_expired_at >=now())
            {
                if ($otpExitCustomer->email_verified_at == null)
                    {
                        //verify here
                        $otpExitCustomer->update([
                            'otp'=>null,
                            'otp_expired_at'=>null,
                            'email_verified_at'=>now(),
                        ]);
                        toastr()->success('successfully verified.');

                        return redirect()->route('seller.loginForm');
                     }
            }
            toastr()->error('Seller not verfied.');
            return redirect()->back();
       }
       toastr()->error('Invalid Seller.');
       return redirect()->back();
    }


    public function sellerLoginForm()
    {
        return view("admin.sellers.auth.login");
    }
    public function sellerLogin(Request $request)
    {
        // dd($request->all());
        $validate=validator::make($request->all(), [
            "email"=> "required",
            "password"=> "required|min:6",
            ]);
        if( $validate->fails() )
        {
            Toastr::error($validate->getMessageBag());
            return redirect()->back();
        }
        $credentials=$request->except("_token");
        // dd($seller);
        if(auth()->guard("seller")->attempt($credentials)){
            Toastr::success('Login Success.');
            return redirect()->route('dashboard');
        }
        Toastr::error('Invalid user');
        return redirect()->back();


    }




    public function index()
    {
        $sellers = Seller::all();
        return view("admin.sellers.all_seller.index",compact('sellers'));
    }
     public function create()
    {
        return view("admin.sellers.all_seller.create");
    }
    public function store(Request $request)
    {
        try{

            $validate = Validator::make($request->all(),[
                "first_name"    =>"required|min:3",
                "last_name"     =>"required|min:3",
                "email"         =>"required|unique:sellers,email",
                "password"      =>"required|min:6",
                "phone"         =>"required",
                "dob"           =>"required|date",
                "address"       =>"required|string|max:255",
                'image'         =>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'gender'        =>'required|in:Male,Female,Other',
                'join_date'     =>'required|date',
                'shop_name'        =>'required|string',
                'status'        =>'required|in:0,1',
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
                $image->move(public_path('uploads/sellers'),$imageName);
            }

            Seller::create([
                "first_name"        => $request->first_name,
                "last_name"         => $request->last_name,
                "email"             => $request->email,
                "password"          => bcrypt($request->password),
                "DOB"               => $request->dob,
                "address"           => $request->address,
                "phone"             => $request->phone,
                "gender"            => $request->gender,
                "join_date"         => $request->join_date,
                "shop_name"         => $request->shop_name,
                "added_by"          => auth()->user()->name,
                "image"             => $imageName,
            ]);
            Toastr::success('Seller has been successfully created.');
            return redirect()->route('seller.index');

        } catch (Exception $e) {
            Log::error("Something went wrong!".$e->getMessage());
            return redirect()->back();
        }

    }
    public function show($sellerId)
    {
        $seller = Seller::find($sellerId);
        return view("admin.sellers.all_seller.show",compact("seller"));
    }
    public function edit($sellerId)
    {
        $seller = Seller::find($sellerId);
        return view("admin.sellers.all_seller.edit",compact("seller"));
    }
    public function update(Request $request, $sellerId)
    {
         try{
            $seller = Seller::find($sellerId);
            $validate = Validator::make($request->all(),[
                "first_name"    =>"required|min:3",
                "last_name"     =>"required|min:3",
                // "email"         =>"required|unique:sellers,email,".$sellerId,
                "password"      =>"required|min:6",
                "phone"         =>"required",
                "dob"           =>"required|date",
                "address"       =>"required|string|max:255",
                'image'         =>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'gender'        =>'required|in:Male,Female,Other',
                'join_date'     =>'required|date',
                'shop_name'       =>'required|string',
                'status'        =>'required|in:0,1',
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
                $image->move(public_path('uploads/sellers'),$imageName);
            }

            $seller->update([
                "first_name"        => $request->first_name,
                "last_name"         => $request->last_name,
                "email"             => $request->email,
                "password"          => bcrypt($request->password),
                "DOB"               => $request->dob,
                "address"           => $request->address,
                "phone"             => $request->phone,
                "gender"            => $request->gender,
                "join_date"         => $request->join_date,
                "shop_name"         => $request->shop_name,
                "added_by"          => auth()->user()->name,
                "image"             => $imageName,
            ]);
            Toastr::success('Seller has been successfully updated.');
            return redirect()->route('seller.index');

    }catch(Exception $e){
        Log::error("Something went wrong!".$e->getMessage());
        return redirect()->back();
    }

}
public function delete($sellerId)
{
    $seller = Seller::find($sellerId);
    $seller->delete();
    Toastr::success('Seller has been successfully deleted.');
    return redirect()->back();
}

}
