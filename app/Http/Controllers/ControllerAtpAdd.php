<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App;

class ControllerAtpAdd extends Controller
{
    ################################################
    // MODULO CONSULTORIO
    public function Addprogreso(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];

            $progreso=new App\Progreso;
            $progreso->idcliente=$request->idclinte;
            $progreso->obs=$request->obs;
            $progreso->obs1="";
            $progreso->obs2="";
            $progreso->save();

            return redirect(route('profileconsultorio',$request->idprofile));
        }
        else
            return redirect('/');
    }

    public function AddEstado(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];

            $cliente=App\Cliente::findOrFail($request->idcliente);
            $cliente->id_comunicacion=$request->tipo;
            $cliente->save();

            $estado=new App\Estado;
            $estado->idpersona=$request->idpersona;
            $estado->idcliente=$request->idcliente;
            $estado->idusuario=$request->idusuario;
            $estado->estado=$request->tipo;
            $estado->obs=$request->obs;
            $estado->save();

            return redirect(route('profileconsultorio',$request->idpersona));
        }
        else
            return redirect('/');
    }

    ################################################
    // MODULO VIDEO
    public function addVideo(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];

            $libro=new App\Libro;
            $libro->titulo=$request->titulo;
            $libro->pdf=$request->url;
            $libro->pagina=0;
            $libro->year='0';
            $libro->save();

            return redirect(route('a69169866ef77e7bb580947a8719892ac8d64efdeiris'));
        }
        else
            return redirect('/');
    }
}
