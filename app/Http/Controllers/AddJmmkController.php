<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App;

class AddJmmkController extends Controller
{
    //funcion para agregar un Equipo
    public function addEquipo(Request $request){
    	session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];

            $equipo=new App\Equipo;
            $equipo->equipo=$request->equipo;
            $equipo->save();

            return redirect('listarequipos');
        }
        else
            return redirect('/');
    }
    ###########################################################
    //MODULO USUARIO

    //funcion para registrar persona, personal y Usuario  
    public function addUsuario(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];

            $persona=new App\Persona;
            $persona->ci=$request->ci;
            $persona->nombre=$request->nombre;
            $persona->ap_paterno=$request->ap_paterno;
            $persona->ap_materno=$request->ap_materno;
            $persona->correo=$request->correo;
            $persona->celular=$request->celular;
            $persona->sexo=$request->sexo;
            $persona->save();

            $persona=App\Persona::all();
            $idPersona=$persona->last();

            $usuario=new App\Usuario;
            $usuario->usser=$request->correo;
            $usuario->passw=hash('ripemd160',$request->celular);
            $usuario->id_persona=$idPersona->id;
            $usuario->pernicion=$request->equipo;
            $usuario->estado='0';
            $usuario->disponible='0';
            $usuario->numero=$request->numero;
            $usuario->id_equipo=$request->equipo;
            $usuario->save();

            return redirect('usuarios');
        }
        else
            return redirect('/');
    }

    



    public function UpdatePasswordA(Request $request,$id_usuario){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];

            $usuario= App\Usuario::findOrFail($id_usuario);
            $usuario->passw=hash('ripemd160',$request->pass);
            $usuario->save();

            return back()->with('mensaje','Contraseña Actualizada Correctamente');
        }
        else
            return redirect('/');
    }//funcion para Actualizar paswword por Admin  


#################################################################
    //MODULO DE ATENCION 
    public function addAtencion(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];

            $usuario= App\Usuario::findOrFail($datos->idUsuario);
            $usuario->disponible='0';
            $usuario->save();

            $equipo=$request->idequipo;

            $persona=new App\Persona;
            $persona->ci="Ninguno";
            $persona->nombre="Ninguno";
            $persona->ap_paterno="Ninguno";
            $persona->ap_materno="Ninguno";
            $persona->correo='Ninguno';
            $persona->celular=str_replace(" ","", $request->celular);
            $persona->sexo=$request->sexo;
            $persona->save();

            $persona=App\Persona::all();
            $idPersona=$persona->last();

            $cliente= new App\Cliente;
            $cliente->id_equipo=$datos->idequipo;
            $cliente->id_usuario=$datos->idUsuario;
            $cliente->id_persona=$idPersona->id;
            $cliente->id_comunicacion=0;
            $cliente->edad="0";
            $cliente->estadocivil="Ninguno";
            $cliente->nacionalidad="Ninguno";
            $cliente->religion="Ninguno";
            $cliente->carrera="Ninguno";
            $cliente->grado="Ninguno";
            $cliente->nucleofamiliar="Ninguno";
            $cliente->significativafamiliar="Ninguno";
            $cliente->extrafomiliar="Ninguno";
            $cliente->predida="Ninguno";
            $cliente->miedo="Ninguno";
            $cliente->percepcion="Ninguno0";
            $cliente->motivo="Ninguno";
            $cliente->enfermedad="Ninguno";
            $cliente->save();

            $cliente=App\Cliente::all();
            $idcliente=$cliente->last();

            $dialogo=new App\Dialogo;
            $dialogo->id_cliente=$idcliente->id;
            $dialogo->dialogo="Sin Dialogo de Atencion";
            $dialogo->estado="1";
            $dialogo->save();

            $derivado=new App\Deribar;
            $derivado->id_equipo=0;
            $derivado->id_cliente=$idcliente->id;
            $derivado->id_persona=$idPersona->id;
            $derivado->id_atendio=$datos->idUsuario;
            $derivado->id_atendera=0;
            $derivado->obs="Observaciones para la trasferencia del caso";
            $derivado->atendido="0";
            $derivado->save();


            $informe=new App\Informe;
            $informe->id_cliente=$idcliente->id;
            $informe->perfil="Ninguno";
            $informe->evaluacion="Ninguno";
            $informe->tipo="1";
            $informe->save();

            $direcciones = array('idpersona' =>$idPersona->id,'idequipo'=>$equipo);

            return redirect(route('profileaten',$direcciones));
            
            //return redirect('listaAtencion');
        }
        else
            return redirect('/');
    }//funcion que permite registrar una atencion

    public function updateinforme(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];

            $informe=App\Informe::findOrFail($request->id_informe);
            $informe->perfil=$request->perfil;
            $informe->evaluacion=$request->evaluacion;
            $informe->save();
            return back()->with('mensaje','Informe Actualizado');
        }
        else
            return redirect('/');
    }

    

    //#################################################################################################################################################################################################################################################################################################################
  

    //funcion para registrar persona, personal y Usuario  
    public function addDecano(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];

            $decano=new App\Decano;
            $decano->id_grado_academico=$request->grado;
            $decano->tipo=$request->tipo;
            $decano->nombre=$request->nombre;
            $decano->ap_paterno=$request->ap_paterno;
            $decano->ap_materno=$request->ap_materno;
            $decano->save();

            return redirect('a69169866ef77e7bb580947a8719892ac8d64efdeiris');
        }
        else
            return redirect('/');
    }

    //funcion para crear nota Interna
    public function notaInterna(Request $request,$id,$idunidad,$idcorrealtivo,$correlativo,$idtipodocumento,$cad){

        session_start();
        if(isset($_SESSION['usuario']))
        {

            $datos=$_SESSION['usuario'];
            $correlativo= App\Correlativo::findOrFail($idcorrealtivo);
            $n=$correlativo->correlativo+1;

            $clave=md5('F'.$idunidad.'H'.$idcorrealtivo.'C'.$n.$request->fecha.'Eumsa');

            $documento=new App\Documento;
            $documento->fecha=$request->fecha;
            $documento->correlativo=$n;
            $documento->A=$request->a;
            $documento->cargo=$request->cargo;
            $documento->ref=$request->ref;
            $documento->cuerpo=$request->cuerpo;
            $documento->id_tipo_documento=$idtipodocumento;
            $documento->id_unidad=$idunidad;

            $documento->cnotic=substr($clave, 0,10);
            $documento->enotic=substr($clave, 10,10);
            $documento->cmnotic=substr($clave, 20,12);
            $documento->cad=$cad;
            $documento->pdf=$idunidad.'_'.$n.'.pdf';

            $documento->save();
            
            $correlativo->correlativo=$n;
            $correlativo->save();

            $documento=App\Documento::all();
            $idDoc=$documento->last();

            if($cad==1){
                $decano=App\Decano::all();
                $idDecano=$decano->last();
                
                $decano_doc= new App\Decano_Doc;
                $decano_doc->id_documento=$idDoc->id;
                $decano_doc->id_decano=$idDecano->id;
                $decano_doc->save();
            }

            $nameqr=$idunidad.'_'.$n.'.png';
            $de = DB::table('view_de')->where('id_unidad',$datos->id_unidad)->where('id_tipo_personal',1)->first();

            $file=public_path('qr/'.$nameqr);

            \QRCode::mecard('UMSA.FHCE.'.$de->unidad.' N° 0'.$idDoc->correlativo.'/'.substr($idDoc->fecha,0,4),$idDoc->id,$idDoc->fecha,$idDoc->cnotic)->setOutfile($file)->png();
            
            //return $pdfci->download($name);
            $idTIC=$idDoc->id;

            return redirect(route('notaInternaPDF',$idTIC));

        }
        else
            return redirect('/');
            
    }

    
    //funcion para registrar persona, personal y Usuario  
    public function UpdateUsuario(Request $request,$id,$id_personal,$id_usuario){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];

            $persona= App\Persona::findOrFail($id);
            if($datos->pernicion==0)
                $persona->ci=$request->ci;
            $persona->nombre=$request->nombre;
            $persona->ap_paterno=$request->ap_paterno;
            $persona->ap_materno=$request->ap_materno;
            $persona->correo=$request->correo;
            $persona->celular=$request->celular;
            $persona->save();

            if($datos->pernicion==0){
                $personal= App\Personal::findOrFail($id_personal);
                $personal->id_unidad=$request->unidad;
                $personal->id_tipo_personal=$request->personal;
                $personal->id_grado_academico=$request->grado;
                $personal->cargo=$request->cargo;
                $personal->save();    

                $usuario= App\Usuario::findOrFail($id_usuario);
                if($usuario->pernicion!=0)
                {
                    $usuario->pernicion=$request->personal;
                    $usuario->save();
                }
            }

            return back()->with('mensaje','Datos Actualizados Correctamente');
        }
        else
            return redirect('/');
    }

    
    

    

    //funcion para editar Notas
    public function UpdateNota(Request $request,$idTIC){

        session_start();
        if(isset($_SESSION['usuario']))
        {

            $datos=$_SESSION['usuario'];
            
            $documento= App\Documento::findOrFail($idTIC);
            $documento->fecha=$request->fecha;
            $documento->A=$request->a;
            $documento->cargo=$request->cargo;
            $documento->ref=$request->ref;
            $documento->cuerpo=$request->cuerpo;
            $documento->cad=$request->cad;

            $name=$documento->updated_at;
            $name=str_replace(':','',$name);
            $name=str_replace(' ','',$name);
            $name=str_replace('-','',$name);
            $pdfA=$documento->pdf;
            $documento->pdf=$name.$documento->id_unidad.'_'.$documento->correlativo.'.pdf';
            
            $documento->save();
            
            if($request->cad==1){
                $decano=App\Decano::all();
                $idDecano=$decano->last();
                
                $decano_doc= new App\Decano_Doc;
                $decano_doc->id_documento=$documento->id;
                $decano_doc->id_decano=$idDecano->id;
                $decano_doc->save();
            }
            
            $documento= App\Documento::findOrFail($idTIC);

            $cp=new App\Cppdf;
            $cp->id_documento=$documento->id;
            $cp->nombrepdf=$pdfA;
            $cp->fecha=$documento->updated_at;
            $cp->save();


            $nameqr=$documento->id_unidad.'_'.$documento->correlativo.'.png';
            $de = DB::table('view_de')->where('id_unidad',$datos->id_unidad)->where('id_tipo_personal',1)->first();

            $file=public_path('qr/'.$nameqr);

            
            \QRCode::mecard('UMSA.FHCE.'.$de->unidad.' N° 0'.$documento->correlativo.'/'.substr($documento->fecha,0,4),$documento->id,$documento->fecha,$documento->cnotic)->setOutfile($file)->png();
            
            //return $pdfci->download($name);
            $idTIC=$documento->id;

            return redirect(route('notaInternaPDF',$idTIC));

        }
        else
            return redirect('/');
            
    }

// modulo Recepcion #########################################################################

    //funcion para registrar documento dijital

    public function addResepcion(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {
            $datos=$_SESSION['usuario'];

            $name=$request->file('pdf')->store('public');

            $resepcion=new App\Resepcion;
            $resepcion->nhojaruta=$request->nhojaruta;
            $resepcion->fecha_documento=$request->fecha_documento;
            $resepcion->referencia=$request->referencia;
            $resepcion->numerohojas=$request->numerohojas;
            $resepcion->id_usuario=$request->id_usuario;
            $resepcion->id_unidad=$request->id_unidad;
            $resepcion->pdf=$name;
            $resepcion->save();

            //return redirect('a69169866ef77e7bb580947a8719892ac8d64efdeiris');

            return redirect('lista_resepcion');
        }
        else
            return redirect('/');
    }

    //funcion para editar Notas
    public function UpdateResepcion(Request $request,$id){

        session_start();
        if(isset($_SESSION['usuario']))
        {

            $datos=$_SESSION['usuario'];
            $resepcion= App\Resepcion::findOrFail($id);
            $resepcion->nhojaruta=$request->nhojaruta;
            $resepcion->fecha_documento=$request->fecha_documento;
            $resepcion->referencia=$request->referencia;
            $resepcion->numerohojas=$request->numerohojas;
            $resepcion->id_usuario=$request->id_usuario;
            $resepcion->id_unidad=$request->id_unidad;
            $resepcion->save();

            return redirect('lista_resepcion');

        }
        else
            return redirect('/');   
    }

    //funcion para editar Notas
    public function UpdateResepcionpdf(Request $request,$id){
        session_start();
        if(isset($_SESSION['usuario']))
        {

            $datos=$_SESSION['usuario'];
            $resepcion= App\Resepcion::findOrFail($id);

            $resp_pdf=new App\Respccionedit;

            $resp_pdf->id_resepcion=$id;
            $resp_pdf->nhojaruta=$resepcion->nhojaruta;
            $resp_pdf->pdf=$resepcion->pdf;
            $resp_pdf->save();

            $resepcion->pdf=$request->file('pdf')->store('public');
            
            $resepcion->save();

            return redirect('lista_resepcion');

        }
        else
            return redirect('/');
            
    }


    ############################################################
    

    public function historiaaten(Request $request){
        session_start();
        if(isset($_SESSION['usuario']))
        {

            $datos=$_SESSION['usuario'];

            $usuario= App\Usuario::findOrFail($datos->idUsuario);
            $usuario->disponible='1';
            $usuario->save();

            if($request->atendera>0 && $request->atendido=="0"){
                $d=App\Deribar::findOrFail($request->derivar);
                $d->atendido="1";
                $d->save();    
            }
            return redirect('listaAtencion');

        }
        else
            return redirect('/');
            
    }

    

}
