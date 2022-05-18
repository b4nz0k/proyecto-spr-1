@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop
    @if (session()->has('msj'))
    <div class="alert alert-success" role="alert"> {{session('msj')}}</div>
    @else
    <div class="alert alert-damage" role="alert"> </div>
    @endif
@section('content')
    <form action="{{route('Pagos.store')}}" method="POST">
        
        @csrf
        <h1>Registrar Pago</h1>
        <label for="">Fecha de solicitud</label>
        <input class="form-control" type="date" name="fecha_solicitud" min="2018-01-01" max="2024-06-1">
        <label for="">Fecha de pago</label>
        <input class="form-control" type="date" placeholder="Fecha de Pago" name="fecha_pago" min="2018-01-01" max="2024-06-1">
        <label for="">Numero de recibo defactura</label>
        <input class="form-control" type="text" placeholder="Numero de recibo defactura" name="num_recibo_factura"> 
        <label for="">Periodo de Pago</label>
        <select class="form-select" aria-label="Default select example" name="periodo_pago">
            <option selected>Selecciona el periodo</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>

        {{-- <input class="form-control" type="text" placeholder="Periodo de pago" name="periodo_pago">      --}}
        <label for="">Contrato</label>
        <select class="form-select" aria-label="Default select example" name="contrato">
            <option selected>Selecciona un Contrato</option>
    
            @foreach ($contratos as $contratos )
            @php
            $ciudad = isset(($contratos->ciudades)->nombre) ? (($contratos->ciudades)->nombre) : "nulo";
            @endphp
            <option value="{{($contratos->id) }}">{{($contratos->num_contrato)}} | {{($ciudad)}}</option>
            @endforeach
        </select>
        {{-- <input class="form-control" type="text" placeholder="Contrato" name="contrato"> --}}
        <label for="">Monto</label>
        <input class="form-control" type="text" placeholder="$" name="monto">
        {{-- Empiza el boton modal --}}

        <a href="{{route('Pagos.lista')}}" class="btn btn-primary">Atras</a>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            Guardar
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
