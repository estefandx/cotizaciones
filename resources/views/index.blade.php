@extends('layaut.master')

@section('contenido')
    <table id="example" class="table">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Imagen</th>
            <th>acciones</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Imagen</th>
            <th>acciones</th>
        </tr>
        </tfoot>
        <tbody>

        @foreach($productos as $producto)
            <tr>
                <td>{{$producto->nombre}}</td>
                <td>{{$producto->marca}}</td>
                <td><img  src= "{{$producto->imagen}}" alt="Generic placeholder image" ></td>
                <td>
                    <p><a class="btn btn-default" href="{{ url("/pelicula/{$producto->producto_id}/edit")}}" role="button">editar </a></p>
                    <form  role="form"  method="post" action="{{ url("/pelicula/{$producto->producto_id}") }}">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}

                        <input class="btn btn-danger" type="submit" value="eliminar" />
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection