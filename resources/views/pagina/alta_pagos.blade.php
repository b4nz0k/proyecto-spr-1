@extends('layouts.vistapadre')

@section('contenidoPrincipal')
    <form action="{{route('registro_pagos.store')}}" method="POST">

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
@endsection()