@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<form action="/editar-contrato/{{$contratos->id}}" method="POST">
    @csrf
      <h1>Editar Contrato</h1>
      <label for="">Proveedor</label>
      <input class="form-control" type="number" value="{{$contratos->proveedor}}" name="proveedor">
      <label for="">Fecha de inicio</label>
      <input class="form-control" type="date" value="{{$contratos->fecha_inicio}}" name="fecha_inicio">
      <label for="">Contrato</label>
      <input class="form-control" type="text" value="{{$contratos->num_contrato}}" name="num_contrato">
      <label for="">Fecha de corte</label>
      <input class="form-control" type="date" value="{{$contratos->dia_corte_mensual}}" name="dia_corte_mensual">
      <label for="">ID Estacion</label>
      <input class="form-control" type="number" value="{{$contratos->id_estacion}}" name="id_estacion"> 
      <label for="">Importe Mensual</label>
      <input class="form-control" type="number" value="{{$contratos->importe_mensual}}" name="importe_mensual">
      <button type="submit" class="btn btn-primary mb-2">Registrar</button>
    </form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

@stop
