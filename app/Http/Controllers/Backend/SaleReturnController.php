<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\Product; 
use App\Models\Customer; 
use App\Models\WareHouse;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\Sale; 
use App\Models\SaleItem; 
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\SaleReturn; 
use App\Models\SaleReturnItem; 

class SaleReturnController extends Controller
{
    public function AllSalesReturn(){
        $allData = SaleReturn::orderBy('id','desc')->get();
        return view('admin.backend.return-sale.all_return_sales',compact('allData')); 
    }
    // End Method 


}
