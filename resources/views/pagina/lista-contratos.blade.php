@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')

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

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

@stop

