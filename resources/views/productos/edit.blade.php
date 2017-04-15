@extends('layaut.master')
@section('contenido')
    <div class="col-md-8">
        <div class="content-box-large">
            <div class="panel-heading">
                <div class="panel-title">Editar Producto</div>

                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-list"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-10">
                        <img src="http://lorempixel.com/50/50/?83842" alt="Generic placeholder image">
                        <form  role="form"  method="POST" action="{{ url("/productos/{$producto->producto_id}") }}" enctype="multipart/form-data">
                            {{ method_field('put') }}
                            {{ csrf_field() }}
                            <fieldset>
                                <div class="form-group">
                                    <label>nombre</label>
                                    <input class="form-control" placeholder="Nombre" type="text" id="nombre" name="nombre" value="{{$producto->nombre}}">
                                </div>
                                <div class="form-group">
                                    <label>Marca</label>
                                    <input class="form-control" placeholder="Marca" type="text" id="marca" name="marca" value="{{$producto->marca}}">
                                </div>
                                <div class="form-group">
                                    <input type="file" class="btn btn-default" id="imagen" name="imagen">
                                </div>

                            </fieldset>
                            <div>
                                <button class="btn btn-primary ">Editar</button>
                            </div>

                        </form>
                    </div>
                    <div class="col-md-2" >

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection