<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IbuildPwsCisChecklist extends Model
{

    protected $table = 'ibuild_pws_cis_checklists';

    protected $fillable = [
        'userId',
        'subprojectId',
        'reviewDate',
        'waterSource',
        'waterSourceElevation',
        'serviceArea',
        'pwsCisAccreditedDistance',
    ];
    
    use HasFactory;
}
