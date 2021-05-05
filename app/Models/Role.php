<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * @package App\Models
 * @property integer $id
 * @property string $name
 */
class Role extends Model
{
    use HasFactory;
    protected  $fillable =[
       'name',
    ];
    public function users(){
        return $this->belongsToMany(User::class);
    }
}
