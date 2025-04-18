<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Supplier;
use App\Models\Brand;
use App\Models\WareHouse;

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

     public function EditCategory($id){
        $category = ProductCategory::find($id);
        return response()->json($category);
     }
      //End Method 

      public function UpdateCategory(Request $request){
        $cat_id = $request->cat_id;

        ProductCategory::find($cat_id)->update([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ','-',$request->category_name)), 
        ]);

        $notification = array(
            'message' => 'ProductCategory Updated Successfully',
            'alert-type' => 'success'
         ); 
         return redirect()->back()->with($notification);
 
    }
     //End Method 

    public function DeleteCategory($id){

        ProductCategory::find($id)->delete();
        $notification = array(
            'message' => 'ProductCategory Delete Successfully',
            'alert-type' => 'success'
         ); 
         return redirect()->back()->with($notification);

    }
    //End Method 

    ///// Add Product all Methods 


    public function AllProduct(){
        $allData = Product::orderBy('id','desc')->get();
        return view('admin.backend.product.product_list',compact('allData'));
    }
    //End Method 

    public function AddProduct(){
        $categories = ProductCategory::all();
        $brands = Brand::all();
        $suppliers = Supplier::all();
        $warehouses = WareHouse::all();
        return view('admin.backend.product.add_product',compact('categories','brands','suppliers','warehouses')); 
    }
    //End Method 



}
