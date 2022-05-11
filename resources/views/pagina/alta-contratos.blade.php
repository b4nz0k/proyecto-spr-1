@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
    <form action="{{route('Contratos.store')}}" method="post">
      @csrf
      <h1>Registrar Contrato</h1>

      <label for="">Proovedor</label>
      <select class="form-select" aria-label="Default select example" name="proveedor">
        <option selected>Proveedor</option>

            @foreach ($proveedores as $proveedor )
              <option value="
                {{$proveedor->nombre}}">{{$proveedor->nombre}}  |  {{$proveedor->tipo}}
              </option>
            @endforeach

      </select>
      <label for="">Fecha de inicio</label>
      <input class="form-control" type="date" placeholder="Fecha de inicio" name="fecha_inicio">
      <label for="">Contrato</label>
      <input class="form-control" type="text" placeholder="Nombre del Contrato" name="num_contrato">
      <label for="">Dia de corte</label>
      <input class="form-control" type="number" placeholder="Fecha de corte" name="dia_corte_mensual">
      <label for="">Estacion</label>

      <select class="form-select" aria-label="Default select example" name="id_estacion">
        <option selected>Selecciona una Estacion</option>

        @foreach ($estaciones as $estacion )
        <option value="{{$estacion->id}}">{{($estacion->ciudades)->nombre}}</option>
        @endforeach

      </select>
      <label for="">Importe Mensual</label>
      <input class="form-control" type="number" placeholder="$" name="importe_mensual">
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
