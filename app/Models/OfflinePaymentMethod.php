<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfflinePaymentMethod extends Model
{
    use HasFactory;

    //payments
    public function payments(){
        return $this->hasmany(Payment::class, 'payment_offline_method_id','id');
    }
}
