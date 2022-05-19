@extends('adminlte::page')

@section('title', 'Alta Entidades')

@section('content_header')
@stop
    @if (session()->has('msj'))
    <div class="alert alert-success" role="alert"> {{session('msj')}}</div>
    @endif
@section('content')
<div class="container-md bg-white col-10 p-5 shadow">
  <form action="{{route('Entidad.store')}}" method="post" class="row g-3">
      @csrf
      <h1>Registrar Entidad</h1>
      <div class="mb-3 col-md-4 col-auto">
          <label for="">Nombre</label>
          <input class="form-control" type="text" placeholder="Nombre de Entidad" name="nombre">
      </div>
      <div class="mb-3 col-md-4 col-auto">
          <label for="">Abreviacion</label>
          <input class="form-control" type="text" placeholder="Abreviacion" name="abrev">
      </div>
      <div class="mb-3 col-md-4 col-auto">
          <label for="">Poblacion Total</label>
          <input class="form-control" type="number" placeholder="No Poblacion Total" name="pob_tot">
      </div>
      <div class="mb-3 col-md-4 col-auto">
          <label for="">Poblacion Masc</label>
          <input class="form-control" type="number" placeholder="No Poblacion Masculino" name="pob_masc">
      </div>
      <div class="mb-3 col-md-4 col-auto">
          <label for="">Poblacion Fem</label>
          <input class="form-control" type="number" placeholder="No Poblacion Femenino" name="pob_fem">
      </div>
      <div class="col-6">
      <a href="{{route('Entidad.lista')}}" class="btn btn-primary mb-2 col-9"><--Atras</a>
      </div>

      <div class="col-6">

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
