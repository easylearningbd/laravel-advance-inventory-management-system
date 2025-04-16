<?php

namespace App\Http\Controllers\Backend;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

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

    public function StoreBrand(Request $request){

        if ($request->file('image')) {
           $image = $request->file('image');
           $manager = new ImageManager(new Driver());
           $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
           $img = $manager->read($image);
           $img->resize(100,90)->save(public_path('upload/brand/'.$name_gen));
           $save_url = 'upload/brand/'.$name_gen;

           Brand::create([
                'name' => $request->name,
                'image' => $save_url
           ]);  
        }

        $notification = array(
            'message' => 'Brand Inserted Successfully',
            'alert-type' => 'success'
         ); 
         return redirect()->route('all.brand')->with($notification);  
    }
    //End Method



}
