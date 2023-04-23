<?php

namespace App\Models\MLBB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmblemType extends Model
{
    use HasFactory;
    protected $connection = 'mlbb';
    public function emblems()
    {
        return $this->hasMany(Emblem::class);
    }

}
