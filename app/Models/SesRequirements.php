<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SesRequirements extends Model
{
    protected $table = 'ses_requirements';

    protected $fillable = [
        'userId',
        'checklistId',
        'requirement',
        'deadline',
    ];

    public function SesChecklist()
    {
        return $this->belongsTo(SesChecklist::class, 'checklistId');
    }

    use HasFactory;
}
