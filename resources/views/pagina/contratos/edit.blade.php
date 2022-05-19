@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop
    @if (session()->has('msj'))
    <div class="alert alert-success" role="alert"> {{session('msj')}}</div>
    @endif
@section('content')
<form action="/editar-contrato/{{$contratos->id}}" method="POST" class="row g-3">
    @csrf
      <h1>Editar Contrato</h1>
      <div class="mb-3 col-md-4 col-auto">
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
      </div>
      {{-- <input class="form-control" type="number" value="{{$contratos->proveedor}}" name="proveedor"> --}}
      <div class="mb-3 col-md-4 col-auto">
          <label for="">Fecha de inicio</label>
          <input class="form-control" type="date" value="{{$contratos->fecha_inicio}}" name="fecha_inicio" min="2018-01-01" max="2024-06-1">
      </div>
      <div class="mb-3 col-md-4 col-auto">
          <label for="">Contrato</label>
          <input class="form-control" type="text" value="{{$contratos->num_contrato}}" name="num_contrato">
      </div>
      <div class="mb-3 col-md-4 col-auto">
          <label for="">Fecha de corte</label>
          <input class="form-control" type="number" value="{{$contratos->dia_corte_mensual}}" name="dia_corte_mensual">
      </div>
      <div class="mb-3 col-md-4 col-auto">
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
      </div>
      {{-- <input class="form-control" type="number" value="{{$contratos->id_estacion}}" name="id_estacion">  --}}
      <div class="mb-3 col-md-4 col-auto">
          <label for="">Importe Mensual</label>
          <input class="form-control" type="number" value="{{$contratos->importe_mensual}}" name="importe_mensual">
      </div><hr>
      <div class="col-6">

          <a href="{{route('Contratos.lista')}}" class="btn btn-primary col-9"><--Atras</a>
      </div>
      <div class="col-6">      
          <button type="button" class="btn btn-primary col-9" data-toggle="modal" data-target="#exampleModalCenter">
            Actualizar
        </button>
      </div>
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
   Estas seguro que todos los campos sean correctos?
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
  <button type="submit" class="btn btn-primary mb-2">Actualizar</button>
  </div>
</div>
</div>
</div>
</form>

@stop

