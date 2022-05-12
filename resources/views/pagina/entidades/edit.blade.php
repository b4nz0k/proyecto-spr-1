@extends('adminlte::page')

@section('title', 'Editar Entidad')

@section('content_header')
@stop

@section('content')
<div class="container-md ml-2 col-6" >

<form action="/editar-entidad/{{$entidades->id}}" method="POST">
    @csrf
      <h1>Editar Entidad</h1>
      <label for="">Nombre</label>
      <input class="form-control" type="text" value="{{$entidades->nombre}}" name="nombre">
      <label for="">Abreviacion</label>
      <input class="form-control" type="text" value="{{$entidades->abrev}}" name="abrev">
      <label for="">Poblacion Total</label>
      <input class="form-control" type="text" value="{{$entidades->pob_tot}}" name="pob_tot">
      <label for="">Poblacion Masc</label>
      <input class="form-control" type="text" value="{{$entidades->pob_masc}}" name="pob_masc">
      <label for="">Poblacion Fem</label>
      <input class="form-control" type="text" value="{{$entidades->pob_fem}}" name="pob_fem">
      <button type="submit" class="btn btn-primary mb-2">Actualizar</button>
    </form></div>

@stop
