<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Customer;

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

    public function StoreSupplier(Request $request){
 
        Supplier::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        $notification = array(
            'message' => 'Supplier Inserted Successfully',
            'alert-type' => 'success'
         ); 
         return redirect()->route('all.supplier')->with($notification);

    }
    //End Method 

    public function EditSupplier($id){
        $supplier = Supplier::find($id);
        return view('admin.backend.supplier.edit_supplier',compact('supplier'));
    }
    //End Method 

    public function UpdateSupplier(Request $request){
        $supp_id = $request->id;

        Supplier::find($supp_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        $notification = array(
            'message' => 'Supplier Updated Successfully',
            'alert-type' => 'success'
         ); 
         return redirect()->route('all.supplier')->with($notification);

    }
    //End Method 

    public function DeleteSupplier($id){
        Supplier::find($id)->delete();

        $notification = array(
            'message' => 'Supplier Delete Successfully',
            'alert-type' => 'success'
         ); 
         return redirect()->back()->with($notification);

    }
    //End Method 

    ///// Customer Method All 

    public function AllCustomer(){
        $customer = Customer::latest()->get();
        return view('admin.backend.customer.all_customer',compact('customer'));
    }
    //End Method 

    public function AddCustomer(){ 
        return view('admin.backend.customer.add_customer');
    }
    //End Method 

    public function StoreCustomer(Request $request){
 
        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        $notification = array(
            'message' => 'Customer Inserted Successfully',
            'alert-type' => 'success'
         ); 
         return redirect()->route('all.customer')->with($notification);

    }
    //End Method 

    public function EditCustomer($id){
        $customer = Customer::find($id);
        return view('admin.backend.customer.edit_customer',compact('customer')); 
    }
        //End Method 

public function UpdateCustomer(Request $request){
    $cust_id = $request->id;

    Customer::find($cust_id)->update([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
    ]);

    $notification = array(
        'message' => 'Customer Updated Successfully',
        'alert-type' => 'success'
        ); 
     return redirect()->route('all.customer')->with($notification);

}
//End Method 

public function DeleteCustomer($id){
    Customer::find($id)->delete();

    $notification = array(
        'message' => 'Customer Deleted Successfully',
        'alert-type' => 'success'
        ); 
     return redirect()->back()->with($notification);
}
//End Method 



} 
