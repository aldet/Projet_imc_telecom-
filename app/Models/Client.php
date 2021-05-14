<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Client
 * @package App\Models
 * @property string $matricule
 * @property Personne $personne
 */
class Client extends Model
{
    use HasFactory;
    protected $fillable=['matricule','commune_id','nam_commune','residence_id','label'];

    public function personne()
    {
        return $this->morphOne(Personne::class, 'human');
    }
    public function commune()
    {
        return $this->belongsTo(Commune::class,'commune_id');
    }
    public function residence()
    {
        return $this->belongsTo(Residence::class);
    }
}
