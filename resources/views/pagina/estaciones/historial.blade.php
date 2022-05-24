@extends('adminlte::page')

@section('title', 'Dashboard')
    @if (session()->has('msj'))
    <div class="alert alert-success" role="alert"> {{session('msj')}}</div>
    @endif
@section('content_header')
@stop

@section('content')
<div class="container-md bg-white col-10 p-5 shadow">

    <h1>Historial de la estacion</h1><hr>

          <h3 class="">ID: {{$estacionid}}</h3>


        
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Fecha-mod</th>
                <th scope="col">Proveedor</th>
                <th scope="col">Estatus</th>
                <th scope="col">Comentario</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($historial as $historia)
                <tr>
                    <th scope="row"> {{$historia->updated_at}}</th>
                    <td scope="row"> {{$historia->proveedor}} </td>
                    <td scope="row"> {{$historia->estatus}} </td>
                    <td scope="row"> {{$historia->comentario}}</td>
                  </tr>
                @endforeach
            </tbody>
          </table>
          <div class="col-4">
            <a href="{{route('Estaciones.index')}}" class="btn btn-primary col-9"><- Atras</a>
        </div>
        </div>
</div>
@stop
