<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GGUChecklist extends Model
{
    protected $table = 'ggu_checklists';

    protected $fillable = [
        'userId',
        'subprojectId',
        'reviewDate',
        'kmzFile',
        'report',
        'remarks',
    ];

    use HasFactory;
}
