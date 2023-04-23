<?php

namespace App\Models\MLBB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroEmblem extends Model
{
    use HasFactory;
    protected $connection = 'mlbb';
    protected $fillable = [
        
        'hero_id',
        'emblems',
        'emblem_type_id'
        
    ];
    public function heroes()
    {
        return $this->belongsToMany(Hero::class, 'hero_emblems');
    }
}
