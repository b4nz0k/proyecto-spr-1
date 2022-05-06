
 @extends('adminlte::page')

 @section('title', 'Dashboard')
 
 @section('content_header')
     <h1>Panel</h1>
 @stop
 
 @section('content')
    <h1>Lista de Pagos</h1>

    <ul class="list-group list-group-horizontal list-group-item-action row-cols-6 list-group-item-action">

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

 @stop
 
 @section('css')
     <link rel="stylesheet" href="/css/admin_custom.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 
 @stop
 
 @section('js')
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 
 @stop