<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip',
        'iso_code',
        'country',
        'city',
        'state',
        'state_name',
        'postal_code',
        'lat',
        'lon',
        'timexone',
        'continent',
        'currency',
        'default',
        'cached',
        'browser',
        'device',
        'os',
    ];
}
