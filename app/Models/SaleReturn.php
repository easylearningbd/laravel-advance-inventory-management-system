<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleReturn extends Model
{
    protected $guarded = []; 

    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id');
    } 

    public function warehouse(){
        return $this->belongsTo(WareHouse::class, 'warehouse_id');
    }
 
    public function saleReturnItems(){
        return $this->hasMany(SaleReturnItem::class, 'sale_return_id');
    }

}
