<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    use HasFactory;
    protected $fillable=['name_commune','marche_id','code_marche'];


    public function client()
    {
        return $this->hasMany(Client::class);
    }
    public function marche()
    {
          return $this->belongsTo(Marche::class);
    }
}
