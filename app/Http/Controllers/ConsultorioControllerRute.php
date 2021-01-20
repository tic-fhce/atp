<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App;

class ConsultorioControllerRute extends Controller
{
    //
    #############################################
    // MODULO CONSULTORIO 
    public function listaderivadosenespera(){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $aten=App\Usuario::findOrFail($datos->idUsuario);
            $equipo= App\Equipo::all();
            $equipos=$equipo;

            $listaderivadaenespera=DB::table('view_derivados_en_espera')->where('id_equipo',$datos->idequipo)->get();
            $cantidad=DB::table('view_cantidad_deribados')->first();

            return view('listas.derivadoenespera',compact('datos','listaderivadaenespera','aten','equipo','equipos','cantidad'));
        }
        else
            return redirect('/');
    }//funcion que permite listar los casos derivados no atendidos 


    public function profileconsultorio($idprofile){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            
            $aten=App\Usuario::findOrFail($datos->idUsuario);
            $aten->disponible='0';
            $aten->save();
            
            $equipo= App\Equipo::all();
            $equipos=$equipo;

            $persona=App\Persona::findOrFail($idprofile);

            $cliente=App\Cliente::where('id_persona',$persona->id)->first();
            $dialogo=App\Dialogo::where('id_cliente',$cliente->id)->first();
            $derivar=App\Deribar::where('id_cliente',$cliente->id)->first();

            $d=App\Deribar::findOrFail($derivar->id);
            $d->id_atendera=$datos->idUsuario;
            $d->atendido="1";
            $d->save();

            $historia=App\Persona::where('celular',$persona->celular)->get();

            $progreso=App\Progreso::where('idcliente',$cliente->id)->get();

            if($cliente->id_comunicacion==0)
            {
                $c=App\Cliente::findOrFail($cliente->id);
                $c->id_comunicacion=1;
                $c->save();
                $comunication=App\Comunicacion::findOrFail(1);
            }
            else 
                $comunication=App\Comunicacion::findOrFail($cliente->id_comunicacion);

            $estado=App\Estado::where('idpersona',$persona->id)->get();

            $cantidad=DB::table('view_cantidad_deribados')->first();

            return view('admin.profile_consultorio',compact('datos','cliente','persona','dialogo','equipo','derivar','d','equipos','comunication','historia','progreso','estado','aten','cantidad'));
        }
        else
            return redirect('/');
    }//funcion que muestra el profile de casos atendidos con derivacion

    public function profileconsultorioAdmin($idprofile){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            
            $aten=App\Usuario::findOrFail($datos->idUsuario);
            
            $equipo= App\Equipo::all();
            $equipos=$equipo;

            $persona=App\Persona::findOrFail($idprofile);

            $cliente=App\Cliente::where('id_persona',$persona->id)->first();
            $dialogo=App\Dialogo::where('id_cliente',$cliente->id)->first();
            $derivar=App\Deribar::where('id_cliente',$cliente->id)->first();

            $d=App\Deribar::findOrFail($derivar->id);

            $historia=App\Persona::where('celular',$persona->celular)->get();

            $progreso=App\Progreso::where('idcliente',$cliente->id)->get();

            if($cliente->id_comunicacion==0)
            {
                $c=App\Cliente::findOrFail($cliente->id);
                $c->id_comunicacion=1;
                $c->save();
                $comunication=App\Comunicacion::findOrFail(1);
            }
            else 
                $comunication=App\Comunicacion::findOrFail($cliente->id_comunicacion);

            $estado=App\Estado::where('idpersona',$persona->id)->get();
            $cantidad=DB::table('view_cantidad_deribados')->first();

            return view('admin.profile_consultorio_admin',compact('datos','cliente','persona','dialogo','equipo','derivar','d','equipos','comunication','historia','progreso','estado','aten','cantidad'));
        }
        else
            return redirect('/');
    }//funcion que muestra el profile de casos atendidos con derivacion


    public function listaDerivadosAtendidos(){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $aten=App\Usuario::findOrFail($datos->idUsuario);
            if($aten->disponible==0){
                $aten->disponible=1;
                $aten->save();
            }
            $equipo= App\Equipo::all();
            $equipos=$equipo;
            if($datos->idequipo==3){
                $derivadosatendidos=DB::table('view_derivados_atendidos')->where('idusuario',$datos->idUsuario)->get();
                $vista='listas.derivadoatendido';
            }
            else {
                $derivadosatendidos=DB::table('view_derivados_atendidos_otros')->where('idusuario',$datos->idUsuario)->get();
                $vista='listas.derivadoatendidootros';
            }
            $cantidad=DB::table('view_cantidad_deribados')->first();

            return view($vista,compact('datos','derivadosatendidos','aten','equipo','equipos','cantidad'));
        }
        else
            return redirect('/');
    }//funcion que permite listar los casos derivados atendidos

    ####################################################
    //MODULO REVISOR 

    public function profileOter($idprofile){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            
            $aten=App\Usuario::findOrFail($datos->idUsuario);
            $aten->disponible='0';
            $aten->save();
            
            $equipo= App\Equipo::all();
            $equipos=$equipo;

            $persona=App\Persona::findOrFail($idprofile);

            $cliente=App\Cliente::where('id_persona',$persona->id)->first();
            $dialogo=App\Dialogo::where('id_cliente',$cliente->id)->first();
            $derivar=App\Deribar::where('id_cliente',$cliente->id)->first();
            $informe=App\Informe::where('id_cliente',$cliente->id)->first();

            $d=App\Deribar::findOrFail($derivar->id);
            $d->id_atendera=$datos->idUsuario;
            $d->atendido="1";
            $d->save();

            $historia=App\Persona::where('celular',$persona->celular)->get();
            $enatencion="";
            $enatencion=DB::table('view_atendido_deribado')->where('derivado',$derivar->id)->first(); 
            $cantidad=DB::table('view_cantidad_deribados')->first();

            return view('admin.profile_revisor',compact('datos','cliente','persona','dialogo','equipo','informe','derivar','d','equipos','comunication','historia','aten','enatencion','cantidad'));
        }
        else
            return redirect('/');
    }//funcion que muestra el profile de casos atendidos con derivacion

     

}
