<?php

namespace App\Models;

use App\Http\Controllers\ProjectStatusController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    //invoice
    public function invoice(){
        return $this->belongsTo(Invoice::class, 'invoice_id','id');
    }

    //projectStatus
    public function projectStatus(){
        return $this->belongsTo(projectStatus::class, 'status_id','id');
    }
}
