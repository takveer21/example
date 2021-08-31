<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('admin.product.index',compact('products'));
    }

    public function create(){
        $categories = Category::where('status','1')->get();
        $brands = Brand::where('status','1')->get();
        // return $categories;
        return view('admin.product.create',compact('categories','brands'));
    }

    public function createAction(Request $request){
        // dd($request->file('image'));
        $product = new Product();
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->product_name = $request->product_name;
        $product->regular_price = $request->regular_price;
        $product->discount_price = $request->discount_price;
        $product->product_description = $request->product_description;
        $product->tags = $request->tags;
        $product->status = $request->status;
        $product->created_by = Auth::id();
        $product->save();

        foreach($request->file('image') as $key => $value){
            // dd($value);
            $imageName = time().rand().'.'.$value->getClientOriginalExtension();
            $imagePath = 'admin/images/product/'.$imageName;
            Image::make($value)->resize(195,247)->save($imagePath);

            $productImage = new ProductImage();
            $productImage->product_id = $product->id;
            $productImage->image = $imagePath;
            $productImage->image_type = $request->image_type[$key];
            $productImage->save();

        }

        return back()->with('message','Product Inserted Successfully');
    }

    public function detail($id){
        return view('admin.product.detail');
    }
}
