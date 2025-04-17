<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;

class ProductController extends Controller
{
    public function AllCategory(){
        $category = ProductCategory::latest()->get();
        return view('admin.backend.category.all_category',compact('category'));
    }
    //End Method 

    public function StoreCategory(Request $request){
        
        ProductCategory::insert([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ','-',$request->category_name)), 
        ]);

        $notification = array(
            'message' => 'ProductCategory Inserted Successfully',
            'alert-type' => 'success'
         ); 
         return redirect()->back()->with($notification);
 
    }
     //End Method 





}
