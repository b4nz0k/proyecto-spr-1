@extends('adminlte::page')

@section('title', 'Alta Estaciones')

@section('content_header')
  @if (session()->has('msj'))
    <div class="alert alert-success" role="alert"> {{session('msj')}}</div>
  @endif
@section('content')
<div class="container-md bg-white col-10 p-5 shadow">

    <form action="{{route('Estaciones.store')}}" method="post" class="row g-3">
      @csrf
      <h1>Registrar Estacion</h1>
      <div class="mb-3 col-md-4 col-auto">
          <label for="">Ciudad</label>
          <select class="form-select  @error('ciudad') border-2 border-danger @enderror" aria-label="Default select example" name="ciudad">
          
        <option value="" selected>Ciudad</option>
        @foreach ($ciudades as $ciudad )

        <option value="{{$ciudad->id}}">
          {{$ciudad->nombre}}
          </option>
        @endforeach
      </select>
              @error('ciudad')
              <p class="bg-red text-white text-sm p-2 text-center rounded-lg">{{$message}}</p>
              @enderror
    </div>
      <div class="mb-3 col-md-4 col-auto">
          <label for="">Entidad</label>
          <select class="form-select @error('entidad') border-2 border-danger @enderror" aria-label="Default select example" name="entidad">
            <option value="" selected>Entidad</option>

          @foreach ($entidades as $entidad )

          <option value="{{$entidad->id}}">
            {{$entidad->nombre}}
            </option>
          @endforeach
        </select>
                  @error('entidad')
                  <p class="bg-red text-white text-sm p-2 text-center rounded-lg">{{$message}}</p>
                  @enderror
      </div>
    <div class="mb-3 col-md-4 col-auto">
        <label for="">Proveedor</label>
        <select class="form-select @error('proveedor') border-2 border-danger @enderror" aria-label="Default select example" name="proveedor">
          <option value="" selected>Proveedor</option>

              @foreach ($proveedores as $proveedor )

              <option value="{{$proveedor->id}}">
                {{$proveedor->nombre}}  /  {{$proveedor->tipo}}
                </option>
              @endforeach
        </select>
                  @error('proveedor')
                  <p class="bg-red text-white text-sm p-2 text-center rounded-lg">{{$message}}</p>
                  @enderror
    </div>

      <div class="mb-3 col-md-4 col-auto">
        <label for="" class="form-label">Estatus</label>
        <select class="form-select @error('estatus') border-2 border-danger @enderror" aria-label="Default select example" name="estatus">
          <option value="" selected>Estatus</option>

              @foreach ($estatus as $estatu )

              <option value="{{$estatu->id}}">
                {{$estatu->estatus}}
                </option>
              @endforeach

        </select>
                  @error('estatus')
                  <p class="bg-red text-white text-sm p-2 text-center rounded-lg">{{$message}}</p>
                  @enderror
      </div>
      <div class="mb-3 col-md-4 col-auto">
        <label class="form-label" for="">Grupo</label>
        <select class="form-select @error('grupo') border-2 border-danger @enderror" aria-label="Default select example" name="grupo">
  

        <option value="" selected>Grupo</option>
            <option value="Sitios nuevos">Sitios nuevos</option>
            <option value="Sitio actual SPR">Sitio actual SPR</option>
            <option value="Apertura 2022">Apertura 2022</option>
      </select>
                    @error('grupo')
                    <p class="bg-red text-white text-sm p-2 text-center rounded-lg">{{$message}}</p>
                    @enderror
    </div>
      <div class="mb-3 col-md-4 col-auto">
            <label class="form-label" for="">Latitud</label>
          <input class="form-control  @error('latitud') border-2 border-danger @enderror" value="{{ old('latitud') }}"
           type="text" placeholder="latitud..." name="latitud">
                  @error('latitud')
                  <p class="bg-red text-white text-sm p-2 text-center rounded-lg">{{$message}}</p>
                  @enderror
      </div>
      <div class="mb-3 col-md-4 col-auto">
          <label class="form-label" for="">Longitud</label>
          <input class="form-control @error('longitud') border-2 border-danger @enderror" value="{{ old('longitud') }}"
           type="text" placeholder="longitud..." name="longitud">
                      @error('longitud')
                      <p class="bg-red text-white text-sm p-2 text-center rounded-lg">{{$message}}</p>
                      @enderror
      </div><hr>
      <div class="mb-3 col-md-4 col-auto">
          <label class="form-label" for="">Comentarios</label>
          <textarea class="form-control @error('comentarios') border-2 border-danger @enderror" value="{{ old('comentarios') }}"
           id="exampleFormControlTextarea1" rows="3" placeholder="Comentarios de la estacion..." name="comentarios"></textarea>
                      @error('comentarios')
                      <p class="bg-red text-white text-sm p-2 text-center rounded-lg">{{$message}}</p>
                      @enderror
      </div>
      <div class="mb-3 col-md-6 col-auto">
        <label for="" class="form-label">Referencia</label>
        <textarea class="form-control @error('referencia') border-2 border-danger @enderror" value="{{ old('referencia') }}"
         id="exampleFormControlTextarea1" rows="3" placeholder="Referencia de la estacion..." name="referencia"></textarea>
                    @error('referencia')
                    <p class="bg-red text-white text-sm p-2 text-center rounded-lg">{{$message}}</p>
                    @enderror
    </div>
    <div class="col-4">
      {{-- <input id="prodId" name="id" type="hidden" value="{{}}"> --}}

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
</div>
@stop
