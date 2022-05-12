@extends('adminlte::page')

@section('title', 'Lista de Estatus')

@section('content_header')
@stop

@section('content')
<h1>Lista de Estatus</h1>
<a href="{{route('Estatus.alta')}}" class="btn btn-primary">Crear Nuevo</a>

<div class="container-md ml-2 col-6" >
    <table id="contratos" class="table table-striped mt-4 table-bordered shadow-l style="width:100%">
      <thead>
       <tr>
          <th scope="col">ID</th>
          <th scope="col">Nombre</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($estatus as $estatu)
        <tr>
          <td>{{$estatu->id}}</td>
          <td>{{$estatu->estatus}}</td>
          <td>
            <a href="/editar-estatus/{{ $estatu->id }}" class="btn btn-primary">Editar</a>
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
                    <a href="/eliminar-estatus/{{$estatu->id }}"  class="btn btn-danger">Borrar</a>
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

