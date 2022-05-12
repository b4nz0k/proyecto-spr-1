<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\cat_proveedores;
use App\Models\Contratos;


class Pagos extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function proveedores_tabla()
    {
        return $this->hasOne(cat_proveedores::class, 'id', 'id_estacion');
    }
    public function contratos_tabla()
    {
        return $this->hasOne(Contratos::class, 'id', 'contrato');
    }
}
