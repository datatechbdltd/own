<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteService extends Model
{
    use HasFactory;
         //invoices
         public function invoices(){
            return $this->hasMany(Invoice::class, 'service_id','id');
        }
}
