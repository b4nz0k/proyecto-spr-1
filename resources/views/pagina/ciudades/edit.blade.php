@extends('adminlte::page')

@section('title', 'Editar Ciudad')

@section('content_header')
@stop

@section('content')

<div class="ml-2 container-md" >

<form action="/editar-ciudad/{{$ciudades->id}}" method="POST" class="col-5">
    @csrf
      <h1>Editar Ciudad</h1>
      <label for="">Ciudad</label>
      <input class="form-control" type="text" value="{{$ciudades->nombre}}" name="nombre">
      <a href="{{route('Ciudad.lista')}}" class="btn btn-primary mb-2">Atras</a>

      <button type="submit" class="btn btn-primary mb-2">Actualizar</button>
    </form>
</div>
@stop