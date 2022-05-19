@extends('adminlte::page')

@section('title', 'Alta Estaciones')

@section('content_header')
@stop
  @if (session()->has('msj'))
    <div class="alert alert-success" role="alert"> {{session('msj')}}</div>
  @endif
@section('content')
    <form action="{{route('Estaciones.store')}}" method="post" class="row g-3">
      @csrf
      <h1>Registrar Estacion</h1>
      <div class="mb-3 col-md-4 col-auto">
          <label for="">Ciudad</label>
          <select class="form-select" aria-label="Default select example" name="ciudad">
          
        <option selected>Ciudad</option>
        @foreach ($ciudades as $ciudad )

        <option value="{{$ciudad->id}}">
          {{$ciudad->nombre}}
          </option>
        @endforeach
      </select>
    </div>
      <div class="mb-3 col-md-4 col-auto">
          <label for="">Entidad</label>
          <select class="form-select" aria-label="Default select example" name="entidad">
          @foreach ($entidades as $entidad )

          <option value="{{$entidad->id}}">
            {{$entidad->nombre}}
            </option>
          @endforeach
        </select>
      </div>
    <div class="mb-3 col-md-4 col-auto">
        <label for="">Proveedor</label>
        <select class="form-select" aria-label="Default select example" name="proveedor">
          <option selected>Proveedor</option>

              @foreach ($proveedores as $proveedor )

              <option value="{{$proveedor->id}}">
                {{$proveedor->nombre}}  /  {{$proveedor->tipo}}
                </option>
              @endforeach
        </select>
    </div>

      <div class="mb-3 col-md-4 col-auto">
        <label for="" class="form-label">Estatus</label>
        <select class="form-select" aria-label="Default select example" name="estatus">
          <option selected>Estatus</option>

              @foreach ($estatus as $estatu )

              <option value="{{$estatu->id}}">
                {{$estatu->estatus}}
                </option>
              @endforeach

        </select>
      </div>
      <div class="mb-3 col-md-4 col-auto">
        <label class="form-label" for="">Grupo</label>
        <select class="form-select" aria-label="Default select example" name="grupo">
  

        <option selected>Grupo</option>
            <option value="Sitios nuevos">Sitios nuevos</option>
            <option value="Sitio actual SPR">Sitio actual SPR</option>
            <option value="Apertura 2022">Apertura 2022</option>
      </select>
    </div>
      <div class="mb-3 col-md-4 col-auto">
            <label class="form-label" for="">Latitud</label>
          <input class="form-control" type="text" placeholder="latitud..." name="latitud">
      </div>
      <div class="mb-3 col-md-4 col-auto">
          <label class="form-label" for="">Longitud</label>
          <input class="form-control" type="text" placeholder="longitud..." name="longitud">
      </div><hr>
      <div class="mb-3 col-md-4 col-auto">
          <label class="form-label" for="">Comentarios</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Comentarios de la estacion..." name="comentarios"></textarea>
      </div>
      <div class="mb-3 col-md-6 col-auto">
        <label for="" class="form-label">Referencia</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Referencia de la estacion..." name="referencia"></textarea>
    </div>
    <div class="col-4">

      <a href="{{route('Estaciones.index')}}" class="btn btn-primary col-9"><- Atras</a>
    </div>
              {{-- Empiza el boton modal --}}
          <div class="col-4">
              <button type="button" class="btn btn-primary col-9 end-1" data-toggle="modal" data-target="#exampleModalCenter">
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

@stop
