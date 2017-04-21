<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function crearPDF(Request $request)
    {

        if ($request->ajax()){

            return redirect('/');
        }
        $data=$request->all();
       // $data = $datos;
       // $date = date('Y-m-d');
       // $view =  \View::make($vistaurl, compact('data', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML("<h1>prueba<h1>");

        //if($tipo==1){return $pdf->stream('reporte');}
       // if($tipo==2){return $pdf->download('reporte.pdf'); }

        //return $pdf->stream('reporte.pdf');
        return 'no es una pericion ajax';
    }
}
