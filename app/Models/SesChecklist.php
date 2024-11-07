<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SesChecklist extends Model
{
    protected $table = 'ses_checklists';

    protected $fillable = [
        'id',
        'userId',
        'subprojectId',
        'reviewDate',
        'reason',
        'requirementCompliance',
        'cleared',
        'socialAssesment',
        'environmentalAssesment',
    ];

    public function sesRequirements()
    {
        return $this->hasMany(SesRequirements::class, 'checklistId');
    }

    use HasFactory;
}
