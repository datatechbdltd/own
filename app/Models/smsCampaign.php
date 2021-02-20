<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class smsCampaign extends Model
{
    use HasFactory;

    //leadCategory
    public function leadCategory(){
        return $this->belongsTo(LeadCategory::class, 'category_id','id');
    }

}
