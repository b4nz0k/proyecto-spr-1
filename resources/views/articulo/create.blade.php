@extends('layouts.plantillabase')
@section('segundaPlantilla')
<h2>Crear registros</h2>
<form action="{{route('articulo.store')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Codigo</label>
        <input type="text" class="form-control" name="codigo" tabindex="1">
    <div class="mb-3">.
        <label class="form-label">Descripcion</label>
        <input type="text" class="form-control" name="descripcion" tabindex="2">
    </div>
    <div class="mb-3">
        <label class="form-label">Canidad</label>
        <input type="text" class="form-control" name="cantidad" tabindex="3">
    <div class="mb-3">.
        <label class="form-label">Precio</label>
        <input type="text" class="form-control" name="precio" tabindex="4">
    </div>
    <a href="./articulos" class="btn btn-secondary" tabindex="5">Cancelar</a>
      <button type="submit" class="btn btn-primary" tabindex="6">Guardar</button>
    
</form>
@endsection