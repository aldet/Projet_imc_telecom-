<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marche extends Model
{
    use HasFactory;
    protected $fillable=['code_marche','label_marche','date_debut','statut','date_fin'];

    public function commune()
    {
        return $this->hasMany(Commune::class);
    }
    public function maille()
    {
        return $this->hasOne(Maille::class);
    }
}
