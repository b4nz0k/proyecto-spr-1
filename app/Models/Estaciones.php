<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\cat_ciudad;
use App\Models\cat_entidad;

class Estaciones extends Model
{
    public function ciudades()
    {
        return $this->hasOne(cat_ciudad::class, 'id', 'ciudad');
    }
    public function entidades()
    {
        return $this->hasOne(cat_entidad::class, 'id', 'entidad');
    }
}
