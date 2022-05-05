@extends('layouts.vistapadre')

@section('contenidoPrincipal')
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

@endsection()