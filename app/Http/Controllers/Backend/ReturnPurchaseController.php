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

    public function AddReturnPurchase(){
        $suppliers = Supplier::all();
        $warehouses = WareHouse::all();
        return view('admin.backend.return-purchase.add_return_purchase',compact('suppliers','warehouses'));
    }
     // End Method 

   public function StoreReturnPurchase(Request $request){

        $request->validate([
            'date' => 'required|date',
            'status' => 'required',
            'supplier_id' => 'required',
        ]);

    try {

        DB::beginTransaction();

        $grandTotal = 0;

        $purchase = ReturnPurchase::create([
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

        ReturnPurchaseItem::create([
            'return_purchase_id' => $purchase->id,
            'product_id' => $productData['id'],
            'net_unit_cost' => $netUnitCost,
            'stock' => $product->product_qty + $productData['quantity'],
            'quantity' => $productData['quantity'],
            'discount' => $productData['discount'] ?? 0,
            'subtotal' => $subtotal, 
        ]);

        $product->decrement('product_qty', $productData['quantity']); 
    }

    $purchase->update(['grand_total' => $grandTotal + $request->shipping - $request->discount]);

    DB::commit();

    $notification = array(
        'message' => 'Return Purchase Stored Successfully',
        'alert-type' => 'success'
     ); 
     return redirect()->route('all.return.purchase')->with($notification);  

    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json(['error' => $e->getMessage()], 500);
      } 
    }
    // End Method 

    public function DetailsReturnPurchase($id){
        $purchase = ReturnPurchase::with(['supplier','purchaseItems.product'])->find($id);
        return view('admin.backend.return-purchase.return_purchase_details',compact('purchase'));

    }
     // End Method 

     public function InvoiceReturnPurchase($id){
        $purchase = ReturnPurchase::with(['supplier','warehouse','purchaseItems.product'])->find($id);

        $pdf = Pdf::loadView('admin.backend.return-purchase.invoice_pdf',compact('purchase'));
        return $pdf->download('purchase_'.$id.'.pdf');

    }
     // End Method 

     public function EditReturnPurchase($id){
        $editData = ReturnPurchase::with('purchaseItems.product')->findOrFail($id);
        $suppliers = Supplier::all();
        $warehouses = WareHouse::all();
        return view('admin.backend.return-purchase.edit_return_purchase',compact('editData','suppliers','warehouses'));
    }
    // End Method 

    public function UpdateReturnPurchase(Request $request,$id){

        $request->validate([
            'date' => 'required|date',
            'status' => 'required', 
        ]); 

        DB::beginTransaction(); 

        try {

            $purchase = ReturnPurchase::findOrFail($id);

            $purchase->update([
                'date' => $request->date,
                'warehouse_id' => $request->warehouse_id,
                'supplier_id' => $request->supplier_id,
                'discount' => $request->discount ?? 0,
                'shipping' => $request->shipping ?? 0,
                'status' => $request->status,
                'note' => $request->note,
                'grand_total' => $request->grand_total, 
            ]);

        /// Get Old Purchase Items 
        $oldPurchaseItems = ReturnPurchaseItem::where('return_purchase_id',$purchase->id)->get();

        /// Loop for old purchase items and decrement product qty
         foreach($oldPurchaseItems as $oldItem){
            $product = Product::find($oldItem->product_id);
            if ($product) {
                $product->increment('product_qty',$oldItem->quantity);
                // Increment old quantity 
            }
         }

         /// Delete old Purchase Items 
         ReturnPurchaseItem::where('return_purchase_id',$purchase->id)->delete();

         // loop for new products and insert new purchase items

        foreach($request->products as $product_id => $productData){
          ReturnPurchaseItem::create([
            'return_purchase_id' => $purchase->id,
            'product_id' => $product_id,
            'net_unit_cost' => $productData['net_unit_cost'],
            'stock' => $productData['stock'],
            'quantity' => $productData['quantity'],
            'discount' => $productData['discount'] ?? 0,
            'subtotal' => $productData['subtotal'],  
        ]);

        /// Update product stock by incremeting new quantity 
        $product = Product::find($product_id);
        if ($product) {
            $product->decrement('product_qty',$productData['quantity']);
            // Increment new quantity
         } 
       }

       DB::commit();

       $notification = array(
           'message' => 'Return Purchase Updated Successfully',
           'alert-type' => 'success'
        ); 
        return redirect()->route('all.return.purchase')->with($notification);  

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
          }   
    }
    // End Method 

    public function DeleteReturnPurchase($id){
        try {
          DB::beginTransaction();
          $purchase = ReturnPurchase::findOrFail($id);
          $purchaseItems = ReturnPurchaseItem::where('return_purchase_id',$id)->get();

          foreach($purchaseItems as $item){
            $product = Product::find($item->product_id);
            if ($product) {
                $product->increment('product_qty',$item->quantity);
            }
          }
          ReturnPurchaseItem::where('return_purchase_id',$id)->delete();
          $purchase->delete();
          DB::commit();

          $notification = array(
            'message' => 'Return Purchase Deleted Successfully',
            'alert-type' => 'success'
         ); 
         return redirect()->route('all.return.purchase')->with($notification);  
            
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
          }  
    }
    // End Method 



} 
