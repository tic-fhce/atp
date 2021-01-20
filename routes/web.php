<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','NoteJmmkController@frontLogin' )->name('frontLogin');

// Route para ingresar 
Route::get('a69169866ef77e7bb580947a8719892ac8d64efdeiris','NoteJmmkController@a69169866ef77e7bb580947a8719892ac8d64efdeiris')->name('a69169866ef77e7bb580947a8719892ac8d64efdeiris');

// route para salir de Sesion 
Route::get('a69169iris866ef77e7bb580947a8719892ac8d64efdeiris','NoteJmmkController@a69169iris866ef77e7bb580947a8719892ac8d64efdeiris')->name('a69169iris866ef77e7bb580947a8719892ac8d64efdeiris');

#########################################################
// MODULO USUARIO 
Route::put('UpdateProfile/{id_persona}','UpdateController@UpdateProfile')->name('UpdateProfile');


Route::get('listaAtencion','NoteJmmkController@listaAtencion')->name('listaAtencion');



//get para verprofile de usuarios
Route::get('profileusuarios/{ci}','NoteJmmkController@profileusuarios')->name('profileusuarios');
Route::get('profileequipo/{ci}','NoteJmmkController@profileequipo')->name('profileequipo');


//######################################### modulo de respsion
// get para resepcion 
Route::get('resepcion','NoteJmmkController@resepcion')->name('resepcion');

//post para resepcion 
Route::post('addResepcion','AddJmmkController@addResepcion')->name('addResepcion');

Route::put('UpdateResepcion/{id}','AddJmmkController@UpdateResepcion')->name('UpdateResepcion');
Route::post('UpdateResepcionpdf/{id}','AddJmmkController@UpdateResepcionpdf')->name('UpdateResepcionpdf');


// modulo bandeja de entrada ###########################################################################


// modulo prifile de documento



//#############################################
//######## POST ###############################
//POST PAR EL LOGIN 
Route::post('login','NoteJmmkController@login')->name('login');



Route::post('addAtencion','AddJmmkController@addAtencion')->name('addAtencion');

Route::post('addDecano','AddJmmkController@addDecano')->name('addDecano');

Route::put('UpdateUsuario/{id}/{id_personal}/{id_usuario}','AddJmmkController@UpdateUsuario')->name('UpdateUsuario');

Route::put('UpdateNota/{idTIC}','AddJmmkController@UpdateNota')->name('UpdateNota');




//######################### para buscar 
Route::post('findUsuario','NoteJmmkController@findUsuario')->name('findUsuario');
Route::post('findDoc/{id}/{idunidad}/{idcorrealtivo}/{correlativo}/{idtipodocumento}','NoteJmmkController@findDoc')->name('findDoc');




//#########################################################################################################################################################################################################################################################################################################################################################################################################################################################################################################################################PDF
Route::post('notaInterna/{id}/{idunidad}/{idcorrealtivo}/{correlativo}/{idtipodocumento}/{cad}','AddJmmkController@notaInterna')->name('notaInterna');

Route::get('notaInternaPDF/{idTIC}','PDFJmmkController@notaInternaPDF')->name('notaInternaPDF');


########################################################################################################################################################################################################################################################### nuevas rutas

//MODULO ATENCION 
Route::get('profileaten/{idpersona}/{idequipo}','NoteJmmkController@profileaten')->name('profileaten');

Route::put('UpdateCliente','UpdateController@UpdateCliente')->name('UpdateCliente');// permite actualiozar los datos del Cliente 
Route::put('UpdateClientemore','UpdateController@UpdateClientemore')->name('UpdateClientemore');// permite actualizar mas datos del Cliente

Route::put('updateinforme','AddJmmkController@updateinforme')->name('updateinforme');//
Route::put('updatedialogo/{iddialogo}','UpdateController@updatedialogo')->name('updatedialogo');//
Route::put('UpdateDeribar','UpdateController@UpdateDeribar')->name('UpdateDeribar');//

Route::put('UpdateAtencion','UpdateController@UpdateAtencion')->name('UpdateAtencion');// permite actualiozar los datos del Cliente 



//######################### nuevos post
Route::post('historiaaten','AddJmmkController@historiaaten')->name('historiaaten');


//######################## MOdulo Equipo

Route::post('addEquipo','AddJmmkController@addEquipo')->name('addEquipo');
Route::get('registro_equipo','NoteJmmkController@registro_equipo')->name('registro_equipo');
Route::get('listarequipos','NoteJmmkController@listarequipos')->name('listarequipos');



// MODULO USUARIOS

Route::get('registro_usuario','NoteJmmkController@registro_usuario')->name('registro_usuario'); // muestra formulario de registro de usuariops
Route::post('addUsuario','AddJmmkController@addUsuario')->name('addUsuario'); // agrega usuarios
Route::get('usuarios','ControllerAtpRoute@usuarios')->name('usuarios'); // lista usuarios
Route::get('usuariosactivos','NoteJmmkController@usuariosactivos')->name('usuariosactivos'); // lista usuarios
Route::get('listausuarios/{id_equipo}','NoteJmmkController@listausuarios')->name('listausuarios'); // lista usuarios
Route::put('UpdatePasswordA/{id_usuario}','AddJmmkController@UpdatePasswordA')->name('UpdatePasswordA');//actualiza el pasword
Route::get('quitarusuarios/{id_usuario}','ControllerAtpRoute@quitarusuarios')->name('quitarusuarios'); // ruta que permite cerrar sesion de los usuarios por su ID
Route::get('serrarsecionusuarios/{id_equipo}','ControllerAtpRoute@serrarsecionusuarios')->name('serrarsecionusuarios'); // ruta que permite serrar la sesion de los usuarios por el ID de Equipo


// MODULO EQUIPO
Route::get('listaequipo/{id_equipo}','NoteJmmkController@listaequipo')->name('listaequipo'); // lista usuarios




//MODULO DE CASOS DERIVADOS###############################################
Route::get('profileatenderivado/{idTIC}','NoteJmmkController@profileatenderivado')->name('profileatenderivado');

Route::get('profileatenderivadolista/{idTIC}','NoteJmmkController@profileatenderivadolista')->name('profileatenderivadolista');




Route::get('listaLibro','ControllerAtpRoute@listaLibro')->name('listaLibro');

###################################################
//MODULO CONSULTORIO 
Route::get('profileconsultorio/{idprofile}','ConsultorioControllerRute@profileconsultorio')->name('profileconsultorio');//ruta que muestra el profile del paciente
Route::get('profileconsultorioAdmin/{idprofile}','ConsultorioControllerRute@profileconsultorioAdmin')->name('profileconsultorioAdmin');

Route::post('Addprogreso','ControllerAtpAdd@Addprogreso')->name('Addprogreso');//ruta que permite registrar progreso
Route::post('AddEstado','ControllerAtpAdd@AddEstado')->name('AddEstado');
Route::get('listaderivadosenespera','ConsultorioControllerRute@listaderivadosenespera')->name('listaderivadosenespera'); //ruta que lista los casos derivados en espera 
Route::get('listaDerivadosAtendidos','ConsultorioControllerRute@listaDerivadosAtendidos')->name('listaDerivadosAtendidos');




##################################
//MODULO INFORMACION
Route::get('profileinformacion/{idprofileinformacion}','NoteJmmkController@profileinformacion')->name('profileinformacion');


##################################
//MODULO REVISOR
Route::get('profileOter/{idprofile}','ConsultorioControllerRute@profileOter')->name('profileOter');
Route::post('UpdateDeribarR','UpdateController@UpdateDeribarR')->name('UpdateDeribarR');//


###################################
//MODUO VIDEO
Route::get('registro_video','ControllerAtpRoute@registro_video')->name('registro_video');
Route::post('addVideo','ControllerAtpAdd@addVideo')->name('addVideo');
Route::get('listaVideo','ControllerAtpRoute@listaVideo')->name('listaVideo');

