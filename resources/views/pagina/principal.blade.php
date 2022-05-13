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
          <tr>
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
            //  $entidad =($entidades->find($estacion->id));
            $entidad = isset(($estacion->entidades)->nombre) ? (($estacion->entidades)->nombre) : "Sin Entidad";
            $proveedor = isset(($estacion->proveedores)->nombre) ? (($estacion->proveedores)->nombre) : "Sin Proveedor";
            $estatus = isset(($estacion->estatus_tabla)->estatus) ? (($estacion->estatus_tabla)->estatus) : "Sin Estatus";
            $id_contrato = (($contratoss)->estaciones_tabla)->id;
            // $cpagos = (($pagoss)->find($id_contrato));
            return var_dump($id_contrato);
            // $id_pagos = $pagos->find($id_proveedor)->monto;
          @endphp
          <tr>
            
            <td>{{ ($estacion->ciudades)->nombre }}</td>
            <td>{{  ($entidad) }}</td>
            <td>{{$estacion->grupo}}</td>
            <td>{{ ($proveedor) }} | </td>
            <td>{{ ($estatus) }}</td>
            <td>{{$estacion->comentarios}}</td>
            <td>{{$id_pagos}}</td>
            <td>
              <a href="/ver/000" class="btn btn-success">Mas detalles</a>
            </td>
          </tr>
  
          @endforeach
  
        </tbody>
      </table>



      
@stop
