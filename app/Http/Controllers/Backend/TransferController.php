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

    public function StoreTransfer(Request $request){

        $request->validate([
            'date' => 'required|date',
            'status' => 'required', 
        ]);

    try {

        DB::beginTransaction(); 

        $transfer = Transfer::create([
            'date' => $request->date,
            'from_warehouse_id' => $request->from_warehouse_id,
            'to_warehouse_id' => $request->to_warehouse_id,
            'discount' => $request->discount ?? 0,
            'shipping' => $request->shipping ?? 0,
            'status' => $request->status,
            'note' => $request->note,
            'grand_total' => 0, 

        ]);

        /// Store Sales Items & Update Stock 
    foreach($request->products as $productData){
        $product = Product::findOrFail($productData['id']);
        $netUnitCost = $product->price; 
        $quantity = $productData['quantity'];
        $discount = $productData['discount'];
        $subtotal = ($netUnitCost * $quantity) - $discount; 

        TransferItem::create([
            'transfer_id' => $transfer->id,
            'product_id' => $productData['id'],
            'net_unit_cost' => $netUnitCost,
            'stock' => $product->product_qty,
            'quantity' => $quantity,
            'discount' => $discount,
            'subtotal' => $subtotal, 
        ]);

        /// Decrement stock form 'from_warehouse'
        Product::where('id',$productData['id'])
            ->where('warehouse_id', $request->from_warehouse_id)
            ->decrement('product_qty',$quantity);

        // Check if the product exists in to_warehouse 

        $existingProduct = Product::where('name',$product->name)
            ->where('brand_id', $product->brand_id)
            ->where('warehouse_id', $request->to_warehouse_id)
            ->first();

        if ($existingProduct) {
            $existingProduct->increment('product_qty',$quantity);
        } else {
            // if not exists then create new product without code 
            Product::create([
                'name' => $product->name,
                'brand_id' => $product->brand_id,
                'warehouse_id' => $request->to_warehouse_id,
                'price' => $product->price,
                'product_qty' => $quantity,
                'status' => 1, // Assuing active status 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } 
        
    }
 
    DB::commit();

    $notification = array(
        'message' => 'Transfer Complete Successfully',
        'alert-type' => 'success'
     ); 
     return redirect()->route('all.transfer')->with($notification);  

    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json(['error' => $e->getMessage()], 500);
      } 
    }
    // End Method 




}
