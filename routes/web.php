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




    
});



