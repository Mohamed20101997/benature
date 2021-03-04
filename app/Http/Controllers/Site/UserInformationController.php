<?php

namespace App\Http\Controllers\Site;

use App\Basket\Basket;
use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserInformationController extends Controller
{

    protected $basket;
    public function __construct(Basket $basket)
    {
        $this->basket = $basket;

    }

    public function account(){

        $user = User::find(auth()->user()->id);
         $basket  = $this->basket;
        return view('site.account.index', compact('user','basket'));
    }

    public function postAccount(UserRequest $request){

        try{
            $user = User::find(auth()->user()->id)->update([
                'f_name' => $request->f_name,
                'l_name' => $request->l_name,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);

            return response()->json(['success'=>'Data is successfully added']);

        }catch(\Exception $ex)
        {
            return redirect()->back()->with(['error'=>'There are problem please try again ']);
        }
    }

    public function password(){

        $basket  = $this->basket;
        return view('site.account.password',compact('basket'));
    }

    public function postPassword(PasswordRequest $request){
        try{
            $hashedPassword = auth()->user()->password;

           if(\Hash::check($request->old_password , $hashedPassword )){

               $user = User::find(auth()->user()->id)->update([
                  'password' => bcrypt($request->password),
               ]);

               return response()->json(['success'=>'Data is successfully added']);
           }else{

               return response()->json(['error'=>'dontMatch']);
           }

        }catch(\Exception $ex)
        {
            return redirect()->back()->with(['error'=>'There are problem please try again ']);
        }
    }

    public function orderHistory(){

        $basket  = $this->basket;
        return view('site.account.history',compact('basket'));
    }

    public function profile(){

        $basket  = $this->basket;
        return view('site.account.profile',compact('basket'));
    }

    public function logout(){

        auth()->logout();
        return redirect()->route('login');

    }

}
