<?php

namespace App\Models\MLBB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCounter extends Model
{
    use HasFactory;
    protected $connection = 'mlbb';
    
}
