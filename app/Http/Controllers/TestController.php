<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class TestController extends Controller
{

    public function home(){
        $sliders = Slider::where('status',1)->get();
        $brands = Brand::where('status',1)->get();
        $products = Product::with('productImage')->where('status',1)->get();

        return view('public.home.index',compact('sliders','brands','products'));
    }

    public function shop(){
        return view('public.shop.shop');
    }

    public function product(){
        return view('public.product.product');
    }
}
