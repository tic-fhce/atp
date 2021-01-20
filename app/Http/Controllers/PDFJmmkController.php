<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App;

class PDFJmmkController extends Controller
{
    //
    public function notaInternaPDF($idTIC){

    	session_start();
        if(isset($_SESSION['usuario']))
        {

        	$datos=$_SESSION['usuario'];

        	$doc=App\Documento::findOrFail($idTIC);

        	$de = DB::table('view_de')->where('id_unidad', $datos->id_unidad)->where('id_tipo_personal',1)->first();

        	$year = substr($doc->fecha,0,4);
        	$dia = substr($doc->fecha,8,2);
        	$i =substr($doc->fecha,6,2);

        	switch ($i) {
			    case 1:
			        $mes="Enero";
			        break;
			    case 2:
			        $mes="Febrero";
			        break;
			    case 3:
			        $mes="Marzo";
			        break;
			    case 4:
			        $mes="Abril";
			        break;
			    case 5:
			        $mes="Mayo";
			        break;
			    case 6:
			        $mes="Junio";
			        break;
			    case 7:
			        $mes="Julio";
			        break;
			    case 8:
			        $mes="Agosto";
			        break;
			    case 9:
			        $mes="Septiembre";
			        break;
			    case 10:
			        $mes="Octubre";
			        break;
			    case 11:
			        $mes="Noviembre";
			        break;
			    case 12:
			        $mes="Diciembre";
			        break;
			}
			$vobo="";
			if($doc->cad==1){
				$vobo = DB::table('view_vobo')->where('id_documento', $idTIC)->first();
			}

			$fecha =$dia.' de '.$mes.' de '.$year; 
        	$resume = array('fecha' => $fecha,'year'=>$year,'qr'=>$doc->id_unidad.'_'.$doc->correlativo.'.png');

        	$pdfnotic=\PDF::loadView('jmmkpdf.notainterna',compact('datos','doc','de','resume','vobo'))->setPaper('letter', 'portrait');
			
			$pdfnotic->save(public_path('pdf/'.$doc->pdf));

            //$pdfnotic->download($namepdf);
            //return view('jmmkpdf.notainterna',compact('datos','doc','de','resume'));
            return redirect(route('vistaprevia',$idTIC));

        }
        else
            return redirect('/');
    	    
    }
}
