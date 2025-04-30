<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product; 
use App\Models\Supplier; 
use App\Models\WareHouse;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\Purchase; 
use App\Models\PurchaseItem; 

class PurchaseController extends Controller
{
    public function AllPurchase(){
        $allData = Purchase::orderBy('id','desc')->get();
        return view('admin.backend.purchase.all_purchase',compact('allData')); 
    }
    // End Method 


}
