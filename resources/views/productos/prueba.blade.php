
<HTML>
<HEAD>
    <TITLE> Mi primer página de HTML</TITLE>


    <style>

        .col-md-12 {
            width: 100%;
        }

        .box {
            position: relative;
            border-radius: 3px;
            background: #ffffff;
            border-top: 3px solid #d2d6de;
            margin-bottom: 20px;
            width: 100%;
            box-shadow: 0 1px 1px rgba(0,0,0,0.1);
            background-color: #ECF0F5;
        }

        .box-header {
            color: #444;
            display: block;
            padding: 10px;
            position: relative;
        }

        .box-header.with-border {
            border-bottom: 1px solid #f4f4f4;
        }


        .box-header .box-title {
            display: inline-block;
            font-size: 18px;
            margin: 0;
            line-height: 1;
        }

        .box-body {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-bottom-right-radius: 3px;
            border-bottom-left-radius: 3px;
            padding: 10px;

        }


        .box-footer {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-bottom-right-radius: 3px;
            border-bottom-left-radius: 3px;
            border-top: 1px solid #f4f4f4;
            padding: 10px;
            background-color: #fff;
        }


        .table-bordered {
            border: 1px solid #f4f4f4;
        }


        .table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 20px;
        }

        table {
            background-color: transparent;
        }

        .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
            border: 1px solid #f4f4f4;
        }


        .badge {
            display: inline-block;
            min-width: 10px;
            padding: 3px 7px;
            font-size: 12px;
            font-weight: 700;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            background-color: #777;
            border-radius: 10px;
        }

        .bg-red {
            background-color: #dd4b39 !important;
        }


    </style>
</HEAD>
<BODY>
<div class="logo">
    <img  src= "pdf/logo.jpg">
</div>


<div class="col-md-12">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Cotizacion de productos - <?=  $date; ?></h3>
        </div><!-- /.box-header -->
        <div class="box-body">
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
                        <td>   <img  src= "{{$productos[$i]->imagen}}" width="50" height="50"></td>
                        <td>{{$productos[$i]->nombre}}</td>
                        <td>{{$productos[$i]->marca}}</td>
                        <td>{{number_format($valor_unitario[$i])}}</td>
                        <td>{{$cantidad[$i]}}</td>
                        <td>{{number_format($valor_total[$i])}}</td>
                    </tr>
                @endfor
                <tr>
                    <td>  Total </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{number_format($total)}}</td>
                </tr>
                </tbody>
            </table>
        </div><!-- /.box-body -->
        <div class="box-footer clearfix">

        </div>
    </div><!-- /.box -->


</div>

</BODY>
</HTML>