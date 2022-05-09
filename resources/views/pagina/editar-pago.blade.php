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

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

@stop
