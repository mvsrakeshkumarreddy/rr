<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class checkin extends Model
{
    use HasFactory;
     protected $fillable = [
        'bedno',
        'station',
        'building',
        'division',
        'bedno',
        'crewname',
        'crewid',
        'tokenno',
        'checkintime',
    ];
}
