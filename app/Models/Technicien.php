<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Technicien
 * @package App\Models
 * @property string $matricule
 * @property Personne $personne
 */

class Technicien extends Model
{
    use HasFactory;
    protected $fillable=['matricule','photo'];

    public function personne()
    {
        return $this->morphOne(Personne::class,'human');
    }
    public function competences()
    {
        return $this->belongsToMany(Competence::class);
    }
}
