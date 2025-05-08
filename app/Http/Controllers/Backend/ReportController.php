<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product; 
use App\Models\Customer;  
use App\Models\WareHouse; 
use App\Models\Sale; 
use App\Models\SaleReturn; 
use Illuminate\Support\Facades\DB; 
use App\Models\Purchase; 
use App\Models\ReturnPurchase; 
use Carbon\Carbon;

class ReportController extends Controller
{
    public function AllReport(){
        $purchases = Purchase::with(['purchaseItems.product','supplier','warehouse'])->get();
        return view('admin.backend.report.all_report',compact('purchases')); 
    }
    // End Method 

    public function FilterPurchases(Request $request){

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $query = Purchase::with(['purchaseItems.product','supplier','warehouse']);

        if ($startDate && $endDate ) {
            $startDate = Carbon::parse($startDate)->startOfDay();
            $endDate = Carbon::parse($endDate)->endOfDay();
            $query->whereBetween('date',[$startDate,$endDate]);
        }

        $purchases = $query->get();
        return response()->json(['purchases' => $purchases]);

    }
     // End Method 


}
