@extends('adminlte::page')

@section('title', 'Dashboard')
    @if (session()->has('msj'))
    <div class="alert alert-success" role="alert"> {{session('msj')}}</div>
    @endif
@section('content_header')
@stop

@section('content')
<div class="container-md bg-white col-12 p-1 shadow">

    <h1>Estaciones</h1>
    <p>Proximamente un mapa....</p>
    <p>Mientras una lista</p>
    <a href="{{route('Estaciones.alta')}}" class="btn btn-light">Crear Nuevo</a>
    <a href="{{route('Estaciones.actualizar')}}" class="btn btn-light">Actualizar Estatus</a>

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
              <a href="/editar-estacion/{{ $estacion->id }}" class="btn btn-warning col-12">Editar</a>
              <a href="/pagar-estacion/{{ $estacion->id }}" class="btn btn-primary col-12">Subir Pago</a>
            </td>
          </tr>
  
          @endforeach

        </tbody>
      </table>



</div>
@stop
