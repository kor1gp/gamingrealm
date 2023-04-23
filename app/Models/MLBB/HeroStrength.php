<?php

namespace App\Models\MLBB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroStrength extends Model
{
    use HasFactory;
    protected $connection = 'mlbb';
    
}
