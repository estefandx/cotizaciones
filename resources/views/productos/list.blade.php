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
            <th>Acciones</th>
        </tr>
        </thead>

    </table>
        <form  id="form-eliminar" role="form"  method="post" action="{{ url('/productos')}}  ">
            {{ method_field('delete') }}
            {{ csrf_field() }}


        </form>
    </div>
@endsection

@section('js')
    <script>
    $(document).ready(function() {
        var table =    $('#example').DataTable({
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


                },
                "processing": true,
                "serverSide": true,
                "ajax": "/api/productos",
                "columns": [
                    {data: 'producto_id'},
                    {data: 'nombre'},
                    {data: 'marca'},
                    {data:'imagen'},
                    {data: 'test'},

                ],
                "columnDefs": [
                    {
                        "targets": [ 3 ],
                        "searchable": false
                    },
                    {
                        "targets": [ 4 ],
                        "searchable": false
                    }

                ]
            });




            $( "#example tbody").on("click",".eliminar-producto", function(){
            var fila = table.row($(this).parents('tr')).data();
            console.log(fila.producto_id);
            var id = fila.producto_id;
            var form = $('#form-eliminar');
            var url =form.attr('action');
            url.trim();
            var url_d = url.concat(id);

           // console.log(url_d);
            var data = form.serialize();
            alert(url_d);

                fila.fadeOut();
                $.post('http://localhost:8000/productos/5', data, function (result) {
                    alert(result.message);
                }).fail(function () {
                    alert('El usuario no fue eliminado');
                    fila.show();
                });
        });
        } );


//  $(document).on("click",".eliminar-producto",function(){

         //alert('si entre joven');
        // var  row = $(this).siblings('td');
        // var  id = $(this).e
         //var data = table.row($(this).parents("tr")).data();
        // console.log(row);


    // });
    </script>

    <script>


    </script>
@endsection