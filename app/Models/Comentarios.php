<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comentarios extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "historial_estaciones";

    public function estaciones()
    {
        return $this->hasOne(cat_proveedores::class, 'id', 'estacion');
    }
}
