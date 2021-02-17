<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadCategory extends Model
{
    use HasFactory;

    protected $fillable = [

    ];

    //leads
    public function leads(){
        return $this->hasMany(Lead::class, 'category_id','id');
    }
}
