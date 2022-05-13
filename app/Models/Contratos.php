<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\cat_proveedores;
use App\Models\Estaciones;

class Contratos extends Model
{
    use HasFactory;
    use SoftDeletes;

/*     public function proveedores()
    {
        return $this->hasOne(cat_proveedores::class, 'id', 'proveedor');
    } */
    public function estaciones_tabla()
    {
        // return $this->hasOne(Estaciones::class, 'id', 'id_estacion');
    }
    public function proveedores_tabla()
    {
        // return $this->hasOne(cat_proveedores::class, 'id', 'proveedor');
    }
}
