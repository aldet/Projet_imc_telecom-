<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consigne extends Model
{
    use HasFactory;
    protected $fillable=['description','created_at','client_id','user_id','date_rappel','date_consigne','nouveau_contact','statut_client_id'];

    public function client()
    {
         return $this->belongsTo(Client::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
