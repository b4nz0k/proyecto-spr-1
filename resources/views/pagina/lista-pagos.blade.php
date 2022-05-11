
 @extends('adminlte::page')

 @section('title', 'Dashboard')
 
 @section('content_header')
 @stop
 
 @section('content')

    <h1>Lista de Pagos</h1>
    <a href="{{route('Pagos.alta')}}" class="btn btn-primary">Crear Nuevo</a>

    <table id="contratos" class="table table-striped mt-4 table-bordered shadow-lg" style="width:100%">
      <thead>
        <tr>
          <th scope="col">Fecha de solicitud</th>
          <th scope="col">Fecha de pago</th>
          <th scope="col">Numero de recibo de factura</th>
          <th scope="col">Contrato</th>
          <th scope="col">Periodo Pago</th>
          <th scope="col">Monto</th>
          <th scope="col">Accion</th>
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
          <td>
            <a href="/editar-pago/{{ $pago->id }}" class="btn btn-primary">Editar</a>
            <a href="/eliminar-pago/{{$pago->id }}"  class="btn btn-danger">Borrar</a>
          </td>
        </tr>

        @endforeach

      </tbody>
    </table>
@stop


