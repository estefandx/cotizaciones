<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Producto;
use Illuminate\Support\Facades\Input;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        return view('productos.list',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = Input::file('imagen');
        $aleatorio = str_random(10);
        $nombre = $aleatorio.$file->getClientOriginalName();
        //$file->move('peliculas',$nombre);
        \Storage::disk('local')->put($nombre,  \File::get($file));

        Producto::create([
            'nombre' => $request['nombre'],
            'marca' => $request['marca'],
            'imagen' => $nombre,

        ]);

        return redirect('/productos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);

        return view('productos.edit',compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);

        $file = Input::file('imagen');
        if (isset($file)){
            $aleatorio = str_random(10);
            $nombre = $aleatorio.$file->getClientOriginalName();
            //$file->move('peliculas',$nombre);
            \Storage::disk('local')->put($nombre,  \File::get($file));
            \Storage::disk('local')->delete($producto->url_imagen);
            $producto->imagen = $nombre;

        }

        $producto->nombre = $request['nombre'];
        $producto->marca = $request['marca'];
        $producto->save();
        return redirect('/productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);
       // \Storage::delete($producto->imagen);
        $producto->delete();
        return redirect('/productos');
    }

    public function  cotizacion()
    {
        $productos = Producto::all();
        return view('productos.cotizacion',compact('productos'));
    }


    public function  generarpdf(Request $request)
    {
        $nombre = $request['nombre'];
        $valor_unitario = $request['valor_unitario'];
        return view('productos.cotizacionpdf',compact('nombre','valor_unitario'));
    }
}
