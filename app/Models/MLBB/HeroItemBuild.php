<?php

namespace App\Models\MLBB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroItemBuild extends Model
{
    use HasFactory;
    protected $connection = 'mlbb';
    protected $fillable = [
        
        'hero_id',
        'builds',
        
    ];
    public function heroes()
    {
        return $this->belongsToMany(Hero::class, 'hero_emblems');
    }
}
