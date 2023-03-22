<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Session;
class User extends Controller
{
    public function index()
    {
        // return view('User_login');
    }
    public function User_login(){
        return view('User_login');
    }

    public function user_register(){
        return view('user_register');
    }
    public function registeration(Request $request)
    {
        $customer = new Customers();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required'
        ]);

        $customer->name = $request->name;
        $customer->email=$request->email;
        $customer->password=FacadesHash::make($request->password);
        $response= $customer->save();
        if($response)
        {
            return back()->with('success','Successfully register');
            
        }else{
            return back()->with('fail','Something wrong');
        }
    }
    public function customer_login(Request $request){
        $customer = new Customers();
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $customer= Customers::where('email','=',$request->email)->first();
        if($customer){
            if(FacadesHash::check($request->password,$customer->password)){
                $request->Session()->put('loginId',$customer->id);
                return redirect('dashboard');
            }
            else{
                return back()->with('fail','Password does not matches');
            }
        }else{
            return back()->with("fail","Email is not register");
        }
    }

    public function dashboard(){
        $data = array();
        if(Session::has('loginId')){
            $data = Customers::where('id','=',Session::get('loginId'))->first();
        }
        return view('dashboard',compact('data'));
    }

    public function logout(){
        if(Session::has('loginId')){
            Session::forget('loginId');
            
            return redirect('User_login');
        }
    }

}