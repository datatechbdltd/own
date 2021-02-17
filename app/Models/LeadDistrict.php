<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadDistrict extends Model
{
    use HasFactory;

    //leads
    public function leads(){
        return $this->hasMany(Lead::class, 'district_id','id');
    }
}
