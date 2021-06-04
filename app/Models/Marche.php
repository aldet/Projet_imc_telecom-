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
    public function clientMarche()
    {
        //return $this->hasManyThrough(Client::class,Commune::class,'marche_id','commune_id','id');
    }
}
