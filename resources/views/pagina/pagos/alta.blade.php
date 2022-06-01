@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop
    @if (session()->has('msj'))
    <div class="alert alert-success" role="alert"> {{session('msj')}}</div>
    @endif
@section('content')
<div class="container-md bg-white col-10 p-5 shadow">
{{--   @if($errors->has())
  <div class="alert alert-warning" role="alert">
     @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
    @endforeach
    @endif 
  </br>    --}}
    <form action="{{route('Pagos.store')}}" method="POST" class="row g-3" enctype="multipart/form-data">
        
        @csrf
        <h1>Registrar Pago</h1>
        <div class="mb-3 col-md-4 col-auto">
            <label for="">Fecha de solicitud</label>
            <input class="form-control @error('fecha_solicitud') border-2 border-danger @enderror" value="{{ old('fecha_solicitud') }}"
             type="date" name="fecha_solicitud" min="2018-01-01" max="2024-06-1">
                  @error('fecha_solicitud')
                  <p class="bg-red text-white text-sm p-2 text-center rounded-lg">{{$message}}</p>
                  @enderror
        </div>
        <div class="mb-3 col-md-4 col-auto">
            <label for="">Fecha de pago</label>
            <input class="form-control @error('fecha_pago') border-2 border-danger @enderror" value="{{ old('fecha_pago') }}"
             type="date" placeholder="Fecha de Pago" name="fecha_pago" min="2018-01-01" max="2024-06-1">
                  @error('fecha_pago')
                  <p class="bg-red text-white text-sm p-2 text-center rounded-lg">{{$message}}</p>
                  @enderror
        </div>
        <div class="mb-3 col-md-4 col-auto">
            <label for="">Numero de recibo defactura</label>
            <input class="form-control @error('num_recibo_factura') border-2 border-danger @enderror" value="{{ old('num_recibo_factura') }}"
             type="text" placeholder="Numero de recibo defactura" name="num_recibo_factura"> 
                  @error('num_recibo_factura')
                  <p class="bg-red text-white text-sm p-2 text-center rounded-lg">{{$message}}</p>
                  @enderror
        </div>
        <div class="mb-3 col-md-4 col-auto">
            <label for="">Periodo de Pago</label>
            <select class="form-select @error('periodo_pago') border-2 border-danger @enderror"
             aria-label="Default select example" name="periodo_pago">
                <option value="" selected>Selecciona el periodo</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>
                      @error('periodo_pago')
                      <p class="bg-red text-white text-sm p-2 text-center rounded-lg">{{$message}}</p>
                      @enderror
        </div>
        {{-- <input class="form-control" type="text" placeholder="Periodo de pago" name="periodo_pago">      --}}
        <div class="mb-3 col-md-4 col-auto">
            <label for="">Contrato</label>
            <select class="form-select @error('contrato') border-2 border-danger @enderror"
             aria-label="Default select example" name="contrato">
                <option value="" selected>Selecciona un Contrato</option>
        
                @foreach ($contratos as $contratos )
                @php
                $ciudad = isset(($contratos->ciudades)->nombre) ? (($contratos->ciudades)->nombre) : "nulo";
                @endphp
                <option value="{{($contratos->id) }}">{{($contratos->num_contrato)}} | {{($ciudad)}}</option>
                @endforeach
            </select>
                      @error('contrato')
                      <p class="bg-red text-white text-sm p-2 text-center rounded-lg">{{$message}}</p>
                      @enderror
            {{-- <input class="form-control" type="text" placeholder="Contrato" name="contrato"> --}}
        </div>
        <div class="mb-3 col-md-4 col-auto">
            <label for="">Monto</label>
            <input class="form-control @error('monto') border-2 border-danger @enderror" value="{{ old('monto') }}"
             type="text" placeholder="$" name="monto">
                      @error('monto')
                      <p class="bg-red text-white text-sm p-2 text-center rounded-lg">{{$message}}</p>
                      @enderror
        </div>
            {{ csrf_field() }}
            <div class="mb-3 col-md-4 col-auto">
              <label class="form-label @error('archivo') border-2 border-danger @enderror"
               for="customFile">Archivo de pago</label>
              <input type="file" class="form-control" id="customFile" name="archivo" />
                      @error('archivo')
                      <p class="bg-red text-white text-sm p-2 text-center rounded-lg">{{$message}}</p>
                      @enderror
            </div>
          <hr>
        {{-- Empiza el boton modal --}}
        <div class="col-4">
            <a href="{{route('Pagos.lista')}}" class="btn btn-primary col-9"><- Atras</a>
        </div>
        <div class="col-4">
            <button type="button" class="btn btn-primary col-9" data-toggle="modal" data-target="#exampleModalCenter">
                Guardar
            </button>
        </div>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Advertencia</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         Estas seguro que todos los campos sean correctos?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Confirmar</button>
        </div>
      </div>
    </div>
  </div>
        
    </form>
</div>
@stop
