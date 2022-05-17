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
    <form action="{{route('Estaciones.store')}}" method="post">
      @csrf
      <h1>Registrar Estacion</h1>
        
      <label for="">Contrato</label>
      <select class="form-select" aria-label="Default select example" name="contrato">
        <option selected>Contrato</option>
        @foreach ($contratos as $contrato )

        <option value="{{$contrato->id}}">
          {{$contrato->num_contrato}}
          </option>
        @endforeach
      </select>

      <label for="">Ciudad</label>
      <select class="form-select" aria-label="Default select example" name="ciudad">

        <option selected>Ciudad</option>
        @foreach ($ciudades as $ciudad )

        <option value="{{$ciudad->id}}">
          {{$ciudad->nombre}}
          </option>
        @endforeach
      </select>


      <label for="">Entidad</label>
      <select class="form-select" aria-label="Default select example" name="entidad">
       @foreach ($entidades as $entidad )

      <option value="{{$entidad->id}}">
        {{$entidad->nombre}}
        </option>
      @endforeach
    </select>


      <label for="">Proveedor</label>
      <select class="form-select" aria-label="Default select example" name="proveedor">
        <option selected>Proveedor</option>

            @foreach ($proveedores as $proveedor )

            <option value="{{$proveedor->id}}">
              {{$proveedor->nombre}}  /  {{$proveedor->tipo}}
              </option>
            @endforeach
      </select>


      <label for="">Referencia</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Referencia de la estacion..." name="referencia"></textarea>


      <label for="">Estatus</label>
      <select class="form-select" aria-label="Default select example" name="estatus">
        <option selected>Estatus</option>

            @foreach ($estatus as $estatu )

            <option value="{{$estatu->id}}">
              {{$estatu->estatus}}
              </option>
            @endforeach

      </select>

      <label for="">Grupo</label>
      <select class="form-select" aria-label="Default select example" name="grupo">
        <option selected>Grupo</option>
            <option value="Sitios nuevos">Sitios nuevos</option>
            <option value="Sitio actual SPR">Sitio actual SPR</option>
            <option value="Apertura 2022">Apertura 2022</option>
      </select>

      
      <label for="">Latitud</label>
      <input class="form-control" type="text" placeholder="latitud..." name="latitud">
      <label for="">Longitud</label>
      <input class="form-control" type="text" placeholder="longitud..." name="longitud">

      <label for="">Comentarios</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Comentarios de la estacion..." name="comentarios"></textarea>


      <a href="{{route('Estaciones.index')}}" class="btn btn-primary">Atras</a>

      
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
