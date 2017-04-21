@extends('layaut.master')


@section('contenido')
    <form id="cotizacion" method="post" action="{{ url('/cotizacion') }}">
            {{csrf_field() }}
        <h3 class=" text-center pad-basic no-btm" style="background: #333; color: lavenderblush">Generar Cotización </h3>
        <table class="table bg-info"  id="tabla">
            <thead>
            <tr>
                <th>Producto</th>
                <th>Valor unitario</th>
                <th>Cantidad</th>
                <th>Acciones</th>

            </tr>
            </thead>
            <tr class="fila-fija">
                <td>   <select id="" class="" name=nombre[]" >
                        @foreach($productos as $producto)
                            <option value="{{$producto->producto_id}}">{{$producto->nombre}}</option>
                        @endforeach
                    </select>
                </td>
                <td><input class="form-group-sm" required name="valor_unitario[]" placeholder="Valor unitario"/></td>
                <td><input required name="cantidad[]" placeholder="Cantidad"/></td>
                <td class=" eliminar"><input type="button"   value="eliminar"/></td>
            </tr>

        </table>

        <div class="btn-der">
            <input type="submit" name="insertar" value="Generar cotizacion" class="btn btn-info"/>
            <button id="adicional" name="adicional" type="button" class="btn btn-warning"> Más + </button>

        </div>
    </form>

@endsection

@section('js')
    <script>

        $(function(){
            var id = 0;
            var producto = "";
            // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
            $("#adicional").on('click', function(){

               // $("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').attr("id","producto"+ id).appendTo("#tabla");
               var fila =  $("#tabla tbody tr:eq(0)").clone().attr("id","producto"+id);
                  $("producto1").chosen({});
               // $("#tabla tbody tr:eq(0)").clone().addClass('chosen_select_field').appendTo("#tabla");
                fila.appendTo("#tabla");
               // console.log( fila.child());
               // producto = '#producto'+id;
               // console.log(producto);
               // $(producto > select).chosen({});
                id = id+1;

            });



            // Evento que selecciona la fila y la elimina
            $(document).on("click",".eliminar",function(){
                if ($('#tabla >tbody >tr').length > 1){
                    var parent = $(this).parents().get(0);
                    $(parent).remove();
                }else{
                    alert("debe existir minimo un producto");
                }

            });
        });
    </script>

    <script>
      //  $("#tabla > tbody > tr > td > select").chosen({});
        //$(".chosen_select_field").chosen({});
    </script>

    <script>
        $(document).on("submit","#coti666acion",function(e){
            e.preventDefault();
            var formu=$(this);
       //   alert("se desactivo el motodo post izi perro");
            url = formu.attr('action');
            data = formu.serialize();
            $.post(url,data,function (result) {

            })




        })


    </script>
@endsection