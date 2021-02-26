<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    //leads
    public function customer(){
        return $this->belongsTo(User::class, 'customer_id','id');
    }

    //leads
    public function payments(){
        return $this->hasMany(Payment::class, 'income_id','id');
    }

    //leads
    public function service(){
        return $this->belongsTo(Service::class, 'service_id','id');
    }

    //leads
    public function product(){
        return $this->belongsTo(Product::class, 'product_id','id');
    }
}
