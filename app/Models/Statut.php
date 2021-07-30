<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statut extends Model
{
    use HasFactory;
    protected $fillable=['name_statut','type_statut'];

    public function client()
    {
        return $this->hasMany(Client::class);
    }
}
