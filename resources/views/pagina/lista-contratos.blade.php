@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<h1>Lista de Contratos</h1>

<a href="{{route('Contratos.alta')}}" class="btn btn-primary">Crear Nuevo</a>

    <table id="contratos" class="table table-striped mt-4 table-bordered shadow-lg align-content-center" style="width:100%">
      <thead>
       <tr>
          <th scope="col">ID</th>
          <th scope="col">Estacion</th>
          <th scope="col">Fecha de inicio</th>
          <th scope="col">Proveedor</th>
          <th scope="col">Fecha de corte</th>
          <th scope="col">Numero de contrato</th>
          <th scope="col">Importe Mensual</th>
          <th scope="col">Accion</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($contratos as $contrato )
        @php
            $proveedor = isset(($contrato->proveedores_tabla)->nombre) ? (($contrato->proveedores_tabla)->nombre) : "nulo";
            $ciudad = isset(($estaciones->find($contrato->id_estacion)->ciudades)->nombre) ? (($estaciones->find($contrato->id_estacion)->ciudades)->nombre) : "nulo";
            $entidad = isset(($estaciones->find($contrato->id_estacion)->entidades)->nombre) ? (($estaciones->find($contrato->id_estacion)->entidades)->nombre) : "nulo";
        @endphp
        <tr>
          <td>{{ $contrato->id }}</td>
          <td>{{ ($ciudad) }} / {{ ($entidad) }}</td>
          <td>{{$contrato->fecha_inicio}}</td>
          <td>{{ ($proveedor) }}</td>
          <td>{{$contrato->dia_corte_mensual}}</td>
          <td>{{$contrato->num_contrato}}</td>
          <td>$ {{$contrato->importe_mensual}}</td>
          <td>
            <a href="/editar-contrato/{{ $contrato->id }}" class="btn btn-primary">Editar</a>

            <button type="button" class="btn btn-danger " data-toggle="modal" data-target="#exampleModalCenter">
              Eliminar
            </button>
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Advertencia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Estas seguro que Desea eliminar?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <a href="/eliminar-contrato/{{$contrato->id }}"  class="btn btn-danger">Eliminar</a>
                  </div>
                </div>
              </div>
            </div>
          </td>
        </tr>

        @endforeach

      </tbody>
    </table>


@stop

