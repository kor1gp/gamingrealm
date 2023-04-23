<?php

namespace App\Models\MLBB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emblem extends Model
{
    use HasFactory;
    protected $connection = 'mlbb';
    
    public function emblemType()
    {
        return $this->belongsTo(EmblemType::class);
    }
}
