@extends('adminlte::page')

@section('title', 'Alta Ciudad')

@section('content_header')
@stop

@section('content')
    <form action="{{route('Ciudad.store')}}" method="post" class="col-5">
      @csrf
      <h1>Registrar Ciudad</h1>

      <label for="">Ciudad</label>
      <input class="form-control" type="text" placeholder="Nombre de Ciudad" name="nombre">

      <a href="{{route('Ciudad.lista')}}" class="btn btn-primary mb-2">Atras</a>

      <button type="submit" class="btn btn-primary mb-2">Registrar</button>
    </form>

@stop
