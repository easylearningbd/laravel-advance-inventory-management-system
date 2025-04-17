<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function AllSupplier(){
        $supplier = Supplier::latest()->get();
        return view('admin.backend.supplier.all_supplier',compact('supplier'));
    }
    //End Method 

    public function AddSupplier(){ 
        return view('admin.backend.supplier.add_supplier');
    }
    //End Method 

} 
