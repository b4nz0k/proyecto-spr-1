@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<h1>Lista de Contratos</h1>

<a href="{{route('Contratos.alta')}}" class="btn btn-primary">Crear Nuevo</a>

    <table id="contratos" class="table table-striped mt-4 table-bordered shadow-lg" style="width:100%">
      <thead>
       <tr>
          <th scope="col">Proveedor</th>
          <th scope="col">Fecha de inicio</th>
          <th scope="col">Proveedor</th>
          <th scope="col">Fecha de corte</th>
          <th scope="col">Numero de contrato</th>
          <th scope="col">Importe Mensual</th>
          <th scope="col"> Accion</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($contratos as $contrato )

        <tr>
          <td>{{$contrato->proveedor}}</td>
          <td>{{$contrato->fecha_inicio}}</td>
          <td>{{$contrato->proveedor}}</td>
          <td>{{$contrato->dia_corte_mensual}}</td>
          <td>{{$contrato->num_contrato}}</td>
          <td>{{$contrato->importe_mensual}}</td>
          <td>
            <a href="/editar-contrato/{{ $contrato->id }}" class="btn btn-primary">Editar</a>
            <a href="/eliminar-contrato/{{$contrato->id }}"  class="btn btn-danger">Borrar</a>
          </td>
        </tr>

        @endforeach

      </tbody>
    </table>


@stop

