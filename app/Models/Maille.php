<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maille extends Model
{
    use HasFactory;
    protected $fillable=['date_debut','date_actu','date_fin'];

    public function marche()
    {
       return $this->belongsTo(Marche::class);
    }
}
