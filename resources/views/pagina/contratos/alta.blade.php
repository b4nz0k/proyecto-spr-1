@extends('adminlte::page')

@section('title', 'Alta Contratos')

@section('content_header')
@stop
  @if (session()->has('msj'))
    <div class="alert alert-success" role="alert"> {{session('msj')}}</div>
  @endif
@section('content')
<div class="container-md bg-white col-10 p-5 shadow">
    <form action="{{route('Contratos.store')}}" method="post" class="row gap-3">
      @csrf
      <h1>Registrar Contrato</h1>
          <div class="mb-3 col-md-6 col-auto">
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
        </div>

      <div class="mb-3 col-md-4 col-auto">
          <label for="">Fecha de inicio</label>
          <input class="form-control" type="date" placeholder="Fecha de inicio" name="fecha_inicio" min="2018-01-01" max="2024-06-1">
      </div>
      <div class="mb-3 col-md-6 col-auto">
          <label for="">Contrato</label>
          <input class="form-control" type="text" placeholder="Nombre del Contrato" name="num_contrato">
      </div>
      <div class="mb-3 col-md-4 col-auto">
          <label for="">Dia de corte</label>
          <input class="form-control" type="number" placeholder="Fecha de corte" name="dia_corte_mensual">
      </div>
      <div class="mb-3 col-md-6 col-auto">
          <label for="">Proveedor</label>
          <select class="form-select" aria-label="Default select example" name="proveedor">
            <option selected>Proveedor</option>

                @foreach ($proveedores as $proveedor )

                <option value="{{$proveedor->id}}">
                  {{$proveedor->nombre}}  /  {{$proveedor->tipo}}
                  </option>
                @endforeach

          </select>
      </div>
      <div class="mb-3 col-md-4 col-auto">
          <label for="">Importe Mensual</label>
          <input class="form-control" type="number" placeholder="$" name="importe_mensual">
      </div>
      <div class="col-6">
      <a href="{{route('Contratos.lista')}}" class="btn btn-primary col-6">Atras</a>
    </div>
    <div class="col-4">
              {{-- Empiza el boton modal --}}
              <button type="button" class="btn btn-primary col-9" data-toggle="modal" data-target="#exampleModalCenter">
                Registrar
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
              <button type="submit" class="btn btn-primary">Confirmar</button>
            </div>
          </div>
        </div>
      </div>
            
        </form>
      </div>
@stop
