@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<h1>Lista de Contratos</h1>

    <table id="contratos" class="table table-striped mt-4 table-bordered shadow-lg" style="width:100%">
      <thead>
        <tr>
          <th scope="col">Proveedor</th>
          <th scope="col">Fecha de inicio</th>
          <th scope="col">Proveedor</th>
          <th scope="col">Fecha de corte</th>
          <th scope="col">Numero de contrato</th>
          <th scope="col">Importe Mensual</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($contratos as $contrato )

        <tr>
          <td>{{$contrato->id}}</td>
          <td>{{$contrato->fecha_inicio}}</td>
          <td>{{$contrato->proveedor}}</td>
          <td>{{$contrato->dia_corte_mensual}}</td>
          <td>{{$contrato->num_contrato}}</td>
          <td>{{$contrato->importe_mensual}}</td>
        </tr>

        @endforeach

      </tbody>
    </table>

{{--     <ul class="list-group list-group-horizontal list-group-item-action row-cols-6 list-group-item-action">

        <li class="list-group-item bg-primary text-white">Proveedor</li>
        <li class="list-group-item bg-primary text-white">Fecha de inicio</li>
        <li class="list-group-item bg-primary text-white">Proveedor</li>
        <li class="list-group-item bg-primary text-white">Fecha de corte</li>
        <li class="list-group-item bg-primary text-white">Numero de contrato</li>
        <li class="list-group-item bg-primary text-white">Importe Mensual</li>
      </ul>
    @foreach ($contratos as $contrato )
        
      <ul class="list-group list-group-horizontal-sm row-cols-6">
        <li class="list-group-item">{{$contrato->id}}</li>
        <li class="list-group-item">{{$contrato->fecha_inicio}}</li>
        <li class="list-group-item">{{$contrato->proveedor}}</li>
        <li class="list-group-item">{{$contrato->dia_corte_mensual}}</li>
        <li class="list-group-item">{{$contrato->num_contrato}}</li>
        <li class="list-group-item">{{$contrato->importe_mensual}}</li>
      </ul>
    @endforeach
 --}}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" crossorigin="anonymous">
@stop

@section('js')
<script>
$(document).ready(function() {
  $('#contratos').DataTable();
} );
</script>

<script src="https://code.jquery.com/jquery-3.5.1.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

@stop

