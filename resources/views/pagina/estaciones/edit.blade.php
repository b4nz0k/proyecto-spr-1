@extends('adminlte::page')

@section('title', 'Alta Estaciones')

@section('content_header')
@stop
  @if (session()->has('msj'))
    <div class="alert alert-success" role="alert"> {{session('msj')}}</div>
  @endif
@section('content')
<div class="container-md bg-white col-10 p-5 shadow">

    <form action="/editar-estacion/{{$estacion->id}}" method="post" class="row g-3">
      @csrf
      <h1>Editar Estacion</h1>
        <div class="col-auto">
          <a href="/historial-estacion/{{$estacion->id}}" class="btn btn-primary">Ver Historial</a>
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">Eliminar</button>
        </div><hr>
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
                    <a href="/eliminar-estacion/{{$estacion->id}}" class="btn btn-danger">Eliminar</a>
                  </div>
                </div>
              </div>
            </div>
            {{-- End modal --}}
      <div class="mb-3 col-md-4 col-auto">
          <label for="">Ciudad</label>
          <select class="form-select" aria-label="Default select example" name="ciudad">
        <option selected>Ciudad</option>
        @foreach ($ciudades as $ciudad )
            @php
            $activo = ($estacion->ciudad == $ciudad->id ) ? (' selected="selected" ') : ('');
            @endphp

        <option {{$activo}}  value="{{$ciudad->id}}">
          {{$ciudad->nombre}}
          </option>
        @endforeach
      </select>
      </div>
      <div class="mb-3 col-md-4 col-auto">
            <label for="">Entidad</label>
            <select class="form-select" aria-label="Default select example" name="entidad">
            @foreach ($entidades as $entidad )
                  @php
                  $activo = ($estacion->entidad == $entidad->id ) ? (' selected="selected" ') : ('');
                  @endphp
            <option {{$activo}}  value="{{$entidad->id}}">
              {{$entidad->nombre}}
              </option>
            @endforeach
          </select>
      </div>
      <div class="mb-3 col-md-4 col-auto">
          <label for="">Proveedor</label>
          <select class="form-select" aria-label="Default select example" name="proveedor">
            <option value="0" selected>Proveedor</option>

            @foreach ($proveedores as $proveedor )
                    @php
                    $activo = ($estacion->proveedor == $proveedor->id ) ? (' selected="selected" ') : ('');
                    @endphp
                    <option {{$activo}} value="{{$proveedor->id}}">
                    {{$proveedor->nombre}}  /  {{$proveedor->tipo}}
                    </option>
                @endforeach
          </select>
      </div>
    
      <div class="mb-3 col-md-4 col-auto">
          <label for="">Estatus</label>
          <select class="form-select" aria-label="Default select example" name="estatus">
            <option selected>Estatus</option>

                @foreach ($estatus as $estatu )
                    @php
                    $activo = ($estacion->estatus == $estatu->id ) ? (' selected="selected" ') : ('');
                    @endphp
                <option {{$activo}} value="{{$estatu->id}}">
                  {{$estatu->estatus}}
                  </option>
                @endforeach

          </select>
      </div>
      <div class="mb-3 col-md-4 col-auto">
          <label for="">Grupo</label>
          <select class="form-select" aria-label="Default select example" name="grupo">
            <option name="{{$estacion->grupo}}" selected>{{$estacion->grupo}}</option>
                <option value="Sitios nuevos">Sitios nuevos</option>
                <option value="Sitio actual SPR">Sitio actual SPR</option>
                <option value="Apertura 2022">Apertura 2022</option>
          </select>
      </div>
      <div class="mb-3 col-md-4 col-auto">
          <label for="">Latitud</label>
          <input class="form-control" type="text" placeholder="latitud..." name="latitud" value="{{$estacion->latitud}}">
      </div>
      <div class="mb-3 col-md-4 col-auto">
          <label for="">Longitud</label>
          <input class="form-control" type="text" placeholder="longitud..." name="longitud" value="{{$estacion->longitud}}">
      </div>
      <div class="mb-3 col-md-4 col-auto">
        <label for="">Referencia</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Referencia de la estacion..." name="referencia">
            {{$estacion->referencia}}
        </textarea>
    </div>
      <div class="mb-3 col-md-4 col-auto">
          <label for="">Comentarios</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Comentarios de la estacion..." name="comentarios" >{{$estacion->comentarios}}</textarea>
      </div><hr>

      <div class="col-4">
          <a href="{{route('Estaciones.index')}}" class="btn btn-primary col-9">Atras</a>
      </div>
      <div class="col-4">

              {{-- Empiza el boton modal --}}
              <button type="button" class="btn btn-primary col-9" data-toggle="modal" data-target="#exampleModalCenter">
                Actualizar
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
