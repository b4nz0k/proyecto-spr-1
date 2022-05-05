@extends('layouts.vistapadre')

@section('contenidoPrincipal')

<h1>Lista de Contratos</h1>
<ul class="list-group list-group-horizontal list-group-item-action row-cols-6 list-group-item-action">

    <li class="list-group-item bg-primary text-white">Proveedor</li>
    <li class="list-group-item bg-primary text-white">Fecha de inicio</li>
    <li class="list-group-item bg-primary text-white">Proveedor</li>
    <li class="list-group-item bg-primary text-white">Fecha de corte</li>
    <li class="list-group-item bg-primary text-white">Numero de contrato</li>
    <li class="list-group-item bg-primary text-white">Importe Mensual</li>
  </ul>
@foreach ($contratos as $contrato )
    
  <ul class="list-group list-group-horizontal-sm row-cols-6">
    <li class="list-group-item">{{$contrato->id}}</li>
    <li class="list-group-item">{{$contrato->fecha_inicio}}</li>
    <li class="list-group-item">{{$contrato->proveedor}}</li>
    <li class="list-group-item">{{$contrato->dia_corte_mensual}}</li>
    <li class="list-group-item">{{$contrato->num_contrato}}</li>
    <li class="list-group-item">{{$contrato->importe_mensual}}</li>
  </ul>
 @endforeach
@endsection()