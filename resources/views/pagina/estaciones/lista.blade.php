
@extends('adminlte::page')

@section('title', 'Estaciones')

@section('content_header')
@stop
    @if (session()->has('msj'))
    <div class="alert alert-success" role="alert"> {{session('msj')}}</div>
    @endif
@section('content')
<div class="container-md bg-white col-12 p-5 shadow">

    <h1>Estaciones</h1>
    <a href="{{route('Estaciones.alta')}}" class="bg-white btn btn-primary btn-lg border-3">Crear Nuevo</a>
    <a href="{{route('Estaciones.actualizar')}}" class="btn btn-warning btn-lg border-3">Actualizar Estatus</a>
    <hr>

    <table id="contratos" class="table table-striped mt-4 table-bordered shadow-lg" style="width:100%">
        <thead>
          <tr >
            <th scope="col">Ciudad</th>
            <th scope="col">Entidad</th>
            <th scope="col">Grupo</th>
            <th scope="col">Proveedor</th>
            <th scope="col">Status</th>
            <th scope="col">Comentarios</th>
            <th scope="col">Ultimo Pago</th>
            <th scope="col">Accion</th>
          </tr>
        </thead>
        <tbody>
          
          @foreach ($estaciones as $estacion)
          @php
          $color_tabla = null;
            //Pintando los campos de las tablas
                $pago = isset($estacion->pago_ultimo)  ?  ($estacion->pago_ultimo) : "No hay pago registrado";
                    if ($estacion->status == 1 ) { $color_tabla = "table-success"; }
                    else if ($estacion->status == 2 ) { $color_tabla = "table-warning"; }
                    else if ($estacion->status == 3 ) { $color_tabla = "table-danger"; }
                    else if ($estacion->status == 4 ) { $color_tabla = "table-active"; }
                    else { $color_tabla = "table-active"; }

                // $id_pagos = $pagos->find($id_proveedor)->monto;

          @endphp
          <tr class="{{$color_tabla}}">
            <td>{{$estacion->ciudad_nombre }}</td>
            <td>{{$estacion->entidad_nombre }}</td>
            <td>{{$estacion->grupo}}</td>
            <td>{{$estacion->proveedor_nombre }} </td>
            <td>{{$estacion->status }}</td>
            <td>{{$estacion->comentarios}}</td>
            <td>{{$estacion->pago_ultimo}}</td>
            <td>
              <a href="/editar-estacion/{{ $estacion->id }}" class="btn btn-outline-primary col-12"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">              <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
              </svg> </a>
              <a href="/pagar-estacion/{{ $estacion->id }}" class="btn btn-outline-success col-12"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
              </svg></a>
            </td>
          </tr>
  
          @endforeach
{{--           <div class="d-flex justify-content-end">
          {{ $estaciones->onEachSide(5)->links() }}
        </div> --}}
        </tbody>

      </table>



</div>
@stop
