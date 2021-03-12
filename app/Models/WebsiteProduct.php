<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteProduct extends Model
{
    use HasFactory;

        //invoices
        public function invoices(){
            return $this->hasMany(Invoice::class, 'product_id','id');
        }

        //proposals
        public function proposals(){
            return $this->hasMany(Proposal::class, 'product_id','id');
        }
}
