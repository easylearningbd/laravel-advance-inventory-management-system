<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WareHouse;

class WareHouseController extends Controller
{
    public function AllWarehouse(){
        $warehouse = WareHouse::latest()->get();
        return view('admin.backend.warehouse.all_warehouse',compact('warehouse'));
    }
    //End Method 


}
