@extends('adminlte::page')

@section('title', 'Dashboard')
    @if (session()->has('msj'))
    <div class="alert alert-success" role="alert"> {{session('msj')}}</div>
    @endif
@section('content_header')
@stop

@section('content')

    <h1>Historial de la estacion</h1><hr>

          <h3 class="">ID: {{$estacionid}}</h3>

          @foreach ($historial as $historia)
          <div class="container-md text-justify bg-green-100 color">
              <label for="">{{$historia->updated_at}}</label><br>
                            {{$historia->comentario}}
          </div><hr>

          @endforeach

@stop
