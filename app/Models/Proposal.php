<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proposal extends Model
{
    use HasFactory;
    use SoftDeletes;
         //customer
         public function customer(){
            return $this->belongsTo(User::class, 'customer_id','id');
        }

        //service
         public function service(){
            return $this->belongsTo(WebsiteService::class, 'service_id','id');
        }

        //product
         public function product(){
            return $this->belongsTo(WebsiteProduct::class, 'product_id','id');
        }
}
