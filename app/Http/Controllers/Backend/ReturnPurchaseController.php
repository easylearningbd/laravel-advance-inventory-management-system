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
use App\Models\ReturnPurchase; 
use App\Models\ReturnPurchaseItem; 
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class ReturnPurchaseController extends Controller
{
    public function AllReturnPurchase(){
        $allData = ReturnPurchase::orderBy('id','desc')->get();
        return view('admin.backend.return-purchase.all_return_purchase',compact('allData')); 
    }
    // End Method 



} 
