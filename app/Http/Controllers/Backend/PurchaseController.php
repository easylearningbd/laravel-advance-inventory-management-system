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
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    public function AllPurchase(){
        $allData = Purchase::orderBy('id','desc')->get();
        return view('admin.backend.purchase.all_purchase',compact('allData')); 
    }
    // End Method 

    public function AddPurchase(){
        $suppliers = Supplier::all();
        $warehouses = WareHouse::all();
        return view('admin.backend.purchase.add_purchase',compact('suppliers','warehouses'));
    }
     // End Method 

    public function PurchaseProductSearch(Request $request){
        $query = $request->input('query');
        $warehouse_id = $request->input('warehouse_id');

        $products = Product::where(function($q) use ($query){
            $q->where('name', 'like', "%{$query}%")
            ->orwhere('code', 'like', "%{$query}%");
        })
        ->when($warehouse_id, function ($q) use ($warehouse_id){
            $q->where('warehouse_id',$warehouse_id);
        })
        ->select('id','name','code','price','product_qty')
        ->limit(10)
        ->get();

        return response()->json($products);
    
    }
     // End Method 

    public function StorePurchase(Request $request){

        $request->validate([
            'date' => 'required|date',
            'status' => 'required',
            'supplier_id' => 'required',
        ]);

    try {

        DB::beginTransaction();

        $grandTotal = 0;

        $purchase = Purchase::create([
            'date' => $request->date,
            'warehouse_id' => $request->warehouse_id,
            'supplier_id' => $request->supplier_id,
            'discount' => $request->discount ?? 0,
            'shipping' => $request->shipping ?? 0,
            'status' => $request->status,
            'note' => $request->note,
            'grand_total' => 0, 
        ]);

        /// Store Purchase Items & Update Stock 
    foreach($request->products as $productData){
        $product = Product::findOrFail($productData['id']);
        $netUnitCost = $productData['net_unit_cost'] ?? $product->price;

        if ($netUnitCost === null) {
            throw new \Exception("Net Unit cost is missing ofr the product id" . $productData['id']);
        }

        $subtotal = ($netUnitCost * $productData['quantity']) - ($productData['discount'] ?? 0);
        $grandTotal += $subtotal;

        PurchaseItem::create([
            'purchase_id' => $purchase->id,
            'product_id' => $productData['id'],
            'net_unit_cost' => $netUnitCost,
            'stock' => $product->product_qty + $productData['quantity'],
            'quantity' => $productData['quantity'],
            'discount' => $productData['discount'] ?? 0,
            'subtotal' => $subtotal, 
        ]);

        $product->increment('product_qty', $productData['quantity']); 
    }

    $purchase->update(['grand_total' => $grandTotal + $request->shipping - $request->discount]);

    DB::commit();

    $notification = array(
        'message' => 'Purchase Stored Successfully',
        'alert-type' => 'success'
     ); 
     return redirect()->route('all.purchase')->with($notification);  

    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json(['error' => $e->getMessage()], 500);
      } 
    }
    // End Method 


    public function EditPurchase($id){
        $editData = Purchase::with('purchaseItems.product')->findOrFail($id);
        $suppliers = Supplier::all();
        $warehouses = WareHouse::all();
        return view('admin.backend.purchase.edit_purchase',compact('editData','suppliers','warehouses'));
    }
    // End Method 


}
