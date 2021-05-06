<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    use HasFactory;
    protected $fillable=['name_commune'];


    public function client()
    {
        return $this->hasMany(Client::class);
    }
}
