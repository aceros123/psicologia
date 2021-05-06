<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formulario extends Model
{
    use HasFactory;

    protected $fillable = ['descripcion','slug'];

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function posts(){
        return $this->hasMany(post::class);
    }
}
