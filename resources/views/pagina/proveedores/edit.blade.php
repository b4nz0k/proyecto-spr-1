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

      
      
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
      Actualizar
  </button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">Advertencia</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
   Estas seguro que todos los campos sean correctos?
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
  <button type="submit" class="btn btn-primary mb-2">Actualizar</button>
  </div>
</div>
</div>
</div>
</form>

@stop
