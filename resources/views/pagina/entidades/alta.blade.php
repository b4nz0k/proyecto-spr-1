@extends('adminlte::page')

@section('title', 'Alta Entidades')

@section('content_header')
@stop

@section('content')
<div class="container-md ml-2 col-6" >

    <form action="{{route('Entidad.store')}}" method="post">
      @csrf
      <h1>Registrar Entidad</h1>

      <label for="">Nombre</label>
      <input class="form-control" type="text" placeholder="Nombre de Entidad" name="nombre">
      <label for="">Abreviacion</label>
      <input class="form-control" type="text" placeholder="Abreviacion" name="abrev">
      <label for="">Poblacion Total</label>
      <input class="form-control" type="number" placeholder="No Poblacion Total" name="pob_tot">
      <label for="">Poblacion Masc</label>
      <input class="form-control" type="number" placeholder="No Poblacion Masculino" name="pob_masc">
      <label for="">Poblacion Fem</label>
      <input class="form-control" type="number" placeholder="No Poblacion Femenino" name="pob_fem">

      <a href="{{route('Entidad.lista')}}" class="btn btn-primary mb-2">Atras</a>

      <button type="submit" class="btn btn-primary mb-2">Registrar</button>
    </form>
</div>
@stop
