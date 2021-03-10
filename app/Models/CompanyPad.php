<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyPad extends Model
{
    use HasFactory;
    use SoftDeletes;

    //creator
    public function creator(){
        return $this->belongsTo(User::class, 'creator_id','id');
    }
}
