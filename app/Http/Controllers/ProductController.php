<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(){
        $products=DB::table('product')->get();
        return view('index',['products'=>$products]);
    }

    public function product(){
        $products=DB::table('product')->get();
        return view('/product',['products'=>$products]);
    }

}
