@extends('plantilla.admin')

@section('label1')
  <div class="container clear_both padding_fix">
        <!--\\\\\\\ container  start \\\\\\-->
        <div class="page-content">
          <div class="row">

            <div class="col-md-4">
              <div class="profile_bg">
                
                <div class="user-profile-sidebar">
                  <div class="row">
                    
                    <div class="col-md-4">
                      <img src="{{asset('assets/images/avatar.png')}}" width="100px" height="100px" />
                    </div>
                    <div class="col-md-8">
                      <div class="user-identity">
                        <h4><strong>{{$persona->nombre}}</strong></h4>                        
                      </div>
                      <div class="bottom">
                          <input type="hidden" value="{{$datos->pernicion}}" id="permiso">
                          <button type="button" class="btn btn-primary" id="btn-guardar">Guardar Datos</button>
                      </div><!--/form-group-->
                    </div>

                  </div>
                </div>

                <div class="form-horizontal">
                  @if(session('mensaje'))
                    <div class="row alert alert-success" role="alert">
                      {{session('mensaje')}}
                    </div>                      
                  @endif
                  

                  <div class="row">
                    <label class="col-sm-5 control-label">C.I. :</label>
                    <label class="col-sm-7 control-label-l">{{$persona->ci}}</label>
                  </div>

                  <div class="row">
                    <label class="col-sm-5 control-label">Nombre :</label>
                    <label class="col-sm-7 control-label-l">{{$persona->nombre}}</label>
                  </div>

                  <div class="row">
                    <label class="col-sm-5 control-label">Ap. Paterno :</label>
                    <label class="col-sm-7 control-label-l">{{$persona->ap_paterno}}</label>
                  </div>

                  <div class="row">
                    <label class="col-sm-5 control-label">Ap. Materno :</label>
                    <label class="col-sm-7 control-label-l">{{$persona->ap_materno}}</label>
                  </div>

                  <div class="row">
                    <label class="col-sm-5 control-label">Sexo :</label>
                    <label class="col-sm-7 control-label-l">{{$persona->sexo}}</label>
                  </div>

                  <div class="row">
                    <label class="col-sm-5 control-label">Contactar :</label>
                    <label class="col-sm-7 control-label-l"><a href="https://api.whatsapp.com/send?phone={{$persona->celular}}&text=Usted%20se%20comunico%20con%20el%20centro%20de%20 Apoyo%20Psicológico%20de%20la%20Facultad%20de%20Humanidades%20y%20la%20Carrera%20de%20Psicología%20" class="btn btn-success" target="_blank">{{$persona->celular}}</a></label>
                  </div>

                  <div class="row">
                    <hr>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      @if($aten->disponible=='0')
                        <form action="{{route('historiaaten')}}" class="form-horizontal row-border" method="POST">
                          @csrf
                          <input type="hidden" name="atendera" value="{{$d->id_atendera}}">
                          <input type="hidden" name="atendido" value="{{$d->atendido}}">
                          <input type="hidden" name="derivar" value="{{$d->id}}">
                          <div class="bottom">
                            <button type="submit" class="btn btn-warning">Terminar Consulta</button>
                          </div><!--/form-group-->
                        </form>
                      @else
                        <a href="{{route('a69169866ef77e7bb580947a8719892ac8d64efdeiris')}}" class="btn btn-primary">Salir del Perfil</a>
                      @endif
                      <hr>
                      

                    </div>
                  </div>

                </div>
                

              </div>
            </div>
            <!--/col-md-4-->
            <div class="col-md-8">
              <div class="block-web full">

                <!-- Pestañas -->
                <ul class="nav nav-tabs nav-justified nav_bg">
                  <li class="active"><a href="#about" data-toggle="tab">Historia Atencion</a></li>
                  <li class=""><a href="#datos" data-toggle="tab">Actualizar Datos</a></li>
                  @if($datos->pernicion!=6)
                    <li class=""><a href="#user-activities" data-toggle="tab">Mas Datos</a></li>                    
                    @if($datos->pernicion!=2)
                      <li class=""><a href="#informe" data-toggle="tab">Informe</a></li> 
                    @endif
                  @endif
                  @if($datos->pernicion!=2)
                    <li class=""><a href="#edit-profile" data-toggle="tab">Derivar Caso</a></li> 
                  @endif
                  <li class=""><a href="#info" data-toggle="tab">Informaciones</a></li> 
                  
                </ul>

                <!-- Pestañas -->

                
                <!-- DATOS  E HISTORIAL-->
                <div class="tab-content">

                  <!-- DIALOGO-->
                  <div class="tab-pane active" id="about">
                    <div class="user-profile-content">
                      <div class="row">
                        <div class="col-sm-6"> 
                            <form action="{{route('UpdateAtencion')}}" class="form-horizontal row-border" method="POST" id="formDialogo">
                            @method('PUT')
                            @csrf
                            
                              <div class="form-group">
                                <div class="col-sm-12">
                                  <label class="control-label">Dialogo y Atencion</label>  
                                  <input type="hidden" name="iddialogo" value="{{$dialogo->id}}">
                                  <textarea class="form-control" name="dialogo" rows="16" required="true">{{$dialogo->dialogo}} </textarea>
                                </div>
                              </div>
                            </form>
                        </div>
                        <div class="col-sm-6">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                              <th>Numero</th>
                              <th>Nombre</th>
                              <th>Fecha</th>
                              <th>Historial</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($historia as $value)
                              <tr>
                                <td>{{$value->celular}}</td>
                                <td>{{$value->nombre}}</td>
                                <td>{{$value->created_at}}</td>
                                <td>{{$value->id}}</td>
                              </tr>
                              @endforeach
                            </tbody>

                          </table> 
                        </div>
                      </div>
                    </div>
                  </div> <!-- DIALOGO-->


                  <!-- DATOS-->
                  <div class="tab-pane" id="datos">
                    <div class="user-profile-content">
                      <div class="col-sm-12">
                          <h1>Actualizar Datos</h1>

                          <form action="{{route('UpdateCliente')}}" class="form-horizontal row-border" method="POST" id="formCliente">
                          @method('PUT')
                          @csrf
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Cedula de Identidad</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="ci" value="{{$persona->ci}}" required="true">
                              <input type="hidden" name="id_persona" value="{{$persona->id}}">
                              <input type="hidden" name="id_cliente" value="{{$cliente->id}}">
                            </div>
                          </div><!--/form-group--> 

                          <div class="form-group">
                            <label class="col-sm-4 control-label">Nombres</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="nombre" value="{{$persona->nombre}}" maxlength="20" required="true">
                            </div>
                          </div><!--/form-group--> 
                          
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Ap. Paterno </label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="ap_paterno" value="{{$persona->ap_paterno}}" maxlength="20" required="true">
                            </div>
                          </div><!--/form-group--> 
                          
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Ap. Materno</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="ap_materno" value="{{$persona->ap_materno}}" maxlength="20" required="true">
                            </div>
                          </div><!--/form-group--> 

                          <div class="form-group">
                            <label class="col-sm-4 control-label">Edad</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="edad" value="{{$cliente->edad}}" maxlength="3" required="true" maxlength="2">
                            </div>
                          </div><!--/form-group--> 

                          <div class="form-group">
                            <label class="col-sm-4 control-label">Sexo</label>
                            <div class="col-sm-8">
                              <select name="sexo" required="true">
                                <option value="{{$persona->sexo}}">{{$persona->sexo}}</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                              </select>
                            </div>
                          </div><!--/form-group--> 

                          <div class="form-group">
                            <label class="col-sm-4 control-label">Celular</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="celular" value="{{$persona->celular}}" maxlength="20" required="true">
                            </div>
                          </div><!--/form-group--> 
                        </form>
                      </div>
                    </div>
                  </div><!-- DATOS-->

                  <!-- MAS DATOS -->

                  <div class="tab-pane" id="user-activities">

                    <div class="user-profile-content">

                      <form action="{{route('UpdateClientemore')}}" class="form-horizontal row-border" method="POST" id="formClienteMore">
                          @method('PUT')
                          @csrf
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Estado Civil</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="estadocivil" value="{{$cliente->estadocivil}}" required="true" maxlength="100">
                              <input type="hidden" name="id_persona" value="{{$cliente->id_persona}}">
                              <input type="hidden" name="id_cliente" value="{{$cliente->id}}">
                            </div>
                          </div><!--/form-group--> 

                          <div class="form-group">
                            <label class="col-sm-4 control-label">Nacionalidad</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="nacionalidad" value="{{$cliente->nacionalidad}}" maxlength="50">
                            </div>
                          </div><!--/form-group--> 
                          
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Religion </label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="religion" value="{{$cliente->religion}}" maxlength="50">
                            </div>
                          </div><!--/form-group--> 
                          
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Carrera</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="carrera" value="{{$cliente->carrera}}" maxlength="100" required="true">
                            </div>
                          </div><!--/form-group-->

                          <div class="form-group">
                            <label class="col-sm-4 control-label">Grado Academico</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="grado" value="{{$cliente->grado}}" maxlength="100">
                            </div>
                          </div><!--/form-group--> 

                          <div class="form-group">
                            <label class="col-sm-4 control-label">Composición Actual del grupo Familiar </label>
                            <div class="col-sm-8">
                              <textarea class="form-control" name="nucleofamiliar" required="true">{{$cliente->nucleofamiliar}} </textarea>                    
                            </div>
                          </div><!--/form-group-->

                          <div class="form-group">
                            <label class="col-sm-4 control-label">Personas Significativas del grupo Familiar </label>
                            <div class="col-sm-8">
                              <textarea class="form-control" name="significativafamiliar" required="true">{{$cliente->significativafamiliar}} </textarea>                    
                            </div>
                          </div><!--/form-group-->

                          <div class="form-group">
                            <label class="col-sm-4 control-label">Personas Significativas del grupo extra Familiar </label>
                            <div class="col-sm-8">
                              <textarea class="form-control" name="extrafomiliar" required="true">{{$cliente->extrafomiliar}} </textarea>                    
                            </div>
                          </div><!--/form-group-->

                          <div class="form-group">
                            <label class="col-sm-4 control-label">Pérdidas Significativas  </label>
                            <div class="col-sm-8">
                              <textarea class="form-control" name="predida" required="true">{{$cliente->predida}} </textarea>                    
                            </div>
                          </div><!--/form-group-->

                          <div class="form-group">
                            <label class="col-sm-4 control-label">Miedos Significativos en la Actualidad</label>
                            <div class="col-sm-8">
                              <textarea class="form-control" name="miedo" required="true">{{$cliente->miedo}} </textarea>                    
                            </div>
                          </div><!--/form-group-->

                          <div class="form-group">
                            <label class="col-sm-4 control-label">Percepción de Sí Mismo</label>
                            <div class="col-sm-8">
                              <textarea class="form-control" name="percepcion" required="true">{{$cliente->percepcion}} </textarea>                    
                            </div>
                          </div><!--/form-group-->

                          <div class="form-group">
                            <label class="col-sm-4 control-label">Motivo de llamada</label>
                            <div class="col-sm-8">
                              <textarea class="form-control" name="motivo" required="true">{{$cliente->motivo}} </textarea>                    
                            </div>
                          </div><!--/form-group-->

                          <div class="form-group">
                            <label class="col-sm-4 control-label">Enfermedad de Base</label>
                            <div class="col-sm-8">
                              <textarea class="form-control" name="enfermedad" maxlength="100" required="true"> {{$cliente->enfermedad}}</textarea>
                            </div>
                          </div><!--/form-group--> 
                        </form>
                    </div>
                  </div>

                  <!-- INFORME-->
                  <div class="tab-pane" id="informe">
                    <div class="user-profile-content">

                      <div class="col-sm-12"> 
                            <form action="{{route('updateinforme')}}" class="form-horizontal row-border" method="POST" id="formInforme">
                            @method('PUT')
                            @csrf
                            
                              <div class="form-group">
                                <label class="col-sm-4 control-label">Perfil</label>
                                <div class="col-sm-8">
                                  <select name="perfil">
                                    <option value="{{$informe->perfil}}">{{$informe->perfil}}</option>
                                    <option value="SILENCIOSO">SILENCIOSO</option>
                                    <option value="VERBORREICO">VERBORREICO</option>
                                    <option value="DESBORDADO">DESBORDADO</option>
                                    <option value="AGRESIVO">AGRESIVO</option>
                                    <option value="DESORGANIZADO">DESORGANIZADO</option>                                    
                                  </select>
                                  <input type="hidden" name="id_informe" value="{{$informe->id}}">
                                </div>
                              </div><!--/form-group--> 

                              <div class="form-group">
                                <label class="col-sm-4 control-label">Evaluacion y Tecnica Utilizada </label>
                                <div class="col-sm-8">
                                  <textarea class="form-control" name="evaluacion" required="true">{{$informe->evaluacion}} </textarea>
                                </div>
                              </div><!--/form-group-->
                            </form>
                      </div>

                    </div>
                  </div><!-- INFORME-->


                  <!-- MAS DERIVACION -->
                  <div class="tab-pane" id="edit-profile">
                    <div class="user-profile-content">

                      <div class="row">

                        <form action="{{route('UpdateDeribar')}}" class="form-horizontal row-border" method="POST" id="formDerivar">
                        @method('PUT')
                        @csrf
                          <input type="hidden" name="idderivar" value="{{$derivar->id}}">
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Derivar a :</label>
                            <div class="col-sm-8">
                              <select name="equipo">
                                <option value="{{$derivar->id_equipo}}">Seleccionar </option>

                                @foreach ($equipo as $value)
                                  @if($datos->pernicion==3 and $value->id==2)
                                    <option value="{{$value->id}}">{{$value->equipo}}</option>
                                  @endif

                                  @if($datos->pernicion==5 and $value->id!=1 and $value->id!=5 and $value->id!=6)
                                    <option value="{{$value->id}}">{{$value->equipo}}</option>
                                  @endif
                                  @if($datos->pernicion==6 and $value->id!=1  and $value->id!=6)                                    
                                    <option value="{{$value->id}}">{{$value->equipo}}</option>
                                  @endif
                                @endforeach
                              </select>
                            </div>
                          </div><!--/form-group--> 
                          
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Observaciones</label>
                            <div class="col-sm-8">
                              <textarea class="form-control" name="obs" required="true">{{$derivar->obs}}</textarea>
                            </div>
                          </div><!--/form-group--> 
                        </form>
                        <div class="form-group">
                            <label class="col-sm-4 control-label"></label>
                            @if($derivar->id_equipo == 0 or $datos->pernicion==4)
                              <div class="col-sm-8 bottom">
                                <button type="button" class="btn btn-primary" id="btn-derivar">Derivar Consulta</button>
                              </div><!--/form-group-->
                            @endif
                          </div>
                      </div>

                      
                    </div>
                  </div>

                  <div class="tab-pane" id="info">
                    <div class="user-profile-content">

                      <div class="col-md-12">
                        <div class="block-web full">
                      
                          <ul class="nav nav-tabs nav-justified nav_bg">
                            <li class="active"><a href="#laboratorio" data-toggle="tab"><i class="fa fa-envelope"></i> Laboratorios</a></li>
                            <li class=""><a href="#hospital" data-toggle="tab"><i class="fa fa-envelope"></i> Hospitales</a></li>
                            <li class=""><a href="#clinica" data-toggle="tab"><i class="fa fa-envelope"></i> Clinicas</a></li>
                            <li class=""><a href="#oxigeno" data-toggle="tab"><i class="fa fa-envelope"></i> Oxigeno</a></li>
                            <li class=""><a href="#funeraria" data-toggle="tab"><i class="fa fa-envelope"></i> Funerarias</a></li>                        
                          </ul>

                          <div class="tab-content">


                          <div class="tab-pane animated fadeInRight active" id="laboratorio">
                            <div class="user-profile-content">
                              <table class="table table-bordered">
                                <tr>
                                  
                                  <td>INSTITUCION</td>
                                  <td>TELEFONOS</td>
                                  <td>DIRECCIÓN</td>
                                  <td>OBSERV.</td>
                                  
                                </tr>
                                <tr >                          
                                  <td>INLASA</td>
                                  <td>2-226048</td>
                                  <td>PASAJE RAFAEL ZUBIETA #1889 (LADO ESTADO MAYOR), Z/ MIRAFLORES</td>
                                  <td></td>                          
                                </tr>
                                <tr>
                                  
                                  <td>SERVITAC</td>
                                  <td>2-222022 - 2-221616</td>
                                  <td>AV. BUSCH CASI ESQUINA HAITÍ N°1126 Z/ MIRAFLORES</td>
                                  <td></td>
                                  
                                </tr>
                                <tr>
                                  
                                  <td>CAJA PETROLERA</td>
                                  <td>2-431865 - 2-431086</td>
                                  <td>AV. ARCE Nº 2525 Y PLAZA ISABEL LA CATÓLICA</td>
                                  <td></td>
                                  
                                </tr>
                                <tr>
                                  
                                  <td>EUROPA</td>
                                  <td>2-229112</td>
                                  <td>C. CARRASCO ESQUINA AVENIDA BUSCH Z/ MIRAFLORES</td>
                                  <td></td>
                                  
                                </tr>
                                <tr >
                                  
                                  <td>LAB CLINICS</td>
                                  <td>2-430846 -701-27447</td>
                                  <td>C. MANUEL CAMPOS ESQ. 6 DE AGOSTO N°334, ED. “ITURRI” MEZZANINE, Z/ SAN JORGE</td>
                                  <td></td>                          
                                </tr>
                                <tr>                          
                                  <td>PRO SALUD - VILLA FATIMA</td>
                                  <td>2-216804</td>
                                  <td>AV. LAS DELICIAS N° 13 ESQ. YANACACHI.</td>
                                  <td></td>                          
                                </tr>
                                <tr>                          
                                  <td>CLINICA SAN JUAN BAUTISTA </td>
                                  <td>2-853276</td>
                                  <td>C. RÍO ORTHON N° 100, Z/ CUPILUPACA, EL ALTO</td>
                                  <td></td>                          
                                </tr>
                                <tr>                          
                                  <td>LABORATORIO SEINLAB - CLINICA 6 DE AGOSTO</td>
                                  <td>2-430321 - 671-19554 - 732-95747 (DR. SERANTES)</td>
                                  <td>AV.6 DE AGOSTO N° 2892 Z/ SAN JORGE</td>
                                  <td>PRUEBA RÁPIDA Y DE INMUNOFLUORECENCIA <br>1.Bs. 280 <br>2. 550</td>                          
                                </tr>
                                <tr>                          
                                  <td>CLINICA MODELO</td>
                                  <td>2-228360  2-228365</td>
                                  <td>C. PANAMÁ N°1162, Z/ MIRAFLORES</span></td>
                                  <td></td>                          
                                </tr>
                                <tr>
                                  <td>MEDICENTRO</td>
                                  <td>2-441717</td>
                                  <td>AV. 6 DE AGOSTO N° 2440, Z/ SOPOCACHI</td>
                                  <td></td>                          
                                </tr>
                                <tr>
                                  
                                  <td>PHARMEDICAL</td>
                                  <td>2-787160</td>
                                  <td></td>
                                  <td></td>                          
                                </tr>
                                <tr>                          
                                  <td>LABOGEN</td>
                                  <td>762- 08329 - 2-223885</td>
                                  <td>C. DIAZ ROMERO N° 1545 ENTRE ARGENTINA Y CUBA Z/ MIRAFLORES</td>
                                  <td>PRUEBA PCR<br>Bs. 870  </td>                          
                                </tr>
                                <tr>                          
                                  <td>HOSPITAL HOBRERO</td>
                                  <td>772-48264</td>
                                  <td>C. LUCAS JAIMES N° 76</td>
                                  <td>PRUEBA PCR </td>                          
                                </tr>
                                <tr>                          
                                  <td>PLEXUS </td>
                                  <td>653-66444 - 601-44741</td>
                                  <td>C. 15, EDIFICIO PLAZA 15, PISO 2 Z/CALACOTO</td>
                                  <td>PRUEBA PCR Y RÁPIDA <br>1. Bs. 780  <br>2. Bs. 540</td>                          
                                </tr>
                                <tr>                          
                                  <td>LABORATORIO TEHCNO LAB.</td>
                                  <td>2- 227495 - 777- 93247</td>
                                  <td>AV. SIMÓN BOLÍVAR N° 1825 ED. AYAVIRI SUBSUELO OF. 9 Z/ MIRAFLORES</td>
                                  <td>PRUEBA RÁPIDA <br>Bs. 410</td>                          
                                </tr>
                                <tr>                          
                                  <td>LABORIATORIO DE ANÁLISIS CLÍNICO ALFAOMEGA </td>
                                  <td>2-773253 - 725- 04069</td>
                                  <td>AV. GARCÍA LANZA ESQ C. 9, ED DE FARMACORP, PB.- OF. 5</td>
                                  <td>PRUBA RÁPIDA Y SANGRE PROCESADA CON SUERO O PLASMA</td>                          
                                </tr>
                                
                              </table>
                            </div>
                          </div>


                          <div class="tab-pane" id="hospital">
                            <div class="user-profile-content">
                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th>INSTITUCION</th>
                                    <th>TELEFONOS</th>
                                    <th>DIRECCIÓN</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td><strong>INSTITUTO NACIONAL DEL TORAX</strong></td>
                                    <td>2-220022 2-226462 (UTI)</td>
                                    <td>C. CLAUDIO SANJINEZ N° 1633 Z/ MIRAFLORES</td>
                                  </tr>
                                  <tr>
                                    <td><strong>HOSPITAL LOS PINOS</strong></td>
                                    <td>2-771119</td>
                                    <td>C. 25 N° 591 Z/ LOS PINOS</td>
                                  </tr>
                                  <tr>
                                    <td><strong>HOSPITAL COREA</strong></td>
                                    <td>2-861413</td>
                                    <td>CAMINO A VIACHA, EL ALTO</td>
                                  </tr>
                                  <tr>
                                    <td><strong>INSTITUTO DE GASTROENTEROLOGÍA</strong></td>
                                    <td>2-246424 2-244776</td>
                                    <td>AV. SAAVEDRA, Nº 2245, Z/ MIRAFLORES</td>
                                  </tr>
                                  <tr>
                                    <td><strong>INSTITUTO DE NEFROLOGÍA</strong></td>
                                    <td>2-248788</td>
                                    <td>AV. SAAVEDRA, Nº 2245, Z/ MIRAFLORES</td>
                                  </tr>
                                  <tr>
                                    <td><strong>HOSPITAL DE VILLA DOLORES</strong></td>
                                    <td>2-820761</td>
                                    <td>AV. ARICA N° 830 ESQ. DEMETRIO MOSCOSO, Z/ VILLA DOLORES, EL ALTO</td>
                                  </tr>
                                  <tr>
                                    <td><strong>HOSPITAL LA MERCED</strong></td>
                                    <td>2-219704</td>
                                    <td>C. VILLA ASPIAZU S/N, Z/ VILLA FATIMA</td>
                                  </tr>
                                  <tr>
                                    <td><strong>HOSPITAL AGRAMONT</strong></td>
                                    <td>2-822822</td>
                                    <td>C. 11, Nº 4035, Z/ VILLA DOLORES, RIO SECO</td>
                                  </tr>
                                  <tr>
                                    <td><strong>HOSPITAL CORAZON DE JESUS</strong></td>
                                    <td>2-850137 2-850909 2-850701</td>
                                    <td>C. 5 S/N, Z/ VILLA JESUS DEL GRAN PODER, CERCA URBANIZACIÓN EL KENKO EL ALTO</td>
                                  </tr>
                                  <tr>
                                    <td><strong>HOSPITAL DE CLINICAS EMERGENCIAS</strong></td>
                                    <td>2-229180 2-246275</td>
                                    <td>AV. SAAVEDRA, Nº 2245, Z/ MIRAFLORES</td>
                                  </tr>
                                  <tr>
                                    <td><strong>HOSPITAL DE CLINICAS (NEUROLOGÍA)</strong></td>
                                    <td>2-246311</td>
                                    <td>AV. SAAVEDRA, Nº 2245, Z/ MIRAFLORES</td>
                                  </tr>
                                  <tr>
                                    <td><strong>HOSPITAL DE CLINICAS (OTORRINO)</strong></td>
                                    <td>2-246311 2-245025</td>
                                    <td>AV. SAAVEDRA, Nº 2245, Z/ MIRAFLORES</td>
                                  </tr>
                                  <tr>
                                    <td><strong>HOSPITAL DE CLÍNICAS (PSIQUIATRIA)</strong></td>
                                    <td>2-246356</td>
                                    <td>AV. SAAVEDRA, Nº 2245, Z/ MIRAFLORES</td>
                                  </tr>
                                  <tr>
                                    <td><strong>HOSPITAL DE LA MUJER</strong></td>
                                    <td>2-240096 2-241042 2-222577 2-241042</td>
                                    <td>AV. SAAVEDRA N° 2273, Z/ MIRAFLORES</td>
                                  </tr>
                                  <tr>
                                    <td><strong>HOSPITAL JUAN XXIII</strong></td><td>2-397000 2-396866 2-396939 2-396739</td>
                                    <td>AV. NACIONES UNIDAS, ESQ. C. PAPA JUAN XXIII S/N, Z/ MUNAYPATA</td>
                                  </tr>
                                  <tr>
                                    <td><strong>HOSPITAL LA PAZ</strong></td>
                                    <td>2-459911 2-456423</td>
                                    <td>PLAZA GARITA DE LIMA, LOS ANDES OBISPO INDABURO.</td>
                                  </tr>
                                  <tr>
                                    <td><strong>HOSPITAL MATERNO INFANTIL LOS ANDES</strong></td>
                                    <td>2-841516</td>
                                    <td>C. ARTURO VALLE N°3748 ESQ. BALBOA, Z/ LOS ANDES, EL ALTO</td>
                                  </tr>
                                  <tr>
                                    <td><strong>HOSPITAL METODISTA</strong></td>
                                    <td>2-783509</td>
                                    <td>AV. 14 DE SEPTIEMBRE, ESQ. C. 12, Z/ OBRAJES</td>
                                  </tr>
                                  <tr>
                                    <td><strong>HOSPITAL BOLIVIANO HOLANDES</strong></td>
                                    <td>2-818090 2813919</td>
                                    <td>CIUDAD SATELITE, ESQ. DIEGO DE PORTUGAL, EL ALTO</td>
                                  </tr>
                                  <tr>
                                    <td><strong>HOSPITAL LUIS URIA NEUMOLOGÍA</strong></td>
                                    <td>2-230100</td><td>VILLA COPACABANA, FINAL BURGALETA</td>
                                  </tr>
                                  <tr>
                                    <td><strong>HOSPITAL OBRERO</strong></td>
                                    <td>2-245518</td>
                                    <td>AV. BRASIL N° 1745 ENTRE LUCAS JAIMES Y JOSÉ GUTIÉRREZ, Z/ MIRAFLORES</td>
                                  </tr>
                                  <tr>
                                    <td><strong>HOSPITAL DEL NIÑO</strong></td>
                                    <td>2-245076 2-245211 2-222232 (EMERGENCIAS)</td>
                                    <td>PASAJE MAYOR ZUBIETA N°100, Z/ MIRAFLORES</td>
                                  </tr>
                                  <tr>
                                    <td><strong>HOSPITAL MATERNO INFANTIL</strong></td>
                                    <td>2-223641 2-223632 2-223406</td>
                                    <td>C. REPUBLICA DOMINICANA, ENTRE DÍAZ ROMERO Y VILLALOBOS, Z/ MIRAFLORES.</td>
                                  </tr>
                                  <tr>
                                    <td><strong>HOSPITAL SEGURO SOCIAL UNIVERSIT.</strong></td>
                                    <td>2-434706 2-434702</td>
                                    <td>AV. 6 DE AGOSTO N°2630, Z/ SOPOCACHI</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>

                          <div class="tab-pane" id="clinica">
                            <div class="user-profile-content">
                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th>Institucion</th>
                                    <th>Telefonos</th>
                                    <th>Dirección </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td><strong>CLINICA DEL SUR </strong></td>
                                    <td>2-784001 2-784002 2-784369</td><td>AV.HERNENDO SILES N°3539 Z/ OBRAJES</td></tr><tr><td><strong>RENGEL</strong></td><td>2-414444&nbsp; &#8211;&nbsp; 2-422790&nbsp; &#8211;&nbsp; 2413896</td><td>C. VÍCTOR SANJINEZ Nº 2762, PLAZA ESPAÑA, z/ SOPOCACHI</td></tr><tr><td><strong>CLINICA SAN MIGUEL (CALACOTO)</strong></td><td>2-792009&nbsp; &#8211;&nbsp; 2-792250&nbsp; &#8211;&nbsp; 2-792092</td><td>C. 22&nbsp; N°7838, Z/ CALACOTO&nbsp;</td></tr><tr><td><strong>CLINICA URME</strong></td><td>2-432211&nbsp; &#8211;&nbsp; 2-431520&nbsp; &#8211;&nbsp; 2-440587</td><td>C. MONTEVIDEO N° 116</td></tr><tr><td><strong>UNIMED</strong></td><td>2-431133</td><td>AV. ARCE N°2630</td></tr><tr><td><strong>CLINICA ASUNCIÓN</strong></td><td>2-434346&nbsp; &#8211;&nbsp; 2-433593&nbsp; &#8211;&nbsp; 2-430689</td><td>AV. 6 DE AGOSTO N° 2899 ESQ. CLAVIJO&nbsp; Z/ SAN JORGE</td></tr><tr><td><strong>PROSALUD TEJADA SORZANO</strong></td><td>2-246460&nbsp; &#8211;&nbsp; 2-322212</td><td>AV. TEJADA SORZANO ESQ. SAN SALVADOR</td></tr><tr><td><strong>BANCO DE SANGRE</strong></td><td>2-114594</td><td>C. CLAUDIO SANJINEZ (FRENTE AL TORAX)&nbsp; Z/ MIRAFLORES</td></tr><tr><td><strong>SELADIS</strong></td><td>2-222436</td><td>AV. SAAVEDRA Nº 2224, Z/ MIRAFLORES&nbsp;</td></tr><tr><td><strong>INLASA</strong></td><td>2-226048</td><td>PASAJE RAFAEL ZUBIETA #1889 (LADO ESTADO MAYOR DEL EJÉRCITO), Z/ MIRAFLORES</td></tr><tr><td><strong>SERVITAC</strong></td><td>2-222022&nbsp; &#8211;&nbsp; 2-221616</td><td>AV. BUSCH CASI ESQUINA HAITÍ N°1126 Z/ MIRAFLORES</td></tr><tr><td><strong>CAJA PETROLERA</strong></td><td>2-431865&nbsp; &#8211;&nbsp; 2-431086</td><td>AV. ARCE Nº 2525 Y PLAZA ISABEL LA CATÓLICA</td></tr><tr><td><strong>CLINICA EUROPA</strong></td><td>2-229112</td><td>&nbsp;C. CARRASCO ESQUINA AVENIDA BUSCH Z/ MIRAFLORES</td></tr><tr><td><strong>LAB. CLINICS</strong></td><td>2-430846&nbsp; &#8211;&nbsp; 701-27447</td><td>C. MANUEL CAMPOS ESQ. 6 DE AGOSTO N°334, ED. “ITURRI” MEZZANINE, Z/ SAN JORGE</td></tr><tr><td><strong>PROSALUD VILLA FÁTIMA</strong></td><td>2-216804</td><td>AV. LAS DELICIAS N° 13 ESQ. YANACACHI, Z/ VILLAFATIMA</td></tr><tr><td><strong>CLINICA SAN JUAN BAUTISTA</strong></td><td>2-853276 (HEMODIALISIS)</td><td>C. RÍO ORTHON N° 100, Z/ CUPILUPACA, EL ALTO</td></tr><tr><td><strong>CLINICA 6 DE AGOSTO</strong></td><td>2-430321</td><td>AV.6 DE AGOSTO N° 2892 Z/ SAN JORGE</td></tr><tr><td><strong>CLINICA MODELO</strong></td><td>2-228360&nbsp; &#8211;&nbsp; 2-228365</td><td>&nbsp;C. PANAMÁ N°1162, Z/ MIRAFLORES</td></tr>
                                  </tbody>
                                </table>
                            </div>
                          </div>

                          <div class="tab-pane" id="oxigeno">
                            <div class="user-profile-content">
                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th>Institucion</th>
                                    <th>Telefonos</th>
                                    <th>Dirección </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    
                                    <td>PRAXAIR</td>
                                    <td>Central: 720-09309 - 721-18930 - 800-100577 </td>
                                    <td>Sucursal El Alto: 2-860170<br> AV. LUIS ESPINAL N°10 Z/ RÍO SECO<br>Sucursal Zona Sur: 2-772778 <br>AV. MONTENEGRO BLQ. E N°1 </td>                            
                                  </tr>
                                  <tr>
                                    <td>OXIMED BOLIVIA</td>
                                    <td>Central:2-491279 - 2-484992 - 765-22595 - 777-76646</td>
                                    <td>C. BOQUERON N°1318 CASI ESQ. ALMIRANTE GRAU Z/ SAN PEDRO<br>Sucursal Ciudad Satélite: 758-88386 - 768-8988<br>AV. DIEGO DE PORTUGAL #1274 FRENTE AL HOSPITAL HOLANDÉS<br>Sucursal Calacoto: 2-917565 -  2-775522 C. 21, CASI ESQ. IGNACIO CORDERO</td>                        
                                  </tr>
                                  <tr>
                                    <td>OXÍGENO VITAL</td>
                                    <td>2-985825 – 712-61278 <br>Whapp: 720-54950</td>
                                    <td>Z/ SANTIAGO II, EL ALTO, AV. GERMAN BUSCH N°1918 ENTRE AV. BOLIVIA</td>
                                  </tr>
                                  <tr>                            
                                    <td>OXISALUD</td>
                                    <td>789-62479  -  772-84047</td>
                                    <td>C. B, Z/ 3 DE MAYO</td>                           
                                  </tr>
                                  <tr>                            
                                    <td>OXILAP</td>
                                    <td>Sucursal El Alto: 706-27649 – 767-75970 - 767-67884 - 767-67886</td>
                                    <td>AV. TIAHUANACU N°25 CASI ESQ. AV. 6 DE MARZO, Z/ VILLA SANTIAGO I <br>Sucursal Rio Seco: 767-67886 AV. KUSCO N° 101. FRENTE AL TELEFERICO AZUL, Z/ PLAN 192 </td>                           
                                  </tr>
                                  <tr>                            
                                    <td>TODO OXÍGENO</td>
                                    <td>788-67795 - 777-70334 - 765-89333 - 767-26190</td>
                                    <td>AV. BUENOS AIRES N°1543</td>                            
                                  </tr>
                                  <tr>
                                    <td>LIQUID</td>
                                    <td>719-19141</td>
                                    <td>C. PAGADOR ESQ. HERRERA</td>                           
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>

                          <div class="tab-pane" id="funeraria">
                            <div class="user-profile-content">

                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th>Institucion</th>
                                    <th>Telefonos</th>
                                    <th>Dirección </th>
                                    <th>Obs</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>                                    
                                    <td>FUNERARIA ESCALERA AL CIELO</td>
                                    <td>730- 73085</td>
                                    <td>C. CARRASCO ESQ FRANCISCO DE MIRANDA N° 1595 Z/ MIRAFLORES</td>
                                    <td>COVID 19</td>                                    
                                  </tr>
                                  <tr>                                    
                                    <td>FUNERARIA ELIAS </td>
                                    <td>2- 245493</td>
                                    <td>C. SAN SALVADOR ESQ CUBA N°1487 (FRENTE MONUMENTO BUSH), Z/ MIRAFLORES</td>
                                    <td>COVID 19</td>                                    
                                  </tr>
                                  <tr>                                    
                                    <td>FUNERARIA VALDIVIA </td>
                                    <td>701- 45039</td>
                                    <td>AV. BUSH N°1278 Z/ MIRAFLORES </td>
                                    <td>(CRISTIAN) COVID 19</td>                                    
                                  </tr>
                                  <tr>                                    
                                    <td>FUNERARIA SANTA MARÍA</td>
                                    <td>2- 314545</td>
                                    <td>AV. BUSH ESQ. BRASIL N°1319 Z/ MIRAFLORES </td>
                                    <td>NO RECIBEN AÚN CASOS DE COVID PERO TIENE SU PROPIO CREMATORIO</td>
                                  </tr>

                                </tbody>
                              </table>

                            </div>
                          </div>
                        </div>


                        </div> 
                      </div>
                    </div>
                  </div>

                </div>
                <!--/tab-content-->
              </div>
              <!--/block-web-->
            </div>
            <!--/col-md-8-->
          </div>
          <!--/row-->
        </div>
        <script type="text/javascript">
            setTimeout( function() { window.location.reload(); }, 320000 );
        </script>
      </div>
@endsection

@section('script')
<script src="{{asset('assets/js/jquery-1.4.2.js')}}"></script>
<script>
  $(function(){

    $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

      $('#btn-guardar').click(function(event) {
        event.preventDefault();

        var formDialogo = '#formDialogo';
        var formCliente='#formCliente';
        var formClientemore='#formClienteMore';
        var formInforme='#formInforme';
        var p=document.getElementById("permiso").value;

        if(p==6 || p==5 || p==4 || p==3 || p==2){
          $.ajax({
          url: $(formDialogo).attr('action'),
          type: $(formDialogo).attr('method'),
          data: $(formDialogo).serialize(),
          dataType: 'html',
          success: function(result){
            alert("Dialogo y Atencion Guardado Correctamente ");
          }
        });  
        }

        
        if(p==6 || p==5 || p==4 || p==3 || p==2){
        $.ajax({
          url: $(formCliente).attr('action'),
          type: $(formCliente).attr('method'),
          data: $(formCliente).serialize(),
          dataType: 'html',
          success: function(result){
            alert("Datos del Cliente Guardados Corectamente");
            recarga();
          }
        });
        }
        if(p==5 || p==4 || p==3){
          $.ajax({
            url: $(formClientemore).attr('action'),
            type: $(formClientemore).attr('method'),
            data: $(formClientemore).serialize(),
            dataType: 'html',
            success: function(result){
              alert("Datos del Cliente Detallado Guardados Corectamente");
              recarga();
            }
          });
        }

        if(p==5 || p==4 || p==3){

          $.ajax({
            url: $(formInforme).attr('action'),
            type: $(formInforme).attr('method'),
            data: $(formInforme).serialize(),
            dataType: 'html',
            success: function(result){
              alert("Informe Guardado Correctamente");
              recarga();
            }
          });
        }

      });

      $('#btn-derivar').click(function(event) {
        event.preventDefault();

        var formDialogo = '#formDialogo';
        var formCliente='#formCliente';
        var formClientemore='#formClienteMore';
        var formDerivar='#formDerivar';
        var formInforme='#formInforme';
        var p=document.getElementById("permiso").value;

        if(p==6 || p==5 || p==4 || p==3 || p==2){
          $.ajax({
            url: $(formDialogo).attr('action'),
            type: $(formDialogo).attr('method'),
            data: $(formDialogo).serialize(),
            dataType: 'html',
            success: function(result){
              alert("Dialogo y Atencion Guardado Correctamente");
            }
          });
        }

        if(p==6 || p==5 || p==4 || p==3 || p==2){
          $.ajax({
            url: $(formCliente).attr('action'),
            type: $(formCliente).attr('method'),
            data: $(formCliente).serialize(),
            dataType: 'html',
            success: function(result){
              alert("Datos del Cliente Guardados Corectamente");
              recarga();
            }
          });
        }

        if(p==5 || p==4 || p==3){
          $.ajax({
            url: $(formClientemore).attr('action'),
            type: $(formClientemore).attr('method'),
            data: $(formClientemore).serialize(),
            dataType: 'html',
            success: function(result){
              alert("Datos del Cliente Detallado Guardados Corectamente");
              recarga();
            }
          });
        }

        if(p==5 || p==4 || p==3){
          $.ajax({
            url: $(formInforme).attr('action'),
            type: $(formInforme).attr('method'),
            data: $(formInforme).serialize(),
            dataType: 'html',
            success: function(result){
              alert("Informe Guardado Correctamente");
              recarga();
            }
          });
        }

        if(p==6 || p==5 || p==4 || p==3){
          $.ajax({
            url: $(formDerivar).attr('action'),
            type: $(formDerivar).attr('method'),
            data: $(formDerivar).serialize(),
            dataType: 'html',
            success: function(result){
              alert("El cliente fue derivado Corectamente");
              recarga();
            }
          });
        }

      });

    });

    function recarga() { window.location.reload(); }
</script>
@endsection