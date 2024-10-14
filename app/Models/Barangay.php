<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }

    use HasFactory;
}
