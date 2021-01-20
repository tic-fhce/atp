<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App;

class UpdateController extends Controller
{
	#####################################
	// MODULO USUARIO
    public function UpdateProfile(Request $request,$id_persona){

        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];

            $persona=App\Persona::findOrFail($id_persona);
            $persona->ci=$request->ci;
            $persona->nombre=$request->nombre;
            $persona->ap_paterno=$request->ap_paterno;
            $persona->ap_materno=$request->ap_materno;
            $persona->correo=$request->correo;
            $persona->celular=$request->celular;
            $persona->save();

            $usuario= App\Usuario::findOrFail($request->id_usuario);
            $usuario->pernicion=$request->equipo;
            $usuario->id_equipo=$request->equipo;
            $usuario->numero=$request->numero;
            $usuario->save();

            return back()->with('mensaje','Actualizacion del Usuario Correcta');
        }
        else
            return redirect('/');

    }

    #########################################
    //MODULO DE ATENCION
    public function UpdateCliente(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];

            $persona=App\Persona::findOrFail($request->id_persona);
            $persona->ci=$request->ci;
            $persona->nombre=$request->nombre;
            $persona->ap_paterno=$request->ap_paterno;
            $persona->ap_materno=$request->ap_materno;
            $persona->celular=str_replace(" ","", $request->celular);
            $persona->sexo=$request->sexo;
            $persona->save();

            $cliente=App\Cliente::findOrFail($request->id_cliente);
            $cliente->edad=$request->edad;
            $cliente->save();

            return back()->with('mensaje','Datos Actualizados');
        }
        else
            return redirect('/');
    }

    public function updatedialogo(Request $request,$iddialogo){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];

            $dialogo=App\Dialogo::findOrFail($iddialogo);
            $dialogo->dialogo=$request->dialogo;
            $dialogo->save();

            return back()->with('mensaje','Dialogo Actualizado');
        }
        else
            return redirect('/');
    }// funcion que permite guardar el dialogo de atencion 


    public function UpdateAtencion(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $dialogo=App\Dialogo::findOrFail($request->iddialogo);
            $dialogo->dialogo=$request->dialogo;
            $dialogo->save();

            return back()->with('mensaje','Datos Actualizados');
        }
        else
            return redirect('/');
    }

    public function UpdateClientemore(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];

            $cliente=App\Cliente::findOrFail($request->id_cliente);
            $cliente->estadocivil=$request->estadocivil;
            $cliente->nacionalidad=$request->nacionalidad;
            $cliente->religion=$request->religion;
            $cliente->carrera=$request->carrera;
            $cliente->grado=$request->grado;
            $cliente->nucleofamiliar=$request->nucleofamiliar;
            $cliente->significativafamiliar=$request->significativafamiliar;
            $cliente->extrafomiliar=$request->extrafomiliar;
            $cliente->predida=$request->predida;
            $cliente->miedo=$request->miedo;
            $cliente->percepcion=$request->percepcion;
            $cliente->motivo=$request->motivo;
            $cliente->enfermedad=$request->enfermedad;
            $cliente->save();

            return back()->with('mensaje','Datos Actualizados');
        }
        else
            return redirect('/');
    }

    public function UpdateDeribar(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];

            $derivado=App\Deribar::findOrFail($request->idderivar);
            $derivado->id_equipo=$request->equipo;
            $derivado->obs=$request->obs;
            $derivado->id_atendera=0;
            $derivado->atendido='0';
            $derivado->save();
            return back()->with('mensaje','Se derivo la Atencion Corectamente');
        }
        else
            return redirect('/');
    }

    public function UpdateDeribarR(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];

            $derivado=App\Deribar::findOrFail($request->idderivar);
            $derivado->id_equipo=$request->equipo;
            $derivado->obs=$request->obs;
            $derivado->id_atendera=0;
            $derivado->atendido='0';
            $derivado->save();
            $usuario=App\Usuario::findOrFail($datos->idUsuario);
            $usuario->disponible='1';
            $usuario->save();
            return redirect('a69169866ef77e7bb580947a8719892ac8d64efdeiris');
        }
        else
            return redirect('/');
    }

}
