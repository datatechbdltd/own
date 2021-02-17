<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadThana extends Model
{
    use HasFactory;

    //leads
    public function leads(){
        return $this->hasMany(Lead::class, 'thana_id','id');
    }
}
