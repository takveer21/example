<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
//    public function about(){
//        $name = "Sakib khan";
//        $phone = "01789393933";
//
////        return view('about',compact('name','phone'));
//        return view('about',[
//            'name' => $name,
//            'phone' => $phone
//        ]);
//    }
//
//    public function profile(){
//        return view('profile.profile');
//    }
//
//    public function myProfile(Request $request){
//        return $request->name;
//    }

    public function home(){
        return view('public.home.index');
    }

    public function shop(){
        return view('public.shop.shop');
    }

    public function product(){
        return view('public.product.product');
    }
}
