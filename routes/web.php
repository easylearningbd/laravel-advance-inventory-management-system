<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\WareHouseController;
use App\Http\Controllers\Backend\SupplierController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\PurchaseController;
use App\Http\Controllers\Backend\ReturnPurchaseController;
use App\Http\Controllers\Backend\SaleController;
use App\Http\Controllers\Backend\SaleReturnController;
use App\Http\Controllers\Backend\TransferController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\RoleController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');
 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

Route::middleware('auth')->group(function () {

    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile'); 
    Route::post('/profile/store', [AdminController::class, 'ProfileStore'])->name('profile.store'); 
    Route::post('/admin/password/update', [AdminController::class, 'AdminPasswordUpdate'])->name('admin.password.update'); 
    
});


Route::middleware('auth')->group(function () {

Route::controller(BrandController::class)->group(function(){
    Route::get('/all/brand', 'AllBrand')->name('all.brand'); 
    Route::get('/add/brand', 'AddBrand')->name('add.brand');
    Route::post('/store/brand', 'StoreBrand')->name('store.brand');
    Route::get('/edit/brand/{id}', 'EditBrand')->name('edit.brand');
    Route::post('/update/brand', 'UpdateBrand')->name('update.brand');
    Route::get('/delete/brand/{id}', 'DeleteBrand')->name('delete.brand');
});

Route::controller(WareHouseController::class)->group(function(){
    Route::get('/all/warehouse', 'AllWarehouse')->name('all.warehouse'); 
    Route::get('/add/warehouse', 'AddWarehouse')->name('add.warehouse');
    Route::post('/store/warehouse', 'StoreWarehouse')->name('store.warehouse');
    Route::get('/edit/warehouse/{id}', 'EditWarehouse')->name('edit.warehouse');
    Route::post('/update/warehouse', 'UpdateWarehouse')->name('update.warehouse');
    Route::get('/delete/warehouse/{id}', 'DeleteWarehouse')->name('delete.warehouse');
});


Route::controller(SupplierController::class)->group(function(){
    Route::get('/all/supplier', 'AllSupplier')->name('all.supplier'); 
    Route::get('/add/supplier', 'AddSupplier')->name('add.supplier');
    Route::post('/store/supplier', 'StoreSupplier')->name('store.supplier');
    Route::get('/edit/supplier/{id}', 'EditSupplier')->name('edit.supplier');
    Route::post('/update/supplier', 'UpdateSupplier')->name('update.supplier');
    Route::get('/delete/supplier/{id}', 'DeleteSupplier')->name('delete.supplier');
});


Route::controller(SupplierController::class)->group(function(){
    Route::get('/all/customer', 'AllCustomer')->name('all.customer'); 
    Route::get('/add/customer', 'AddCustomer')->name('add.customer');
    Route::post('/store/customer', 'StoreCustomer')->name('store.customer');
    Route::get('/edit/customer/{id}', 'EditCustomer')->name('edit.customer');
    Route::post('/update/customer', 'UpdateCustomer')->name('update.customer');
    Route::get('/delete/customer/{id}', 'DeleteCustomer')->name('delete.customer');
});


Route::controller(ProductController::class)->group(function(){
    Route::get('/all/category', 'AllCategory')->name('all.category');
    Route::post('/store/category', 'StoreCategory')->name('store.category'); 
    Route::get('/edit/category/{id}', 'EditCategory');
    Route::post('/update/category', 'UpdateCategory')->name('update.category'); 
    Route::get('/delete/category/{id}', 'DeleteCategory')->name('delete.category');
    
});

Route::controller(ProductController::class)->group(function(){
    Route::get('/all/product', 'AllProduct')->name('all.product');
    Route::get('/add/product', 'AddProduct')->name('add.product');
    Route::post('/store/product', 'StoreProduct')->name('store.product');
    Route::get('/edit/product/{id}', 'EditProduct')->name('edit.product');
    Route::post('/update/product', 'UpdateProduct')->name('update.product');
    Route::get('/delete/product/{id}', 'DeleteProduct')->name('delete.product');
    Route::get('/details/product/{id}', 'DetailsProduct')->name('details.product');
    
});

Route::controller(PurchaseController::class)->group(function(){
    Route::get('/all/purchase', 'AllPurchase')->name('all.purchase');
    Route::get('/add/purchase', 'AddPurchase')->name('add.purchase'); 
    Route::get('/purchase/product/search', 'PurchaseProductSearch')->name('purchase.product.search'); 

    Route::post('/store/purchase', 'StorePurchase')->name('store.purchase'); 
    Route::get('/edit/purchase/{id}', 'EditPurchase')->name('edit.purchase');
    Route::post('/update/purchase/{id}', 'UpdatePurchase')->name('update.purchase'); 

    Route::get('/details/purchase/{id}', 'DetailsPurchase')->name('details.purchase'); 
    Route::get('/invoice/purchase/{id}', 'InvoicePurchase')->name('invoice.purchase');
    Route::get('/delete/purchase/{id}', 'DeletePurchase')->name('delete.purchase');
    
});



Route::controller(ReturnPurchaseController::class)->group(function(){
    Route::get('/all/return/purchase', 'AllReturnPurchase')->name('all.return.purchase');
    Route::get('/add/return/purchase', 'AddReturnPurchase')->name('add.return.purchase');
    Route::post('/store/return/purchase', 'StoreReturnPurchase')->name('store.return.purchase');

    Route::get('/details/return/purchase/{id}', 'DetailsReturnPurchase')->name('details.return.purchase');
    Route::get('/invoice/return/purchase/{id}', 'InvoiceReturnPurchase')->name('invoice.return.purchase');
    Route::get('/edit/return/purchase/{id}', 'EditReturnPurchase')->name('edit.return.purchase');
    Route::post('/update/return/purchase/{id}', 'UpdateReturnPurchase')->name('update.return.purchase');
    Route::get('/delete/return/purchase/{id}', 'DeleteReturnPurchase')->name('delete.return.purchase'); 
    
});


Route::controller(SaleController::class)->group(function(){
    Route::get('/all/sale', 'AllSales')->name('all.sale');
    Route::get('/add/sale', 'AddSales')->name('add.sale');
    Route::post('/store/sale', 'StoreSales')->name('store.sale');
    Route::get('/edit/sale/{id}', 'EditSales')->name('edit.sale');
    Route::post('/update/sale/{id}', 'UpdateSales')->name('update.sale');
    Route::get('/delete/sale/{id}', 'DeleteSales')->name('delete.sale');
    Route::get('/details/sale/{id}', 'DetailsSales')->name('details.sale');
    Route::get('/invoice/sale/{id}', 'InvoiceSales')->name('invoice.sale');
   
    
});

Route::controller(SaleReturnController::class)->group(function(){
    Route::get('/all/sale/return', 'AllSalesReturn')->name('all.sale.return'); 
    Route::get('/add/sale/return', 'AddSalesReturn')->name('add.sale.return');
    Route::post('/store/sale/return', 'StoreSalesReturn')->name('store.sale.return');
    Route::get('/edit/sale/return/{id}', 'EditSalesReturn')->name('edit.sale.return');
    Route::post('/update/sale/return/{id}', 'UpdateSalesReturn')->name('update.sale.return');

    Route::get('/details/sale/return/{id}', 'DetailsSalesReturn')->name('details.sale.return');
    Route::get('/delete/sale/return/{id}', 'DeleteSalesReturn')->name('delete.sale.return');

});


Route::controller(SaleReturnController::class)->group(function(){
    Route::get('/due/sale', 'DueSale')->name('due.sale');  
    Route::get('/due/sale/return', 'DueSaleReturn')->name('due.sale.return');

});


Route::controller(TransferController::class)->group(function(){
    Route::get('/all/transfer', 'AllTransfer')->name('all.transfer');
    Route::get('/add/transfer', 'AddTransfer')->name('add.transfer');
    Route::post('/store/transfer', 'StoreTransfer')->name('store.transfer');
    Route::get('/edit/transfer/{id}', 'EditTransfer')->name('edit.transfer');
    Route::post('/update/transfer/{id}', 'UpdateTransfer')->name('update.transfer');
    Route::get('/delete/transfer/{id}', 'DeleteTransfer')->name('delete.transfer');
    Route::get('/details/transfer/{id}', 'DetailsTransfer')->name('details.transfer'); 
     
});


Route::controller(ReportController::class)->group(function(){
    Route::get('/all/report', 'AllReport')->name('all.report'); 
    Route::get('/purchase/return/report', 'PurchaseReturnReport')->name('purchase.return.report');

    Route::get('/sale/report', 'SaleReport')->name('sale.report');
    Route::get('/sale/return/report', 'SaleReturnReport')->name('sale.return.report');
    Route::get('/product/stock/report', 'ProductStockReport')->name('product.stock.report');
    
    Route::get('/filter-purchases', 'FilterPurchases')->name('filter-purchases'); 
    Route::get('/filter-sales', 'FilterSales')->name('filter-sales');

});


Route::controller(RoleController::class)->group(function(){
    Route::get('/all/permission', 'AllPermission')->name('all.permission'); 
    Route::get('/add/permission', 'AddPermission')->name('add.permission');
    Route::post('/store/permission', 'StorePermission')->name('store.permission');
    Route::get('/edit/permission/{id}', 'EditPermission')->name('edit.permission');
    Route::post('/update/permission', 'UpdatePermission')->name('update.permission');
    Route::get('/delete/permission/{id}', 'DeletePermission')->name('delete.permission');
});

Route::controller(RoleController::class)->group(function(){
    Route::get('/all/roles', 'AllRoles')->name('all.roles'); 
    Route::get('/add/roles', 'AddRoles')->name('add.roles');
    Route::post('/store/roles', 'StoreRoles')->name('store.roles');
    Route::get('/edit/roles/{id}', 'EditRoles')->name('edit.roles');
    Route::post('/update/roles', 'UpdateRoles')->name('update.roles');
    Route::get('/delete/roles/{id}', 'DeleteRoles')->name('delete.roles');
});

Route::controller(RoleController::class)->group(function(){
    Route::get('/add/roles/permission', 'AddRolesPermission')->name('add.roles.permission'); 
    Route::post('/role/permission/store', 'RolePermissionStore')->name('role.permission.store'); 
    Route::get('/all/roles/permission', 'AllRolesPermission')->name('all.roles.permission'); 

     Route::get('/admin/edit/roles/{id}', 'AdminEditRoles')->name('admin.edit.roles');
     Route::post('/admin/roles/update/{id}', 'AdminRolesUpdate')->name('admin.roles.update'); 
     Route::get('/admin/delete/roles/{id}', 'AdminDeleteRoles')->name('admin.delete.roles');
    
});


Route::controller(RoleController::class)->group(function(){
    Route::get('/all/admin', 'AllAdmin')->name('all.admin'); 
    Route::get('/add/admin', 'AddAdmin')->name('add.admin');
    Route::post('/store/admin', 'StoreAdmin')->name('store.admin'); 
    Route::get('/edit/admin/{id}', 'EditAdmin')->name('edit.admin'); 
    Route::post('/update/admin/{id}', 'UpdateAdmin')->name('update.admin'); 
    Route::get('/delete/admin/{id}', 'DeleteAdmin')->name('delete.admin'); 
    
});




    
});



