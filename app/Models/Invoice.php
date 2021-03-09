<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory;
    use SoftDeletes;

    //customer
    public function customer(){
        return $this->belongsTo(User::class, 'customer_id','id');
    }

    //product
    public function product(){
        return $this->belongsTo(Product::class, 'product_id','id');
    }

    //service
    public function service(){
        return $this->belongsTo(Service::class, 'service_id','id');
    }

    //payments
    public function payments(){
        return $this->hasMany(Payment::class, 'invoice_id','id');
    }
}
