<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadTag extends Model
{
    use HasFactory;

    //lead
    public function lead(){
        return $this->belongsTo(Lead::class, 'lead_id','id');
    }
}
