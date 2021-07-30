<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motif extends Model
{
    use HasFactory;
    protected $fillable=['motif','type_motif'];

    public function client()
    {
        return $this->hasMany(Client::class);
    }

}
