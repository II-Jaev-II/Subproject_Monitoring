<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EconChecklist extends Model
{

    protected $table = 'econ_checklists';

    protected $fillable = [
        'userId',
        'subprojectId',
        'reviewDate',
        'summary',
        'status',
    ];

    use HasFactory;
}
