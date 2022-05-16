@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')

    <h1>Estaciones</h1>
    <p>Proximamente un mapa....</p>
    <p>Mientras una lista</p>
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
          
          @foreach ($estaciones as $estacion  )
          @php
/*           $color_tabla = "table-success";
          $color_tabla = "table-warning";
          $color_tabla = "table-danger"; */
            //  Relacionando datos de entidad, roveedor y estatus
            $entidad = isset(($estacion->entidades)->nombre) ? (($estacion->entidades)->nombre) : "Sin Entidad";
            $proveedor = isset(($estacion->proveedores)->nombre) ? (($estacion->proveedores)->nombre) : "Sin Proveedor";
            $estatus = isset(($estacion->estatus_tabla)->estatus) ? (($estacion->estatus_tabla)->estatus) : "Sin Estatus";
            // Buscando el contrato y el pago correpondiente
                $contrato = ($contratoss)->where('id_estacion', '==',$estacion->id)->first();
                $contrato = isset($contrato->id) ? ($contrato->id) : 'Sin Contrato' ;
                $pago =($pagoss)->where('contrato','==',  ($contrato))->first();
                $pago = isset($pago->fecha_pago) ?  ($pago->fecha_pago) : "No hay pago registrado";
                // $id_pagos = $pagos->find($id_proveedor)->monto;

          @endphp
          <tr>
            <td>{{ ($estacion->ciudades)->nombre }}</td>
            <td>{{  ($entidad) }}</td>
            <td>{{$estacion->grupo}}</td>
            <td>{{ ($proveedor) }} </td>
            <td>{{ ($estatus) }}</td>
            <td>{{$estacion->comentarios}}</td>
            <td>{{$pago}}</td>
            <td>
              <a href="#" class="btn btn-success">Mas detalles</a>
            </td>
          </tr>
  
          @endforeach

        </tbody>
      </table>



      
@stop
