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

    public function PurchaseReturnReport(){
        $returnPurchases = ReturnPurchase::with(['purchaseItems.product','supplier','warehouse'])->get();
        return view('admin.backend.report.purchase_return_report',compact('returnPurchases')); 
    }
      // End Method 


    public function SaleReport(){
        $saleReports = Sale::with(['saleItems.product','customer','warehouse'])->get();
        return view('admin.backend.report.sale_report',compact('saleReports')); 
    }
    // End Method 

     public function FilterSales(Request $request){

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $query = Sale::with(['saleItems.product','customer','warehouse']);

        if ($startDate && $endDate ) {
            $startDate = Carbon::parse($startDate)->startOfDay();
            $endDate = Carbon::parse($endDate)->endOfDay();
            $query->whereBetween('date',[$startDate,$endDate]);
        }

        $sales = $query->get();
        return response()->json(['sales' => $sales]);

    }
     // End Method 

     public function SaleReturnReport(){
        $returnSales = SaleReturn::with(['saleReturnItems.product','customer','warehouse'])->get();
        return view('admin.backend.report.sales_return_report',compact('returnSales')); 
    }
      // End Method 

    public function ProductStockReport(){
        $products = Product::with(['category','warehouse'])->get();
        return view('admin.backend.report.stock_report',compact('products'));

    }
      // End Method 


}
