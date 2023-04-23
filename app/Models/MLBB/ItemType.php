<?php

namespace App\Models\MLBB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemType extends Model
{
    use HasFactory;
    protected $connection = 'mlbb';
    public function items()
    {
        return $this->hasMany(Item::class);
    }

}
