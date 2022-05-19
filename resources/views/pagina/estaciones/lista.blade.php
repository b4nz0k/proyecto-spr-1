@extends('adminlte::page')

@section('title', 'Dashboard')
    @if (session()->has('msj'))
    <div class="alert alert-success" role="alert"> {{session('msj')}}</div>
    @endif
@section('content_header')
@stop

@section('content')

    <h1>Estaciones</h1>
    <p>Proximamente un mapa....</p>
    <p>Mientras una lista</p>
    <a href="{{route('Estaciones.alta')}}" class="btn btn-primary">Crear Nuevo</a>
    <a href="{{route('Estaciones.actualizar')}}" class="btn btn-primary">Actualizar Estatus</a>

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
            //  Relacionando datos de entidad, roveedor y estatus
            $entidad = isset(($estacion->entidades)->nombre) ? (($estacion->entidades)->nombre) : "Sin Entidad";
            $proveedor = isset(($estacion->proveedores)->nombre) ? (($estacion->proveedores)->nombre) : "Sin Proveedor";
            $estatus = isset(($estacion->estatus_tabla)->estatus) ? (($estacion->estatus_tabla)->estatus) : "Sin Estatus";
            // Buscando el contrato y el pago correpondiente
                $contrato = ($contratoss)->where('id_estacion', '==',$estacion->id)->first();
                $contrato = isset($contrato->id) ? ($contrato->id) : 'Sin Contrato' ;
            //Buscando el pago correspondiente
                $pago =($pagoss)->where('contrato','==',  ($contrato))->first();
                $pago_estatus = isset($pago->status) ?  ($pago->status) : 5;
                $pago = isset($pago->fecha_pago) ?  ($pago->fecha_pago) : "No hay pago registrado";
                    if ($pago_estatus == 1 ) { $color_tabla = "table-success"; }
                    else if ($pago_estatus == 2 ) { $color_tabla = "table-warning"; }
                    else if ($pago_estatus == 3 ) { $color_tabla = "table-danger"; }
                    else if ($pago_estatus == 4 ) { $color_tabla = "table-active"; }
                    else if ($pago_estatus == 5 ) { $color_tabla = "table-active"; }

                // $id_pagos = $pagos->find($id_proveedor)->monto;

          @endphp
          <tr class="{{$color_tabla}}">
            <td>{{ ($estacion->ciudades)->nombre }}</td>
            <td>{{  ($entidad) }}</td>
            <td>{{$estacion->grupo}}</td>
            <td>{{ ($proveedor) }} </td>
            <td>{{ ($estatus) }}</td>
            <td>{{$estacion->comentarios}}</td>
            <td>{{$pago}}</td>
            <td>
              <a href=" editar-estacion/{{ $estacion->id }}" class="btn btn-warning">Editar</a>
              <a href=" pagar-estacion/{{ $estacion->id }}" class="btn btn-primary">Pagar</a>
            </td>
          </tr>
  
          @endforeach

        </tbody>
      </table>



      
@stop
