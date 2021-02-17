<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadService extends Model
{
    use HasFactory;

    //leads
    public function leads(){
        return $this->hasMany(Lead::class, 'service_id','id');
    }
}
