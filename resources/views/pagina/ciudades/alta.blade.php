@extends('adminlte::page')

@section('title', 'Alta Ciudad')

@section('content_header')
@stop
    @if (session()->has('msj'))
    <div class="alert alert-success" role="alert"> {{session('msj')}}</div>
    @endif
@section('content')
<div class="container-md bg-white col-10 p-5 shadow">
    <form action="{{route('Ciudad.store')}}" method="post" class="row gap-3">
      @csrf
      <h1>Registrar Ciudad</h1>
      <div class="mb-3 col-md-4 col-auto">
        <label for="">Ciudad</label>
        <input class="form-control mb-3 @error('nombre') border-2 border-danger @enderror" value="{{ old('nombre') }}"
        type="text" placeholder="Nombre de Ciudad" name="nombre">
                {{-- Si es que hay un error, retorna un mensaje --}}
        @error('nombre')
          <p class="bg-red text-white text-sm p-2 text-center rounded-lg">{{$message}}</p>
        @enderror
      </div>

      <hr>
      <div class="col-3">
        <a href="{{route('Ciudad.lista')}}" class="btn btn-primary mb-2 col-9"><-- Atras</a>
      </div>
      <div class="col-3">
              {{-- Empiza el boton modal --}}
              <button type="button" class="btn btn-primary col-9" data-toggle="modal" data-target="#exampleModalCenter">
                Registrar
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
