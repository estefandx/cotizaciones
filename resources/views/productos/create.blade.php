@extends('layaut.master')
@section('contenido')
    <div class="col-md-6">
        <div class="content-box-large">
            <div class="panel-heading">
                <div class="panel-title">Crear Producto</div>

                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-list"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <div class="alert alert-success" role="alert">producto registrado</div>
                <form  role="form"  method="POST" action="{{ url('/productos') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <fieldset>
                        <div class="form-group">
                            <label>nombre</label>
                            <input class="form-control" placeholder="Nombre" type="text" id="nombre" name="nombre">
                        </div>
                        <div class="form-group">
                            <label>Marca</label>
                            <input class="form-control" placeholder="Marca" type="text" id="marca" name="marca">
                        </div>
                        <div class="form-group">
                            <input type="file" class="btn btn-default" id="imagen" name="imagen">
                        </div>

                    </fieldset>
                    <div>
                        <button class="btn btn-primary ">Registrar</button>
                        </div>

                </form>
            </div>
        </div>
    </div>
@endsection