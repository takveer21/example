<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }

    public function create(){
        return view('admin.category.create');
    }

    public function createAction(Request $request){
        $request->validate([
            'category_name' => 'required|alpha',
            'category_description' => 'required|max:5',
            'status' => 'required',
        ]);


        $category = new Category();
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->status = $request->status;
        $category->created_by = Auth::id();
        $category->save();

        return back()->with('message','Category Inserted Successfully');
    }
}
