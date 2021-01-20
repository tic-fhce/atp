<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App;

class ControllerAtpRoute extends Controller
{
    //MODULO VIDEO
    public function registro_video(){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $aten=App\Usuario::findOrFail($datos->idUsuario);
            $equipo= App\Equipo::all();
            $equipos=$equipo;
            $cantidad=DB::table('view_cantidad_deribados')->first();
            return view('admin.formulario_videos',compact('datos','aten','equipo','equipos','cantidad'));
        }
        else
            return redirect('/');
    }// FUNCION QUE MUSTRA EL FORMULARIO DE REGISTRO DE EQUIPOS

    public function listaVideo(){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $aten=App\Usuario::findOrFail($datos->idUsuario);
            $equipo= App\Equipo::all();
            $equipos=$equipo;

            $libro=App\Libro::where('pagina',0)->get();
            $cantidad=DB::table('view_cantidad_deribados')->first();
            return view('listas.lista_video',compact('datos','aten','equipo','equipos','libro','cantidad'));
        }
        else
            return redirect('/');
    }//funcion para listar los casos atendidos

    //MODULO LIBRO
    public function listaLibro(){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $aten=App\Usuario::findOrFail($datos->idUsuario);
            $equipo= App\Equipo::all();
            $equipos=$equipo;

            $libro=App\Libro::where('pagina','!=',0)->get();
            $cantidad=DB::table('view_cantidad_deribados')->first();
            return view('listas.lista_libro',compact('datos','aten','equipo','equipos','libro','cantidad'));
        }
        else
            return redirect('/');
    }//funcion para listar los casos atendidos

#############################################################################################
    //MODULO USUARIOS

    public function usuarios(){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $equipos= App\Equipo::all();
            $usuarios=DB::table('view_datos_usuario')->get(); 

            $aten=App\Usuario::findOrFail($datos->idUsuario);
            $cantidad=DB::table('view_cantidad_deribados')->first();          
            return view('listas.usuarios',compact('datos','usuarios','aten','equipos','cantidad'));
        }
        else
            return redirect('/');
    }// funcion que permite listar usuarios

    public function quitarusuarios($id_usuario){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $equipos= App\Equipo::all();

            $usuario=App\Usuario::findOrFail($id_usuario);
            $usuario->disponible='0';
            $usuario->estado='0';
            $usuario->save();         
            return redirect('usuarios');
        }
        else
            return redirect('/');
    }// funcion que permite cerrar secion de los usuarios

    public function serrarsecionusuarios($id_equipo){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $equipos= App\Equipo::all();

            $usuario=App\Usuario::where('id_equipo',$id_equipo)->get();
            $date=date('H');

            foreach ($usuario as $value) {
                $h=substr($value->updated_at,11,2);
                if($h<$date)
                {
                    $value->disponible='0';
                    $value->estado='0';
                    $value->save();        
                }
            }
            
            return redirect('usuarios');
        }
        else
            return redirect('/');
    }// funcion que permite cerrar secion de los usuarios


######################################################################
}
