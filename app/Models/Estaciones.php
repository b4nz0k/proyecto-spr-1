<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\cat_ciudad;
use App\Models\cat_entidad;
use App\Models\cat_proveedores;
use App\Models\cat_estatus;

class Estaciones extends Model
{
    use SoftDeletes;
    use HasFactory;

    public function entidades()
    {
        return $this->hasOne(cat_entidad::class, 'id' , 'entidad');
    }
    public function ciudades()
    {
        return $this->hasOne(cat_ciudad::class, 'id', 'ciudad');
    }

    public function proveedores()
    {
        return $this->hasOne(cat_proveedores::class, 'id', 'proveedor');
    }
    public function estatus_tabla()
    {
        return $this->hasOne(cat_estatus::class, 'id', 'estatus');
    }
}
