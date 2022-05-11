@extends('adminlte::page')

@section('title', 'Editar Proovedor')

@section('content_header')
@stop

@section('content')

<div class="ml-2 container-md" >

<form action="/editar-estatus/{{$estatus->id}}" method="POST" class="col-5">
    @csrf
      <h1>Editar Estatus</h1>
      <label for="">Estatus</label>
      <input class="form-control" type="text" value="{{$estatus->estatus}}" name="estatus">
      <a href="{{route('Estatus.lista')}}" class="btn btn-primary mb-2">Atras</a>
      <button type="submit" class="btn btn-primary mb-2">Actualizar</button>
    </form>
</div>
@stop
