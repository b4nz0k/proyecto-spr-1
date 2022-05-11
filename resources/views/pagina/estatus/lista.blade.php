@extends('adminlte::page')

@section('title', 'Lista de Estatus')

@section('content_header')
@stop

@section('content')
<h1>Lista de Estatus</h1>
<a href="{{route('Estatus.alta')}}" class="btn btn-primary">Crear Nuevo</a>

<div class="container-md ml-2 col-6" >
    <table id="contratos" class="table table-striped mt-4 table-bordered shadow-l style="width:100%">
      <thead>
       <tr>
          <th scope="col">ID</th>
          <th scope="col">Nombre</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($estatus as $estatu)
        <tr>
          <td>{{$estatu->id}}</td>
          <td>{{$estatu->estatus}}</td>
          <td>
            <a href="/editar-estatus/{{ $estatu->id }}" class="btn btn-primary">Editar</a>
            <a href="/eliminar-estatus/{{$estatu->id }}"  class="btn btn-danger">Borrar</a>
          </td>
        </tr>

        @endforeach

      </tbody>
    </table>
</div>

@stop

