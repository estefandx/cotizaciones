@extends('layaut.master')


@section('contenido')
    <form method="post" action="{{ url('/cotizacion') }}">
        {{ csrf_field() }}
        <h3 class="bg-primary text-center pad-basic no-btm">Generar Cotización </h3>
        <table class="table bg-info"  id="tabla">
            <tr class="fila-fija">
                <td>   <select id="producto_1" class="" name=nombre[]" >
                        @foreach($productos as $producto)
                            <option value="{{$producto->producto_id}}">{{$producto->nombre}}</option>
                        @endforeach
                    </select>
                </td>
                <td><input class="form-group-sm" required name="valor_unitario[]" placeholder="Valor unitario"/></td>
                <td><input required name="cantidad[]" placeholder="Cantidad"/></td>
                <td class="eliminar"><input type="button"   value="Menos -"/></td>
            </tr>
         
        </table>

        <div class="btn-der">
            <input type="submit" name="insertar" value="Insertar Alumno" class="btn btn-info"/>
            <button id="adicional" name="adicional" type="button" class="btn btn-warning"> Más + </button>

        </div>
    </form>

@endsection

@section('js')
    <script>

        $(function(){
            // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
            $("#adicional").on('click', function(){
                $("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");

            });



            // Evento que selecciona la fila y la elimina
            $(document).on("click",".eliminar",function(){
                if ($('#tabla >tbody >tr').length > 1){
                    var parent = $(this).parents().get(0);
                    $(parent).remove();
                }else{
                    alert("debe existir minimo un elemento");
                }

            });
        });
    </script>

    <script>
        $("#producto_1").chosen({});
    </script>
@endsection