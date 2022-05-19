@extends('adminlte::page')

@section('title', 'Alta Proveedor')

@section('content_header')
@stop
    @if (session()->has('msj'))
    <div class="alert alert-success" role="alert"> {{session('msj')}}</div>
    @endif
@section('content')
<div class="container-md bg-white col-10 p-5 shadow">

    <form action="{{route('Proveedores.store')}}" method="post" class="row gap-3">
      @csrf
      <h1>Registrar Provedor</h1>

      <div class="mb-3 col-md-4 col-auto">
          <label for="">Proveedor</label>
          <input class="form-control" type="text" placeholder="Nombre del Proveedor" name="nombre">
      </div>
      <div class="mb-3 col-md-6 col-auto">
          <label for="">Razon Social</label>
          <input class="form-control" type="text" placeholder="Razon Social" name="razon_social">
      </div>
      <div class="mb-3 col-md-5 col-auto">
          <label for="">Tipo</label>
          <select class="form-select" aria-label="Default select example" name="tipo">
          <option selected>Selecciona Tipo</option>
          <option value="Local">Local</option>
          <option value="Comercial">Comercial</option>
          <option value="Celular">Celular</option>
          </select>
      </div><hr>
      <div class="mb-3 col-md-4 col-auto">
      <a href="{{route('Proveedores.lista')}}" class="btn btn-primary mb-2 col-9"><-- Atras</a>
      </div>
      <div class="mb-3 col-md-4 col-auto">
        {{-- Empiza el boton modal --}}
        <button type="button" class="btn btn-primary col-9" data-toggle="modal" data-target="#exampleModalCenter">
          Guardar
      </button>
      </div>
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
        <button type="submit" class="btn btn-primary">Confirmar</button>
      </div>
    </div>
  </div>
</div>
      
  </form>
</div>
@stop
