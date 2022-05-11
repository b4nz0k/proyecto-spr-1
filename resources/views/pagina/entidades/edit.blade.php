@extends('adminlte::page')

@section('title', 'Editar Entidad')

@section('content_header')
@stop

@section('content')
<form action="/editar-entidad/{{$proveedores->id}}" method="POST">
    @csrf
      <h1>Editar Entidad</h1>
      <label for="">Nombre</label>
      <input class="form-control" type="text" value="{{$entidades->nombre}}" name="nombre">
      <label for="">Abreviacion</label>
      <input class="form-control" type="text" value="{{$entidades->razon_social}}" name="abrev">
      <label for="">Poblacion Total</label>
      <input class="form-control" type="text" value="{{$entidades->tipo}}" name="pob_tot">
      <label for="">Poblacion Masc</label>
      <input class="form-control" type="text" value="{{$entidades->tipo}}" name="pob_masc">
      <label for="">Poblacion Fem</label>
      <input class="form-control" type="text" value="{{$entidades->tipo}}" name="pob_fem">
      <button type="submit" class="btn btn-primary mb-2">Actualizar</button>
    </form>

@stop
