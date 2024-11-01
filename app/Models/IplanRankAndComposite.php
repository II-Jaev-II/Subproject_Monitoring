<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IplanRankAndComposite extends Model
{

    protected $table = 'iplan_rank_and_composites';

    protected $fillable = [
        'id',
        'checklistId',
        'evsaRankMango',
        'compositeIndexMango',
        'evsaRankOnion',
        'compositeIndexOnion',
        'evsaRankGoat',
        'compositeIndexGoat',
        'evsaRankPeanut',
        'compositeIndexPeanut',
        'evsaRankTomato',
        'compositeIndexTomato',
        'evsaRankMungbean',
        'compositeIndexMungbean',
        'evsaRankBangus',
        'compositeIndexBangus',
        'evsaRankGarlic',
        'compositeIndexGarlic',
        'evsaRankCoffee',
        'compositeIndexCoffee',
        'evsaRankHogs',
        'compositeIndexHogs',
        'userId',
    ];

    public function iPlanChecklist()
    {
        return $this->belongsTo(IplanChecklist::class);
    }

    use HasFactory;
}
