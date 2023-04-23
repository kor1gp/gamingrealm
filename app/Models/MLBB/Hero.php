<?php

namespace App\Models\MLBB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MLBB\Role;

class Hero extends Model
{
    use HasFactory;
    protected $connection = 'mlbb';
    protected $fillable = [
        'name',
        'role_id',
        'icon',
        'banner',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    

    public function battleSpells()
    {
        return $this->belongsToMany(BattleSpell::class, 'hero_battle_spell');
    }

    public function itemCounters()
    {
        return $this->belongsToMany(Hero::class, 'item_counters', 'hero_id', 'item_id');
    }
    public function emblems()
    {
        return $this->belongsToMany(Emblem::class, 'hero_emblems');
    }
    public function itemBuilds()
    {
        return $this->hasMany(ItemBuild::class);
    }

    public function weaknesses()
    {
        return $this->belongsToMany(Hero::class, 'hero_weaknesses', 'hero_id', 'weak_against_hero_id');
    }

    public function strengths()
    {
        return $this->belongsToMany(Hero::class, 'hero_strengths', 'hero_id', 'strong_against_hero_id');
    }
}
