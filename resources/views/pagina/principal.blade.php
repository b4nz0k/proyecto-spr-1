@extends('layouts.vistapadre')

@section('contenidoPrincipal')


    <h1>Mapa Principal</h1>
    @php 
    echo "Esto es una pueba";
    @endphp
    <ul>
        @for ($i=0; $i < 10; $i++) 
        <li>
            El valor de i es {{$i}}
        </li>
        @endfor
    </ul>
    <ul>
        @foreach ($users as $user )
            <li>{{$user}}</li>
        @endforeach
    </ul>

</form>
@endsection()