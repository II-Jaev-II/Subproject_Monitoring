<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubprojectCommodity extends Model
{

    protected $table = 'subproject_commodities';

    protected $fillable = [
        'subprojectId',
        'commodity',
    ];

    use HasFactory;
}
