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
    protected $fillable=['matricule','commune_id','name_commune','residence_id','label','motif_id','motif','statut_id','name_statut','code_marche'];

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

    public function motif()
    {
        return $this->belongsTo(Motif::class);
    }
    public function statut()
    {
        return $this->belongsTo(Statut::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'consignes')->withPivot('description','created_at');
    }

}
