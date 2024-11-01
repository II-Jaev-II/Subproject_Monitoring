<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IplanCommodity extends Model
{

    protected $table = 'iplan_commodities';

    protected $fillable = [
        'id',
        'checklistId',
        'commodityName',
        'userId',
    ];

    public function iPlanChecklist()
    {
        return $this->belongsTo(IplanChecklist::class, 'checklistId');
    }

    use HasFactory;
}
