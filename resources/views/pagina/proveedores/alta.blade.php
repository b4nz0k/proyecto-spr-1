@extends('adminlte::page')

@section('title', 'Alta Proveedor')

@section('content_header')
@stop

@section('content')
    <form action="{{route('Proveedores.store')}}" method="post">
      @csrf
      <h1>Registrar Provedor</h1>

      <label for="">Proveedor</label>
      <input class="form-control" type="text" placeholder="Nombre del Proveedor" name="nombre">
      <label for="">Razon Social</label>
      <input class="form-control" type="text" placeholder="Razon Social" name="razon_social">
      <label for="">Tipo</label>
      <select class="form-select" aria-label="Default select example" name="tipo">
      <option selected>Selecciona Tipo</option>
      <option value="Local">Local</option>
      <option value="Comercial">Comercial</option>
      <option value="Celular">Celular</option>
      </select>
      <a href="{{route('Proveedores.lista')}}" class="btn btn-primary mb-2">Atras</a>

      <button type="submit" class="btn btn-primary mb-2">Registrar</button>
    </form>

@stop
