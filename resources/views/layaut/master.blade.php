<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap Admin Theme v3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

    <!-- Bootstrap -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <!-- styles -->
   <!-- <link href="css/styles.css" rel="stylesheet">-->
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/datatable/datatables.min.css')}}">

    <link rel="stylesheet" href="{{asset('plugins/chosen/chosen.css')}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <!-- Logo -->
                <div class="logo">
                    <h1><a href="index.html">Generación de cotizaciones</a></h1>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="page-content">
    <div class="row">
        <div class="col-md-2">
            <div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li><a href="/"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                    <li><a href="{{url('/productos')}}"><i class="glyphicon glyphicon-list-alt"></i> Productos</a></li>
                    <li><a href="{{url('/cotizacion')}}"><i class="glyphicon glyphicon-file"></i>Generar cotizacion</a></li>

                </ul>
            </div>
        </div>
        <div class="col-md-10">

        @yield('contenido')

        </div>
    </div>
</div>

<footer>
    <div class="container">

        <div class="copy text-center">
            Copyright 2017 <a href='#'>Website</a>
        </div>

    </div>
</footer>


<script type="text/javascript" src="{{ URL::asset('assets/js/jquery-3.2.1.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/custom.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/datatable/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('plugins/chosen/chosen.jquery.js') }}"></script>

@yield('js')







</body>
</html>