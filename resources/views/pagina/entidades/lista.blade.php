@extends('adminlte::page')

@section('title', 'Lista de Entidades')

@section('content_header')
@stop

@section('content')
<h1>Lista de Entidades</h1>
<a href="{{route('Entidad.alta')}}" class="btn btn-primary">Crear Nuevo</a>

<div class="container-md ml-2 col-10 container-sm" >
  <table id="contratos" class="table table-striped mt-4 table-bordered shadow-lg" style="width:100%">
      <thead>
       <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Abreviacion</th>
          <th scope="col">Poblacion total</th>
          <th scope="col">Poblacion M</th>
          <th scope="col">Poblacion F</th>
          <th scope="col">Total viv</th>
          <th scope="col"> Accion</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($entidades as $entidad )

        <tr>
          <td>{{$entidad->nombre}}</td>
          <td>{{$entidad->abrev}}</td>
          <td>{{$entidad->pob_tot}}</td>
          <td>{{$entidad->pob_masc}}</td>
          <td>{{$entidad->pob_fem}}</td>
          <td>{{$entidad->tot_viv}}</td>
          <td>
            <a href="/editar-entidad/{{ $entidad->id }}" class="btn btn-primary">Editar</a>
            <a href="/eliminar-entidad/{{$entidad->id }}"  class="btn btn-danger">Borrar</a>
          </td>
        </tr>

        @endforeach

      </tbody>
    </table>
</div>

@stop

