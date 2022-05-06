@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Panel</h1>
@stop

@section('content')

<form action="{{route('registro-pagos.store')}}" method="POST">

    <h1>Registrar Pago</h1>
    <label for="">Fecha de solicitud</label>
    <input class="form-control" type="text" value="Fecha_de_solicitud" aria-label="Campo desactivado" disabled readonly name="fecha_solicitud">
    <label for="">Fecha de pago</label>
    <input class="form-control" type="text" placeholder="Fecha de Pago" name="fecha_pago">
    <label for="">Numero de recibo defactura</label>
    <input class="form-control" type="text" placeholder="Numero de recibo defactura"> 
    <label for="">Contrato</label>
    <input class="form-control" type="text" placeholder="Contrato" name="no_contrato">

    <label for="">Monto</label>
    <input class="form-control" type="text" placeholder="$" name="monto">
    <button type="submit" class="btn btn-primary mb-2">Registrar</button>
</form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

@stop
