<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::resource('productos', 'ProductoController');

Route::get('/cotizacion', 'ProductoController@cotizacion');

Route::post('/cotizacion', 'ProductoController@generarpdf');


Route::get('api/productos',function (){

    $formEliminar ='<img '.' src= "{{$producto->imagen}}" alt="Generic placeholder image" ';


    return Datatables::eloquent(\App\Producto::query())
        ->addColumn('test',function ($producto)
                        { return '<a href="'.url("/productos/$producto->producto_id").'/edit'.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>'
                          .' <a class=" eliminar-producto btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i> eliminar</a>'  ;})
        ->editColumn('imagen',function ($producto){
                    $url_imagen = '<img  src="imagenes/'.$producto->imagen.'" alt="Generic placeholder image"  width="50" height="50">' ;
                    return $url_imagen;
        })
        ->make(true);


});


//Route::post('/pdf', 'PdfController@generarpdf');