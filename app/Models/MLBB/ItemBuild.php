<?php

namespace App\Models\MLBB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemBuild extends Model
{
    use HasFactory;
    protected $connection = 'mlbb';
    public function items()
    {
        return $this->belongsToMany(Item::class);
    }
}
