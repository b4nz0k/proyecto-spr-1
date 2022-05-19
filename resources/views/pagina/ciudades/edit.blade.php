@extends('adminlte::page')

@section('title', 'Editar Ciudad')

@section('content_header')
@stop
    @if (session()->has('msj'))
    <div class="alert alert-success" role="alert"> {{session('msj')}}</div>
    @endif
@section('content')

<div class="ml-2 container-md" >

<form action="/editar-ciudad/{{$ciudades->id}}" method="POST" class="col-5">
    @csrf
      <h1>Editar Ciudad</h1>
      <label for="">Ciudad</label>
      <input class="form-control" type="text" value="{{$ciudades->nombre}}" name="nombre">
      <a href="{{route('Ciudad.lista')}}" class="btn btn-primary mb-2">Atras</a>


      
      
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
</div>
@stop