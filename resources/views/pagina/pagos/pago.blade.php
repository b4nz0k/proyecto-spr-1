@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop
    @if (session()->has('msj'))
    <div class="alert alert-success" role="alert"> {{session('msj')}}</div>
    @endif
@section('content')
<div class="container-md bg-white col-10 p-5 shadow">

    <form action="{{route('Pagos.store')}}" method="POST" class="row g-3">
        
        @csrf
        <h1>Registrar Pago</h1>
        <div class="mb-3 col-md-4 col-auto">
            <label for="">Fecha de solicitud</label>
            <input class="form-control" type="date" name="fecha_solicitud" min="2018-01-01" max="2024-06-1">
        </div>
        <div class="mb-3 col-md-4 col-auto">
            <label for="">Fecha de pago</label>
            <input class="form-control" type="date" placeholder="Fecha de Pago" name="fecha_pago" min="2018-01-01" max="2024-06-1">
        </div>
        <div class="mb-3 col-md-4 col-auto">
            <label for="">Numero de recibo defactura</label>
            <input class="form-control" type="text" placeholder="Numero de recibo defactura" name="num_recibo_factura"> 
        </div>
        <div class="mb-3 col-md-4 col-auto">
            <label for="">Periodo de Pago</label>
            <select class="form-select" aria-label="Default select example" name="periodo_pago">
                <option selected>Selecciona el periodo</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>
        </div>
        {{-- <input class="form-control" type="text" placeholder="Periodo de pago" name="periodo_pago">      --}}
        <div class="mb-3 col-md-4 col-auto">
            <label for="">Contrato</label>
            <select class="form-select" aria-label="Default select example" name="contrato">
                <option selected>Selecciona un Contrato</option>
        
                @foreach ($contratos as $contrato )
                @php
                $activo = ($contrato->id == $pago) ? (' selected="selected" ') : ('');

                @endphp
                <option {{$activo}} value="{{($contrato->id) }}">{{($contrato->num_contrato)}} </option>
                @endforeach
            </select>
            {{-- <input class="form-control" type="text" placeholder="Contrato" name="contrato"> --}}
        </div>
        <div class="mb-3 col-md-4 col-auto">
            <label for="">Monto</label>
            <input class="form-control" type="text" placeholder="$" name="monto">
        </div><hr>
        {{-- Empiza el boton modal --}}
        <div class="col-4">
            <a href="{{route('Estaciones.index')}}" class="btn btn-primary col-9"><- Atras</a>
        </div>
        <div class="col-4">
            <button type="button" class="btn btn-primary col-9" data-toggle="modal" data-target="#exampleModalCenter">
                Guardar
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
