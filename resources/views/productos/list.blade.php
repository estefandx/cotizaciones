@extends('layaut.master')

@section('contenido')
    <div class="col-lg-10">
    <p><a class="btn btn-primary" href="{{ url("/productos/create")}}" role="button">Crear Producto </a></p>
    <br>
    <table id="example" class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Imagen</th>
            <th>acciones</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Imagen</th>
            <th>acciones</th>
        </tr>
        </tfoot>
        <tbody>

        @foreach($productos as $producto)
            <tr>
                <td>{{$producto->producto_id}}</td>
                <td>{{$producto->nombre}}</td>
                <td>{{$producto->marca}}</td>
                <td><img  src= "{{$producto->imagen}}" alt="Generic placeholder image" ></td>
                <td>
                    <div class="btn-group">
                        <a title="editar" class="btn btn-primary btn-sm" href="{{ url("/productos/{$producto->producto_id}/edit")}}" role="button"><i class="glyphicon glyphicon-pencil"></i></a>
                        <a title="eliminar" class="btn btn-danger btn-sm" type="button" class="btn btn-primary" data-toggle="modal" data-target="{{'#'.'eliminar-'.$producto->producto_id}}" role="button"><i class="glyphicon glyphicon-remove"></i> </a>

                    </div>

                </td>
            </tr>
            <div class="modal fade" id="{{'eliminar-'.$producto->producto_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel">Desea eliminar el registro</h4>
                        </div>
                        <div class="modal-body">
                            <form  role="form"  method="post" action="{{ url("/productos/{$producto->producto_id}") }}">
                                {{ method_field('delete') }}
                                {{ csrf_field() }}


                        </div>
                        <div class="modal-footer">
                            <input class="btn btn-danger" type="submit" value="eliminar" />
                            </form>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>

        @endforeach
        </tbody>
    </table>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }


                }

            })
        } );
    </script>
@endsection