<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Contratos;


class Pagos extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function contratos()
    {
        return $this->hasOne(Contratos::class, 'id', 'contrato');
    }
}
