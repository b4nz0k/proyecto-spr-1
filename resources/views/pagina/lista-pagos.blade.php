
 @extends('adminlte::page')

 @section('title', 'Dashboard')
 
 @section('content_header')
 @stop
 
 @section('content')

    <h1>Lista de Pagos</h1>

    <table id="contratos" class="table table-striped mt-4 table-bordered shadow-lg" style="width:100%">
      <thead>
        <tr>
          <th scope="col">Fecha de solicitud</th>
          <th scope="col">Fecha de pago</th>
          <th scope="col">Numero de recibo de factura</th>
          <th scope="col">Contrato</th>
          <th scope="col">Periodo Pago</th>
          <th scope="col">Monto</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($pagos as $pago )

        <tr>
          <td>{{$pago->fecha_solicitud}}</td>
          <td>{{$pago->fecha_pago}}</td>
          <td>{{$pago->num_recibo_factura}}</td>
          <td>{{$pago->contrato}}</td>
          <td>{{$pago->periodo_pago}}</td>
          <td>{{$pago->monto}}</td>

        </tr>

        @endforeach

      </tbody>
    </table>
{{--     <ul class="list-group list-group-horizontal list-group-item-action row-cols-6 list-group-item-action">

      <li class="list-group-item bg-primary text-white">Fecha de solicitud</li>
      <li class="list-group-item bg-primary text-white">Fecha de pago</li>
      <li class="list-group-item bg-primary text-white">Numero de recibo de factura</li>
      <li class="list-group-item bg-primary text-white">Contrato</li>
      <li class="list-group-item bg-primary text-white">Periodo Pago</li>
      <li class="list-group-item bg-primary text-white">Monto</li>
    </ul>
      
    @foreach ($pagos as $pago )
      
    <ul class="list-group list-group-horizontal-sm row-cols-6">
      <li class="list-group-item">{{$pago->fecha_solicitud}}</li>
      <li class="list-group-item">{{$pago->fecha_pago}}</li>
      <li class="list-group-item">{{$pago->num_recibo_factura}}</li>
      <li class="list-group-item">{{$pago->periodo_pago}}</li>
      <li class="list-group-item">{{$pago->monto}}</li>
      <li class="list-group-item">{{$pago->monto}}</li>
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