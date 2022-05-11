@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
    <form action="{{route('Pagos.store')}}" method="POST">
        
        @csrf
        <h1>Registrar Pago</h1>
        <label for="">Fecha de solicitud</label>
        <input class="form-control" type="date" name="fecha_solicitud">
        <label for="">Fecha de pago</label>
        <input class="form-control" type="date" placeholder="Fecha de Pago" name="fecha_pago">
        <label for="">Numero de recibo defactura</label>
        <input class="form-control" type="text" placeholder="Numero de recibo defactura" name="num_recibo_factura"> 
        <label for="">Periodo de Pago</label>
        <select class="form-select" aria-label="Default select example" name="periodo_pago">
            <option selected>Selecciona el periodo</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>

        {{-- <input class="form-control" type="text" placeholder="Periodo de pago" name="periodo_pago">      --}}
        <label for="">Contrato</label>
        <select class="form-select" aria-label="Default select example" name="contrato">
            <option selected>Selecciona un Contrato</option>
    
            @foreach ($contratos as $contratos )
            <option value="{{($contratos->id) }}">{{($contratos->num_contrato)}} | {{($contratos->ciudades)->nombre}}</option>
            @endforeach
        </select>
        {{-- <input class="form-control" type="text" placeholder="Contrato" name="contrato"> --}}
        <label for="">Monto</label>
        <input class="form-control" type="text" placeholder="$" name="monto">
        <button type="submit" class="btn btn-primary mb-2">Registrar</button>
    </form>

@stop
