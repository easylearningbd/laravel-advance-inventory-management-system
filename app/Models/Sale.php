<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $guarded = []; 

    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id');
    } 

    public function warehouse(){
        return $this->belongsTo(WareHouse::class, 'warehouse_id');
    }

    public function saleItems(){
        return $this->hasMany(SaleItem::class, 'sale_id');
    }

     
}
