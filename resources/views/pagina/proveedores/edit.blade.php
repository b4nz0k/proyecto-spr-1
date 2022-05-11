@extends('adminlte::page')

@section('title', 'Editar Proovedor')

@section('content_header')
@stop

@section('content')
<form action="/editar-proveedor/{{$proveedores->id}}" method="POST">
    @csrf
      <h1>Editar Proovedor</h1>
      <label for="">nombre Proveedor</label>
      <input class="form-control" type="text" value="{{$proveedores->nombre}}" name="nombre">
      <label for="">Razon Social</label>
      <input class="form-control" type="text" value="{{$proveedores->razon_social}}" name="razon_social">
      <label for="">Tipo</label>
      <input class="form-control" type="text" value="{{$proveedores->tipo}}" name="tipo">
      <button type="submit" class="btn btn-primary mb-2">Actualizar</button>
    </form>

@stop
