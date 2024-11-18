<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IbuildVcriChecklist extends Model
{

    protected $table = 'ibuild_vcri_checklists';

    protected $fillable = [
        'userId',
        'subprojectId',
        'reviewDate',
        'accessibility',
        'lotDescription',
        'maximumFloodLevel',
        'vcriAccreditedDistance',
    ];

    use HasFactory;
}
