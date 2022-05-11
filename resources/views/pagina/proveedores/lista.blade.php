@extends('adminlte::page')

@section('title', 'Lista de Proveedores')

@section('content_header')
@stop

@section('content')
<h1>Lista de Proveedores</h1>
<a href="{{route('Proveedores.alta')}}" class="btn btn-primary">Crear Nuevo</a>


    <table id="contratos" class="table table-striped mt-4 table-bordered shadow-lg" style="width:100%">
      <thead>
       <tr>
          <th scope="col">ID</th>
          <th scope="col">Nombre</th>
          <th scope="col">Razon Socual</th>
          <th scope="col">Tipo</th>
          <th scope="col"> Accion</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($proveedores as $proveedor )

        <tr>
          <td>{{$proveedor->id}}</td>
          <td>{{$proveedor->nombre}}</td>
          <td>{{$proveedor->razon_social}}</td>
          <td>{{$proveedor->tipo}}</td>
          <td>
            <a href="/editar-proveedor/{{ $proveedor->id }}" class="btn btn-primary">Editar</a>
            <a href="/eliminar-proveedor/{{$proveedor->id }}"  class="btn btn-danger">Borrar</a>
          </td>
        </tr>

        @endforeach

      </tbody>
    </table>


@stop

