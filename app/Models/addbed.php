<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addbed extends Model
{
    use HasFactory;
     protected $fillable = [
        'division',
        'station',
        'building',
        'floor',
        'roomno',
        'bedno',
    ];
}
