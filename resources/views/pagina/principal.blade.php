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
          
          @foreach ($estaciones as $estacion )
          
          <tr>
            
            <td>{{($estacion->ciudades)->nombre}}</td>
            <td>{{($estacion->entidades)->nombre}}</td>
            <td>{{$estacion->grupo}}</td>
            <td>{{$estacion->proveedor}}</td>
            <td>{{$estacion->estatus}}</td>
            <td>{{$estacion->comentarios}}</td>
            <td>ultimo pago</td>
            <td>
              <a href="/ver/000" class="btn btn-success">Mas detalles</a>
            </td>
          </tr>
  
          @endforeach
  
        </tbody>
      </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

@stop