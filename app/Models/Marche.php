<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marche extends Model
{
    use HasFactory;
    protected $fillable=['code_marche','label_marche'];

    public function commune()
    {
        return $this->hasMany(Commune::class);
    }
}
