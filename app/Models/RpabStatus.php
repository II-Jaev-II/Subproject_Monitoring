<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RpabStatus extends Model
{

    protected $table = 'rpab_status';

    protected $fillable = [
        'id',
        'iBUILD',
        'iPLAN',
        'iREAP',
        'ECON',
        'SES',
        'GGU'
    ];

    use HasFactory;
}
