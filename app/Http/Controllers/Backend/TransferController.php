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
use App\Models\Transfer; 
use App\Models\TransferItem; 

class TransferController extends Controller
{
    public function AllTransfer(){
        $allData = Transfer::with(['transferItems.product'])->orderBy('id','desc')->get();
        return view('admin.backend.transfer.all_transfer',compact('allData')); 
    }
    // End Method 

    public function AddTransfer(){
        $warehouses = WareHouse::all();
        return view('admin.backend.transfer.add_transfer',compact('warehouses'));
    }
    // End Method 

}
