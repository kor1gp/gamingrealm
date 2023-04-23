<?php

namespace App\Models\MLBB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $connection = 'mlbb';
 
    public function itemType()
    {
        return $this->belongsTo(ItemType::class);
    }
}
