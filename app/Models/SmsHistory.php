<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsHistory extends Model
{
    use HasFactory;

    //user
    public function sender(){
        return $this->belongsTo(User::class, 'sender_id','id');
    }
}
