@extends('adminlte::page')

@section('title', 'Lista de Ciudades')

@section('content_header')
@stop
    @if (session()->has('msj'))
    <div class="alert alert-success" role="alert"> {{session('msj')}}</div>
    @else
    <div class="alert alert-damage" role="alert"> </div>
    @endif
@section('content')
<h1>Lista de Ciudades</h1>
<a href="{{route('Ciudad.alta')}}" class="btn btn-primary">Crear Nuevo</a>

<div class="container-md ml-2 col-6" >
  <table id="contratos" class="table table-striped mt-4 table-bordered shadow-lg" style="width:100%">
    <thead>
       <tr>
          <th scope="col">ID</th>
          <th scope="col">Nombre</th>
          <th scope="col">Accion</th>

        </tr>
      </thead>
      <tbody>
        @foreach ($ciudades as $ciudad)
        <tr>
          <td>{{$ciudad->id}}</td>
          <td>{{$ciudad->nombre}}</td>
          <td>
            <a href="/editar-ciudad/{{ $ciudad->id }}" class="btn btn-primary">Editar</a>
            <button type="button" class="btn btn-danger " data-toggle="modal" data-target="#exampleModalCenter">
              Eliminar
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
                    Estas seguro que Desea eliminar?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <a href="/eliminar-ciudad/{{$ciudad->id }}"  class="btn btn-danger">Borrar</a>
                  </div>
                </div>
              </div>
            </div>
          </td>
        </tr>

        @endforeach

      </tbody>
    </table>
</div>

@stop

