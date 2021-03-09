<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    //invoice
    public function invoice(){
        return $this->belongsTo(Invoice::class, 'invoice_id','id');
    }

    //offlinePaymentMethod
    public function offlinePaymentMethod(){
        return $this->belongsTo(OfflinePaymentMethod::class, 'payment_offline_method_id','id');
    }
}
