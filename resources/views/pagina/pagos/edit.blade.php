@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop
    @if (session()->has('msj'))
    <div class="alert alert-success" role="alert"> {{session('msj')}}</div>
    @endif
@section('content')

{{-- <form action="{{route('Pagos.update')}}/{{$pagos->id}}" method="POST">
 --}}
 <form action="/editar-pago/{{$pagos->id}}" method="POST" class="row g-3">
     @csrf
    <h1>Actualizar Pago</h1>
    <div class="mb-3 col-md-4 col-auto">
        <label for="">Fecha de solicitud</label>
        <input class="form-control" type="date" value="{{$pagos->fecha_solicitud}}" name="fecha_solicitud" min="2018-01-01" max="2024-06-1">
    </div>
    <div class="mb-3 col-md-4 col-auto">
        <label for="">Fecha de pago</label>
        <input class="form-control" type="date" value="{{$pagos->fecha_pago}}" name="fecha_pago" min="2018-01-01" max="2024-06-1">
    </div>
    <div class="mb-3 col-md-4 col-auto">
        <label for="">Numero de recibo defactura</label>
        <input class="form-control" type="text" value="{{$pagos->num_recibo_factura}}" name="num_recibo_factura"> 
    </div>
    <div class="mb-3 col-md-4 col-auto">
        <label for="">Contrato</label>
        <input class="form-control" type="text" value="{{$pagos->contrato}}" name="contrato">
    </div>
    <div class="mb-3 col-md-4 col-auto">
        <label for="">Periodo</label>
        <input class="form-control" type="number" value="{{$pagos->periodo_pago}}" name="periodo_pago">
    </div>
    <div class="mb-3 col-md-4 col-auto">
        <label for="">Monto</label>
        <input class="form-control" type="text" value="{{$pagos->monto}}" name="monto">
    </div>
    <div class="col-4">
        <a href="{{route('Pagos.lista')}}" class="btn btn-primary col-9"><--Atras</a>
    </div>
    <div class="col-4">
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
