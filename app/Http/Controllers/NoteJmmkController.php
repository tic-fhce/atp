<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App;

class NoteJmmkController extends Controller
{
    // modulos de Inicio y Cierre de Seccion############################################################################################################################################################################

	public function frontLogin(){
		return view('login');
	}// funcion que muestra el inicio de secion 

    public function login(Request $request){

    	$admin="";
        $pass= hash('ripemd160',$request->pass);
        $admin = DB::table('view_datos_usuario')
        ->where('usser', $request->user)->where('passw',$pass)->first();

        if($admin==""){
        	session_start();	
        	session_destroy();
            return back()->with('mensaje_error','Error usuario no identificado');
        }
        else
        {
        	session_start();
        	$_SESSION['usuario']=$admin;
            $usuario= App\Usuario::findOrFail($admin->idUsuario);
            $usuario->disponible='1';
            $usuario->estado='1';
            $usuario->save();

            
            $ingreso= new App\Ingreso;
            $ingreso->id_usuario=$admin->idUsuario;
            $ingreso->dia=date("D");
            $ingreso->save();


            return redirect('a69169866ef77e7bb580947a8719892ac8d64efdeiris');// redirecciona a secion
        }

    }// funcion que permite verificar el inicioo de secion 

    // funcion para iniciar secion 
    public function a69169866ef77e7bb580947a8719892ac8d64efdeiris(){
    	session_start();
    	if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $aten=App\Usuario::findOrFail($datos->idUsuario);
            $equipo= App\Equipo::all();
            $equipos=$equipo;
            $cantidad=DB::table('view_cantidad_deribados')->first();
        	return view('admin.escritorio',compact('datos','aten','equipo','equipos','cantidad'));
        }
    	else
        	return redirect('/');
    }// funcion que permite verificar y aceder al panel de inicio

    //funcion para cerar sesion
    public function a69169iris866ef77e7bb580947a8719892ac8d64efdeiris(){
    	session_start();
        $datos=$_SESSION['usuario'];
        $usuario= App\Usuario::findOrFail($datos->idUsuario);
        $usuario->disponible='0';
        $usuario->estado='0';
        $usuario->save();
    	session_destroy();
        return redirect('/');
    }// funcion que cierra el inicio de secion 
    
    //MODULO DE EQUIPOS#######################################################################################################################################################################################################################

    public function listarequipos(){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $equipo=App\Equipo::all();
            $equipos=$equipo;

            $aten=App\Usuario::findOrFail($datos->idUsuario);
            $cantidad=DB::table('view_cantidad_deribados')->first();
            return view('listasjmmk.lista_equipo',compact('datos','equipo','aten','equipos','cantidad'));
        }
        else
            return redirect('/');
    }// FUNCION QUE PERMITE LISTAR OS EQUIPOS REGISTRADOS

    public function registro_equipo(){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $aten=App\Usuario::findOrFail($datos->idUsuario);
            $equipo= App\Equipo::all();
            $equipos=$equipo;
            $cantidad=DB::table('view_cantidad_deribados')->first();
            return view('adminjmmk.jmmk_create_equipo',compact('datos','aten','equipo','equipos','cantidad'));
        }
        else
            return redirect('/');
    }// FUNCION QUE MUSTRA EL FORMULARIO DE REGISTRO DE EQUIPOS

    
    //MODULO DE ATENCION#######################################################################################################################################################################################################################################################


    public function resepcion(){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $aten=App\Usuario::findOrFail($datos->idUsuario);
            $equipo= App\Equipo::all();
            $equipos=$equipo;
            $cantidad=DB::table('view_cantidad_deribados')->first();
            return view('adminjmmk.jmmk_resepcion',compact('datos','aten','equipo','equipos','cantidad'));
        }
        else
            return redirect('/');
    }// funcion para registrar una atencion

    public function listaAtencion(){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $aten=App\Usuario::findOrFail($datos->idUsuario);
            $equipo= App\Equipo::all();
            $equipos=$equipo;

            $ListaAtencion=DB::table('view_lista_atencion')->where('idUsuario',$datos->idUsuario)->get();
            $cantidad=DB::table('view_cantidad_deribados')->first();
            return view('listasjmmk.lista_atencion',compact('datos','ListaAtencion','aten','equipo','equipos','cantidad'));
        }
        else
            return redirect('/');
    }//funcion para listar los casos atendidos

    public function profileaten($idpersona,$idequipo){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $aten=App\Usuario::findOrFail($datos->idUsuario);

            $equipo= App\Equipo::all();
            $equipos=$equipo;

            $persona=App\Persona::findOrFail($idpersona);
            $cliente=App\Cliente::where('id_persona',$idpersona)->first();
            $dialogo=App\Dialogo::where('id_cliente',$cliente->id)->first();
            $informe=App\Informe::where('id_cliente',$cliente->id)->first();
            $historia=App\Persona::where('celular',$persona->celular)->get();
            
            //$derivar=DB::table('deribars')->where('id_cliente',$cliente->id)->first();
            $derivar=App\Deribar::where('id_cliente',$cliente->id)->first();

            $enatencion="";
            $enatencion=DB::table('view_atendido_deribado')->where('derivado',$derivar->id)->first(); 
            
            $d=App\Deribar::findOrFail($derivar->id);

            if($idequipo==2)
                $vista='adminjmmk.jmmk_profileaten';
            if($idequipo==4 or $idequipo==3)
                $vista='admin.profile_revisor';
            if($idequipo==5)
                $vista='admin.profile_apoyo';
            if($idequipo==6)
                $vista='admin.profile_informacion';

            $cantidad=DB::table('view_cantidad_deribados')->first();

            return view($vista,compact('datos','persona','cliente','dialogo','equipo','aten','derivar','d','equipos','informe','historia','enatencion','cantidad'));
        }
        else
            return redirect('/');
    }


    

   



//#####################################################################################################################################################################################################################################################################################################################################################################################################PREDEFINIDOS PARA LOS DPCUMENTOS


    //###################### FUNCIOONES FIND
    public function findUsuario(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $TipoDocumento=DB::table('view_correlativos')->where('id',$datos->idusuario)->get(); 

            $usuarios="";
            $usuarios=DB::table('view_datos_usuario')->where('estado','1')->where('ci',$request->ci)->get();
            if($usuarios=="")
                return back()->with('mensaje_error','El numero de Cedula de Identidad que busca No existe');
            else    
                return view('listasjmmk.lista_usuarios',compact('datos','TipoDocumento','usuarios'));
        }
        else
            return redirect('/');
    }

    //funcion para buscar documentos
    public function findDoc(Request $request, $id,$idunidad,$idcorrealtivo,$correlativo,$idtipodocumento){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $TipoDocumento=DB::table('view_correlativos')->where('id',$datos->idusuario)->get();

            $redac=array('id'=>$id,'idunidad'=>$idunidad,'idcorrealtivo'=>$idcorrealtivo,'correlativo'=>$correlativo,'idtipodocumento'=>$idtipodocumento);

            $doc="";

            if($request->atrib==1)
                $doc=App\Documento::where("id_tipo_documento","=",$idtipodocumento)->where("id_unidad","=",$idunidad)->where("fecha","=",$request->atrib2)->orderBy("id","DESC")->get();

            if($request->atrib==2)
                $doc=App\Documento::where("id_tipo_documento","=",$idtipodocumento)->where("id_unidad","=",$idunidad)->where("A","ilike","%".$request->atrib2."%")->orderBy("id","DESC")->get();

            if($request->atrib==3)
                $doc=App\Documento::where("id_tipo_documento","=",$idtipodocumento)->where("id_unidad","=",$idunidad)->where("ref","ilike","%".$request->atrib2."%")->orderBy("id","DESC")->get();


            if($doc=="")
                return back()->with('mensaje_error','El Documento que Busca no Existe');
            else    
                return view('listasjmmk.lista_documentos',compact('datos','TipoDocumento','redac','doc'));
        }
        else
            return redirect('/');
    }

    
    //MODULO USUARIO############################################################################################################################################################################################################################################################################################################################


    public function profileusuarios($ci){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            
            $persona= App\Persona::where('id',$ci)->first();

            $usuario=App\Usuario::where('id_persona',$persona->id)->first();
            
            $equipo=App\Equipo::where('id',$usuario->id_equipo)->first();
            $equipos=App\Equipo::all();

            $aten=App\Usuario::findOrFail($datos->idUsuario);

            $cantidad=DB::table('view_cantidad_deribados')->first();

            return view('adminjmmk.jmmk_profile',compact('datos','persona','usuario','equipo','aten','equipos','cantidad'));
        }
        else
            return redirect('/');
    }// funcion que muestra el Profile del Usuario

    public function profileequipo($ci){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            
            $persona= App\Persona::where('id',$ci)->first();

            $usuario=App\Usuario::where('id_persona',$persona->id)->first();
            
            $equipo=App\Equipo::where('id',$usuario->id_equipo)->first();
            $equipos=App\Equipo::all();

            $aten=App\Usuario::findOrFail($datos->idUsuario);

            $registro=DB::table('view_derivados_atendidos')->where('idusuario',$usuario->id)->get();
            $cantidad=DB::table('view_cantidad_deribados')->first();

            return view('admin.profile_equipo',compact('datos','persona','usuario','equipo','aten','equipos','registro','cantidad'));
        }
        else
            return redirect('/');
    }// funcion que muestra el Profile del Usuario


    public function registro_usuario(){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];        
            $equipo= App\Equipo::all();
            $equipos=$equipo;
            $aten=App\Usuario::findOrFail($datos->idUsuario);
            $cantidad=DB::table('view_cantidad_deribados')->first();
            return view('adminjmmk.jmmk_create_usuario',compact('datos','equipo','aten','equipos','cantidad'));
        }
        else
            return redirect('/');
    }//funcion que permite mostrar el formulario de registro de Usuarios

    

    public function usuariosactivos(){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $equipo= App\Equipo::all();
            $equipos=$equipo;
            $usuarios=DB::table('view_datos_usuario')->where('estado','1')->orderBy('idequipo','asc')->get(); 
            $aten=App\Usuario::findOrFail($datos->idUsuario);
            $cantidad=DB::table('view_cantidad_deribados')->first();
            return view('listasjmmk.lista_activos',compact('datos','usuarios','aten','equipos','equipos','cantidad'));
        }
        else
            return redirect('/');
    }// funcion que permite listar usuarios activos

    

    public function listausuarios($id_equipo){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $equipo= App\Equipo::all();
            $equipos=$equipo;
            $usuarios=DB::table('view_datos_usuario')->where('idequipo',$id_equipo)->get(); 
            $aten=App\Usuario::findOrFail($datos->idUsuario);          
            $cantidad=DB::table('view_cantidad_deribados')->first();
            return view('listas.usuarios',compact('datos','usuarios','aten','equipo','equipos','cantidad'));
        }
        else
            return redirect('/');
    }// funcion que permite listar usuarios

    public function listaequipo($id_equipo){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $equipo= App\Equipo::all();
            $equipos=$equipo;
            $usuarios=DB::table('view_datos_usuario')->where('idequipo',$id_equipo)->get(); 
            $aten=App\Usuario::findOrFail($datos->idUsuario);
            $cantidad=DB::table('view_cantidad_deribados')->first();
            return view('listas.equipo',compact('datos','usuarios','aten','equipo','equipos','cantidad'));
        }
        else
            return redirect('/');
    }// funcion que permite listar usuarios

    // MODULO DE CASOS DERIVADOS ###############################################################################################################################################################################################################################################################

    
    


    public function profileatenderivadolista($idTIC){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $aten=App\Usuario::findOrFail($datos->idUsuario);

            $equipo= App\Equipo::all();
            $equipos=$equipo;


            $cliente=DB::table('view_prifile_atencion')->where('id_persona',$idTIC)->first();
            $dialogo=DB::table('dialogos')->where('id_cliente',$cliente->id)->first();

            $derivar=DB::table('deribars')->where('id_cliente',$cliente->id)->first();

            $d=App\Deribar::findOrFail($derivar->id);
            $d->id_atendera=$datos->idUsuario;
            $d->save();

            $informe=DB::table('informes')->where('id_cliente',$cliente->id)->first();
            $cantidad=DB::table('view_cantidad_deribados')->first();

            return view('adminjmmk.jmmk_profileaten',compact('datos','cliente','dialogo','equipo','aten','derivar','d','equipos','informe','cantidad'));
        }
        else
            return redirect('/');
    }//funcion que muestra el profile de casos atendidos con derivacion  


    

    
    

    
    ############################################
    // MODULO INFORMACION

    public function profileinformacion($idinformacion){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];
            $aten=App\Usuario::findOrFail($datos->idUsuario);

            $equipo= App\Equipo::all();
            $equipos=$equipo;

            $cliente=DB::table('view_prifile_atencion')->where('id_persona',$idinformacion)->first();
            $dialogo=App\Dialogo::where('id_cliente',$cliente->id)->first();
            //$dialogo=DB::table('dialogos')->where('id_cliente',$cliente->id)->first();
            $informe=DB::table('informes')->where('id_cliente',$cliente->id)->first();

            $historia=DB::table('personas')->where('celular',$cliente->celular)->get();

            $derivar=DB::table('deribars')->where('id_cliente',$cliente->id)->first();
            $d=App\Deribar::findOrFail($derivar->id);

            $cantidad=DB::table('view_cantidad_deribados')->first();
            
            return view('adminjmmk.profile_informacion',compact('datos','cliente','dialogo','equipo','aten','derivar','d','equipos','informe','historia','cantidad'));
        }
        else
            return redirect('/');
    }


}
