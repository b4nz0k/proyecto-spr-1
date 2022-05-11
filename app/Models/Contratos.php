<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\cat_proveedores;

class Contratos extends Model
{
    use HasFactory;
/*     public function proveedores()
    {
        return $this->hasOne(cat_proveedores::class, 'id', 'proveedor');
    } */
    public function ciudades()
    {
        return $this->hasOne(cat_ciudad::class, 'id', 'id_estacion');
    }
}
