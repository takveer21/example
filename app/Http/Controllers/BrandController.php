<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class BrandController extends Controller
{
    public function index(){
        $brands = Brand::all();
        return view('admin.brand.index',compact('brands'));
    }

    public function create(){
        return view('admin.brand.create');
    }

    public function createAction(Request $request){
        $request->validate([
            'brand_name' => 'required',
            'brand_description' => 'required',
            'image_path' => 'required|image',
        ]);

        $image = $request->file('image_path');
        $imageName = time().rand().'.'.$image->getClientOriginalExtension();
        $imagePath = 'admin/images/brand/'.$imageName;

        Image::make($image)->resize(270,120)->save($imagePath);

        $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        $brand->brand_description = $request->brand_description;
        $brand->image_path = $imagePath;
        $brand->status = $request->status;
        $brand->created_by = Auth::id();
        $brand->save();

        return back()->with('message','Brand Inserted Successfully');
    }

    public function edit($id){
        $brand = Brand::find($id);
        return view('admin.brand.edit',compact('brand'));
    }

    public function editAction(Request $request, $id){
        $brand = Brand::find($id);
        $image = $request->file('image_path');
        if($image) {
            unlink($brand->image_path);

            $imageName = time().rand().'.'.$image->getClientOriginalExtension();
            $imagePath = 'admin/images/brand/'.$imageName;

            Image::make($image)->resize(270,120)->save($imagePath);

            $brand->brand_name = $request->brand_name;
            $brand->brand_description = $request->brand_description;
            $brand->image_path = $imagePath;
            $brand->status = $request->status;
            $brand->created_by = Auth::id();
            $brand->save();
        } else {
            $brand->brand_name = $request->brand_name;
            $brand->brand_description = $request->brand_description;
            $brand->status = $request->status;
            $brand->created_by = Auth::id();
            $brand->save();
        }

        return back()->with('message','Slider Updated Successfully');
    }
}
