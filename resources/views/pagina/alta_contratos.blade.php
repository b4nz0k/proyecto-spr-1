@extends('layouts.vistapadre')

@section('contenidoPrincipal')

<form action="" method="post">

  <h1>Registrar Contrato</h1>
  <label for="">Proveedor</label>
  <input class="form-control" type="text" placeholder="Proveedor" name="no_proveedor">
  <label for="">Fecha de inicio</label>
  <input class="form-control" type="text" placeholder="Fecha de inicio" name="fecha_inicio">
  <label for="">Contrato</label>
  <input class="form-control" type="text" placeholder="Contrato" name="no_contrato">
  <label for="">Fecha de corte</label>
  <input class="form-control" type="text" placeholder="Fecha de corte" name="fecha_corte">

  <label for="">Numero de contrato</label>
  <input class="form-control" type="text" placeholder="Numero de recibo defactura"> 
  <label for="">Importe Mensual</label>
  <input class="form-control" type="text" placeholder="$" name="importe">
  <button type="submit" class="btn btn-primary mb-2">Registrar</button>
</form>
@endsection()