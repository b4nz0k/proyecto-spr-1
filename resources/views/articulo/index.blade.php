@extends('layouts.plantillabase')
@section('segundaPlantilla')
<h1>Vista Index</h1>

<a href="articulos/create" class="btn btn-primary">Crear</a>
<table class="table table-dark mt-4 table-striped">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Codigo</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio</th>
            <th scope="col">Aciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $articulos as $articulo)
            <tr>
                <td>{{$articulo->id}}</td>
                <td>{{$articulo->codigo}}</td>
                <td>{{$articulo->descripcion}}</td>
                <td>{{$articulo->cantidad}}</td>
                <td>{{$articulo->precio}}</td>
                <td>
                    <a href="" class="btn btn-info">Editar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection