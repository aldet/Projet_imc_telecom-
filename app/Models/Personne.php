<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Personne
 * @package App\Models
 * @property string $name
 * @property string $adresse
 * @property string $prenom
 * @property string $code_postal
 * @property string $telephone
 * @property string $telephone_fixe
 * @property string $email
 * @property string $adresse_map
 */
class Personne extends Model
{
    use HasFactory;
    protected $fillable=[
        'name','prenom','adresse','code_postal','telephone','telephone_fixe','email','adresse_map'
    ];

    /**
     * Get the parent  model (Client or Technicient).
     */
    public function human()
    {
        return $this->morphTo();
    }
}
