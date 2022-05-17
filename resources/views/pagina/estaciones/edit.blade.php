@extends('adminlte::page')

@section('title', 'Alta Estaciones')

@section('content_header')
@stop
  @if (session()->has('msj'))
    <div class="alert alert-success" role="alert"> {{session('msj')}}</div>
    @else
    <div class="alert alert-damage" role="alert"> </div>
  @endif
@section('content')
    <form action="/editar-estacion/{{$estacion->id}}" method="post">
      @csrf
      <h1>Editar Estacion</h1>
        

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


      <label for="">Proveedor</label>
      <select class="form-select" aria-label="Default select example" name="proveedor">
        <option selected>Proveedor</option>

         @foreach ($proveedores as $proveedor )
                @php
                $activo = ($estacion->proveedor == $proveedor->id ) ? (' selected="selected" ') : ('');
                @endphp
                <option {{$activo}} value="{{$proveedor->id}}">
                {{$proveedor->nombre}}  /  {{$proveedor->tipo}}
                </option>
            @endforeach
      </select>


      <label for="">Referencia</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Referencia de la estacion..." name="referencia">
          {{$estacion->referencia}}
      </textarea>


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

      <label for="">Grupo</label>
      <select class="form-select" aria-label="Default select example" name="grupo">
        <option name="{{$estacion->grupo}}" selected>{{$estacion->grupo}}</option>
            <option value="Sitios nuevos">Sitios nuevos</option>
            <option value="Sitio actual SPR">Sitio actual SPR</option>
            <option value="Apertura 2022">Apertura 2022</option>
      </select>

      
      <label for="">Latitud</label>
      <input class="form-control" type="text" placeholder="latitud..." name="latitud" value="{{$estacion->latitud}}">
      <label for="">Longitud</label>
      <input class="form-control" type="text" placeholder="longitud..." name="longitud" value="{{$estacion->longitud}}">

      <label for="">Comentarios</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Comentarios de la estacion..." name="comentarios" >{{$estacion->comentarios}}</textarea>


      <a href="{{route('Estaciones.index')}}" class="btn btn-primary">Atras</a>

      
              {{-- Empiza el boton modal --}}
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Actualizar
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
