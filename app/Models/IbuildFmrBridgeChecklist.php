<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IbuildFmrBridgeChecklist extends Model
{
    protected $table = 'ibuild_fmr_bridge_checklists';

    protected $fillable = [
        'userId',
        'subprojectId',
        'reviewDate',
        'connectedAllWeather',
        'accessibility',
        'maximumFloodLevel',
        'existingRow',
        'fmrBridgeAccreditedDistance',
        'trafficCount',
        'roadCategory',
    ];

    use HasFactory;
}
