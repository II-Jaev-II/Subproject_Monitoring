<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subproject extends Model
{
    protected $table = 'subprojects';

    protected $fillable = [
        'proponent',
        'cluster',
        'region',
        'province',
        'municipality',
        'barangay',
        'projectName',
        'projectType',
        'projectCategory',
        'fundSource',
        'indicativeCost',
        'letterOfInterest',
        'letterOfRequest',
        'letterOfEndorsement',
        'iPLAN',
        'iBUILD',
        'econ',
        'ses',
        'ggu',
        'inactiveDays',
        'userId',
    ];

    public function scopeSearch($query, $value)
    {
        $query->where('projectName', 'like', "%{$value}%");
    }

    use HasFactory;
}
