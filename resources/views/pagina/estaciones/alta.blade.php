@extends('adminlte::page')

@section('title', 'Alta Contratos')

@section('content_header')
@stop
  @if (session()->has('msj'))
    <div class="alert alert-success" role="alert"> {{session('msj')}}</div>
    @else
    <div class="alert alert-damage" role="alert"> </div>
  @endif
@section('content')
    <form action="{{route('Contratos.store')}}" method="post">
      @csrf
      <h1>Registrar Estacion</h1>

      <label for="">Estacion</label>
      <select class="form-select" aria-label="Default select example" name="id_estacion">
        <option selected>Selecciona una Estacion</option>

        @foreach ($estaciones as $estacion )
        @php
           $entidad = isset(($estacion->entidades)->nombre) ? (($estacion->entidades)->nombre) : "nulo";
        @endphp

        <option value="{{$estacion->id}}">{{($estacion->ciudades)->nombre}} / {{ $entidad }}</option>
        @endforeach
      </select>

      <label for="">Fecha de inicio</label>
      <input class="form-control" type="date" placeholder="Fecha de inicio" name="fecha_inicio">
      <label for="">Contrato</label>
      <input class="form-control" type="text" placeholder="Nombre del Contrato" name="num_contrato">
      <label for="">Dia de corte</label>
      <input class="form-control" type="number" placeholder="Fecha de corte" name="dia_corte_mensual">

      <label for="">Proveedor</label>
      <select class="form-select" aria-label="Default select example" name="proveedor">
        <option selected>Proveedor</option>

            @foreach ($proveedores as $proveedor )

            <option value="{{$proveedor->id}}">
              {{$proveedor->nombre}}  /  {{$proveedor->tipo}}
              </option>
            @endforeach

      </select>
      <label for="">Importe Mensual</label>
      <input class="form-control" type="number" placeholder="$" name="importe_mensual">
      <a href="{{route('Contratos.lista')}}" class="btn btn-primary">Atras</a>

      
              {{-- Empiza el boton modal --}}
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Registrar
            </button>
      
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
              <button type="submit" class="btn btn-primary">Confirmar</button>
            </div>
          </div>
        </div>
      </div>
            
        </form>

@stop
