@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<form action="/editar-contrato/{{$contratos->id}}" method="POST">
    @csrf
      <h1>Editar Contrato</h1>
      <label for="">Estacion</label>

      <select class="form-select" aria-label="Default select example" name="id_estacion">
        @foreach ($estaciones as $estacion )
            @php
              $entidad = isset(($estacion->entidades)->nombre) ? (($estacion->entidades)->nombre) : "nulo";
              $activo = ($estacion->id == $contratos->id_estacion ) ? (' selected="selected" ') : ('');
            @endphp
        <option {{$activo}} value="{{$estacion->id}}">{{($estacion->ciudades)->nombre}} / {{ $entidad }}
        </option>
        @endforeach

  </select>

      {{-- <input class="form-control" type="number" value="{{$contratos->proveedor}}" name="proveedor"> --}}
      <label for="">Fecha de inicio</label>
      <input class="form-control" type="date" value="{{$contratos->fecha_inicio}}" name="fecha_inicio">
      <label for="">Contrato</label>
      <input class="form-control" type="text" value="{{$contratos->num_contrato}}" name="num_contrato">
      <label for="">Fecha de corte</label>
      <input class="form-control" type="number" value="{{$contratos->dia_corte_mensual}}" name="dia_corte_mensual">
      <label for="">Proveedor</label>

      <select class="form-select" aria-label="Default select example" name="proveedor">
            @foreach ($proveedores as $proveedor ) 
                @php
                  $activo = ($proveedor->id == $contratos->proveedor ) ? (' selected="selected" ') : ('');
                @endphp
              <option {{$activo}} value="{{$proveedor->id}}">
                      {{$proveedor->nombre}}  /  {{$proveedor->tipo}}
              </option>
            @endforeach

      </select>
      {{-- <input class="form-control" type="number" value="{{$contratos->id_estacion}}" name="id_estacion">  --}}
      <label for="">Importe Mensual</label>
      <input class="form-control" type="number" value="{{$contratos->importe_mensual}}" name="importe_mensual">
      <button type="submit" class="btn btn-primary mb-2">Actualizar</button>
    </form>

@stop

