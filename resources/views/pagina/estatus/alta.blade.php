@extends('adminlte::page')

@section('title', 'Alta Estatus')

@section('content_header')
@stop
    @if (session()->has('msj'))
    <div class="alert alert-success" role="alert"> {{session('msj')}}</div>
    @else
    <div class="alert alert-damage" role="alert"> Error al guardar los datos</div>
    @endif
@section('content')
    <form action="{{route('Estatus.store')}}" method="post" class="col-5">
      @csrf
      <h1>Registrar Estatus</h1>

      <label for="">Estatus</label>
      <input class="form-control" type="text" placeholder="Nombre del Estatus" name="estatus">

      <a href="{{route('Estatus.lista')}}" class="btn btn-primary mb-2">Atras</a>


      
                    {{-- Empiza el boton modal --}}
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                      Registrar
                  </button>
            
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

@stop
