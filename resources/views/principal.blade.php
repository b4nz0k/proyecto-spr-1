@extends('adminlte::page')

@section('title', 'Pagina Principal')

@section('content_header')
  @if (session()->has('msj'))
    <div class="alert alert-success" role="alert"> {{session('msj')}}</div>
  @endif
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Panel de ontrol') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container-fluid py-5">
                        <h1 class="display-5 fw-bold">  {{ __('Biembenido!') }}  </h1>
                        <p class="col-md-8 fs-4">
                            al sistema de gestión de contenidos, permite crear un entorno de trabajo para la creación 
                            y administración de contenidos. 
                        </p>
                        <a href="{{route('Estaciones.index')}}" class="btn btn-primary btn-lg" type="button">Registrar Pago</a>
                    </div>
                    <div class="row align-items-md-stretch">
                        <div class="col-md-6">
                          <div class="h-100 p-5 text-white bg-dark rounded-3">
                            <h2>Manager CMS</h2>
                            <p>Permite crear tus contenidos rápidamente. Estos se pueden agregar al sitio web con unos pocos clics para crear.</p>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="h-100 p-5 bg-light border rounded-3">
                            <h2>Funciones</h2>
                            <li>Catalogo de Pagos</li>
                            <li>Catalogo de Estaciones</li>
                            <li>Catalogo de Proveedores</li>
                            <li>Catalogo de Ciudades</li>
                            <li>Catalogo de Entidades</li>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
