<?php

namespace App\Http\Controllers\Backend;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function AllBrand(){
        $brand = Brand::latest()->get();
        return view('admin.backend.brand.all_brand',compact('brand'));
    }
    //End Method 

    public function AddBrand(){ 
        return view('admin.backend.brand.add_brand');
    }
    //End Method



}
