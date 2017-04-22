<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Producto;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$productos = Producto::all();
        $productos = Producto::paginate(5);
        return view('productos.list');
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

        Session::flash('message', 'Producto editado correctamente');
        return redirect('/productos/'.$id.'/edit');
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
        //$productos = DB::table('productos')->orderBy('nombre')->get();
        return view('productos.cotizacion',compact('productos'));
    }


    public function  generarpdf(Request $request)
    {
        $total = 0;
        $nombre = $request['nombre'];
       // DB:table('productos')->in($request['nombre'])
       // $productos =Producto::find($request['nombre']);
        $valor_unitario = $request['valor_unitario'];
        $cantidad = $request['cantidad'];
        $date = date('Y-m-d');
         $nproductos = count($nombre)-1;
        for ($i = 0; $i <= $nproductos; $i++) {
            $productos[$i] =Producto::find($nombre[$i]);
            $valor_total[$i] = $valor_unitario[$i]*$cantidad[$i];
            $total = $total + $valor_total[$i];

            //  $producto['registro']= Producto::find($nombre[$i]);
            //  $producto['valor_unitario']= $valor_unitario[$i];
            //   $producto['cantidad'] = $cantidad[$i];
            // $producto['valor_total'] = $valor_unitario[$i]*$cantidad[$i];
        }





          //  $producto['registro']= Producto::find($nombre[$i]);
          //  $producto['valor_unitario']= $valor_unitario[$i];
         //   $producto['cantidad'] = $cantidad[$i];
           // $producto['valor_total'] = $valor_unitario[$i]*$cantidad[$i];
        $minombre ="estefan";
        $view =  \View::make('productos.cotizacionpdf', compact('productos', 'valor_unitario','valor_total',
                                'total','cantidad','nproductos'))->render();
        $vista = \View::make('productos.prueba',compact('productos','valor_unitario','valor_total',
                                                        'total','cantidad','nproductos','date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->setPaper('A4');

        $pdf->loadHTML($vista);

        //return view('productos.cotizacionpdf',compact('productos','valor_unitario','valor_total','total','cantidad'));
        return  $pdf->stream('reporte.pdf');
        }

       // return view('productos.cotizacionpdf',compact('nombre','valor_unitario'));

}
