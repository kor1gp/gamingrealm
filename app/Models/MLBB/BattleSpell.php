<?php

namespace App\Models\MLBB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BattleSpell extends Model
{
    use HasFactory;
    protected $connection = 'mlbb';
   
    public function heroes()
    {
        return $this->belongsToMany(Hero::class, 'hero_battle_spell');
    }


}
