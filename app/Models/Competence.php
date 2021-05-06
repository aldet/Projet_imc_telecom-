<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    use HasFactory;
    protected $fillable=['label','description'];

    public function techniciens()
    {
         return $this->belongsToMany(Technicien::class);
    }
}
