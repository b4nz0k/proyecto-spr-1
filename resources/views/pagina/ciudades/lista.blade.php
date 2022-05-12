@extends('adminlte::page')

@section('title', 'Lista de Ciudades')

@section('content_header')
@stop

@section('content')
<h1>Lista de Ciudades</h1>
<a href="{{route('Ciudad.alta')}}" class="btn btn-primary">Crear Nuevo</a>

<div class="container-md ml-2 col-6" >
  <table id="contratos" class="table table-striped mt-4 table-bordered shadow-lg" style="width:100%">
    <thead>
       <tr>
          <th scope="col">ID</th>
          <th scope="col">Nombre</th>
          <th scope="col">Accion</th>

        </tr>
      </thead>
      <tbody>
        @foreach ($ciudades as $ciudad)
        <tr>
          <td>{{$ciudad->id}}</td>
          <td>{{$ciudad->nombre}}</td>
          <td>
            <a href="/editar-ciudad/{{ $ciudad->id }}" class="btn btn-primary">Editar</a>
            <a href="/eliminar-ciudad/{{$ciudad->id }}"  class="btn btn-danger">Borrar</a>
          </td>
        </tr>

        @endforeach

      </tbody>
    </table>
</div>

@stop

