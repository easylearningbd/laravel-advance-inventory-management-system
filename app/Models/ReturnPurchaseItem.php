<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReturnPurchaseItem extends Model
{
    protected $guarded = [];

    public function purchase(){
        return $this->belongsTo(ReturnPurchase::class, 'return_purchase_id');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }

}
 