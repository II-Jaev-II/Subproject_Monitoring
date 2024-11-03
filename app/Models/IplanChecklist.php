<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IplanChecklist extends Model
{
    protected $table = 'iplan_checklists';

    protected $fillable = [
        'id',
        'subprojectId',
        'explanation',
        'justificationFile',
        'linkedVca',
        'valueChainSegment',
        'opportunity',
        'specificIntervention',
        'pageMatrixVca',
        'page',
        'pcip',
        'pageMatrixPcip',
        'sensitivity',
        'exposure',
        'adaptiveCapacity',
        'overallVulnerability',
        'recommendation',
        'generalRecommendation',
        'userId',
    ];

    public function iPlanCommodities()
    {
        return $this->hasMany(IplanCommodity::class, 'checklistId');
    }

    public function iPlanRankAndComposite()
    {
        return $this->hasMany(IplanRankAndComposite::class);
    }

    use HasFactory;
}
