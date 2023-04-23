<?php

namespace App\Models\MLBB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroItemCounter extends Model
{
    use HasFactory;
    protected $connection = 'mlbb';
}
