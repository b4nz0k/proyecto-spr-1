@extends('adminlte::page')

@section('title', 'Alta Estatus')

@section('content_header')
@stop

@section('content')
    <form action="{{route('Estatus.store')}}" method="post" class="col-5">
      @csrf
      <h1>Registrar Estatus</h1>

      <label for="">Estatus</label>
      <input class="form-control" type="text" placeholder="Nombre del Estatus" name="estatus">

      <a href="{{route('Estatus.lista')}}" class="btn btn-primary mb-2">Atras</a>

      <button type="submit" class="btn btn-primary mb-2">Registrar</button>
    </form>

@stop
