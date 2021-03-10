<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    //category
    public function category(){
        return $this->belongsTo(AssetCategory::class, 'category_id','id');
    }
}
