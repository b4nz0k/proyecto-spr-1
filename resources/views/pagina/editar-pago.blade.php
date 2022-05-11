@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')

{{-- <form action="{{route('Pagos.update')}}/{{$pagos->id}}" method="POST">
 --}}
 <form action="/editar-pago/{{$pagos->id}}" method="POST">
     @csrf
    <h1>Actualizar Pago</h1>
    <label for="">Fecha de solicitud</label>
    <input class="form-control" type="date" value="{{$pagos->fecha_solicitud}}" name="fecha_solicitud">
    <label for="">Fecha de pago</label>
    <input class="form-control" type="date" value="{{$pagos->fecha_pago}}" name="fecha_pago">
    <label for="">Numero de recibo defactura</label>
    <input class="form-control" type="text" value="{{$pagos->num_recibo_factura}}" name="num_recibo_factura"> 
    <label for="">Contrato</label>
    <input class="form-control" type="text" value="{{$pagos->contrato}}" name="contrato">
    <label for="">Periodo</label>
    <input class="form-control" type="number" value="{{$pagos->periodo_pago}}" name="periodo_pago">
    <label for="">Monto</label>
    <input class="form-control" type="text" value="{{$pagos->monto}}" name="monto">
    <button type="submit" class="btn btn-primary mb-2">Actualizar</button>
</form>

@stop
