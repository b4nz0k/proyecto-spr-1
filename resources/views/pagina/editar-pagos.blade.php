@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')

<form action="{{route('Pagos.edit')}}" method="POST">
    @csrf
    @method('PUT')
    <h1>Registrar Pago</h1>
    <label for="">Fecha de solicitud</label>a
    <input class="form-control" type="text" value="{{$pagos=id}}"  name="fecha_solicitud">
    <label for="">Fecha de pago</label>
    <input class="form-control" type="text" value="" name="fecha_pago">
    <label for="">Numero de recibo defactura</label>
    <input class="form-control" type="text" value=""> 
    <label for="">Contrato</label>
    <input class="form-control" type="text" value="" name="no_contrato">

    <label for="">Monto</label>
    <input class="form-control" type="text" value="" name="monto">
    <button type="submit" class="btn btn-primary mb-2">Registrar</button>
</form>

@stop
