<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    protected $fillable = [
        'add_by_id',
        'name',
        'email',
        'phone',
        'date_of_birth',
        'gender',
        'is_married',
        'company_name',
        'profession',
        'address',
        'company_website',
        'company_facebook_page',
        'description',
    ];
    //adder
    public function adder(){
        return $this->belongsTo(User::class, 'add_by_id','id');
    }

    //updater
    public function updater(){
        return $this->belongsTo(User::class, 'update_by_id','id');
    }

    //category
    public function category(){
        return $this->belongsTo(LeadCategory::class, 'category_id','id');
    }

    //thana
    public function upazila(){
        return $this->belongsTo(LeadThana::class, 'thana_id','id');
    }

    //district
    public function district(){
        return $this->belongsTo(LeadDistrict::class, 'district_id','id');
    }

    //service
    public function service(){
        return $this->belongsTo(LeadService::class, 'service_id','id');
    }

    //tags
    public function tags(){
        return $this->hasMany(LeadTag::class, 'lead_id','id');
    }

}
