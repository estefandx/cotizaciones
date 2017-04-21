<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap Admin Theme v3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">


</head>
<body>
    <h1>hola yo sere su puto pdf</h1>

    <table id="example" class="table table-bordered">
        <thead>
        <tr>
            <th>imagen</th>
            <th>Producto</th>
            <th>Marca</th>
            <th>Valor Unitario</th>
            <th>Cantidad</th>
            <th>ValorTotal</th>

        </tr>
        </thead>
        <tbody>
        @for($i = 0; $i <= $nproductos; $i++)
            <tr>
                <td>{{$productos[$i]->imagen}}</td>
                <td>{{$productos[$i]->nombre}}</td>
                <td>{{$productos[$i]->marca}}</td>
                <td>{{$valor_unitario[$i]}}</td>
                <td>{{$cantidad[$i]}}</td>
                <td>{{$valor_total[$i]}}</td>



            </tr>
        @endfor

        </tbody>

    </table>




</body>
</html>