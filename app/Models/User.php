<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'roles',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Support\Collection|\Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function isManager()
    {
        return $this->roles()->where('name','manager')->first();
    }
    public function isPlanificateur()
    {
        return $this->roles()->where('name','planificateur')->first();
    }
    public function isAdmin()
    {
        return $this->roles()->where('name','admin')->first();
    }
    public function isTechnicien()
    {
        return $this->roles()->where('name','technicien')->first();
    }
    public function clients()
    {
        return $this->belongsToMany(Client::class);
    }

    public function consignes()
    {
        return $this->hasMany(Consigne::class);
    }

}
