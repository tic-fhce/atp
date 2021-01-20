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
                    <label class="col-sm-5 control-label">Estado :</label>
                    <label class="col-sm-7 control-label-l">{{$comunication->tipo}}</label>
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
                      <a href="{{route('listaDerivadosAtendidos')}}" class="btn btn-primary">Salir del Perfil</a>
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
                  <li class="active"><a href="#progreso" data-toggle="tab">Seguimiento</a></li>
                  <li><a href="#estado" data-toggle="tab">Estado</a></li>
                  <li ><a href="#about" data-toggle="tab">Historia</a></li>
                  <li ><a href="#datos" data-toggle="tab">Actualizar Datos</a></li>
                  <li ><a href="#user-activities" data-toggle="tab">Mas Datos</a></li>
                  
                </ul>

                
                <!-- DATOS  E HISTORIAL-->
                <div class="tab-content">
                  <!-- Progreso-->
                  <div class="tab-pane active" id="progreso">
                    <div class="user-profile-content">

                      <div class="col-sm-6"> 
                            <form action="{{route('Addprogreso')}}" class="form-horizontal row-border" method="POST" id="formInforme">
                            @csrf
                              <input type="hidden" name="idclinte" value="{{$cliente->id}}">
                              <input type="hidden" name="idprofile" value="{{$cliente->id_persona}}">
                              <div class="form-group">
                                <label>Seguimiento del Paciente "Antes de comenzar en esta sección Guarde los Datos"</label>
                                <div class="col-sm-12">
                                  <textarea class="form-control" name="obs" required="true" rows="16">Ninguno</textarea>
                                </div>
                              </div><!--/form-group-->
                             
                              <div class="form-group">
                                <div class="col-sm-12 bottom">
                                  <button type="submit" class="btn btn-primary">Registrar Progreso</button>
                                </div><!--/form-group-->
                              </div>
                            </form>
                      </div>
                      <div class="col-sm-6">
                        <label>Hisotria del Paciente</label>
                        <table class="table table-bordered">
                          <thead>
                            <th>Observaciones</th>
                            <th>Fecha</th>
                          </thead>
                          <tbody>
                            @foreach($progreso as $value)
                              <tr>
                                <td>{{$value->obs}}</td>
                                <td>{{$value->created_at}}</td>
                              </tr>
                            @endforeach
                            
                          </tbody>
                        </table>

                      </div>

                    </div>
                  </div><!-- INFORME-->

                  <!-- estado -->
                  <div class="tab-pane" id="estado">
                    <div class="user-profile-content">

                      <div class="col-sm-6"> 
                          <h1>{{$comunication->tipo}}</h1>

                          <form action="{{route('AddEstado')}}" class="form-horizontal row-border" method="POST" id="formDialogo">
                            @csrf
                            <input type="hidden" name="idpersona" value="{{$persona->id}}" >
                            <input type="hidden" name="idcliente" value="{{$cliente->id}}">
                            <input type="hidden" name="idusuario" value="{{$datos->idUsuario}}">
                            <div class="form-group">
                              <label class="col-sm-4 control-label">Cambiar Estado</label>
                              <div class="col-sm-8">
                                <select name="tipo" required="true">
                                  <option value="{{$comunication->tipo}}">{{$comunication->tipo}}</option>
                                  <option value="1">Tratamiento</option>
                                  <option value="2">Alta</option>
                                  <option value="3">Derivado</option>
                                </select>
                              </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Observaciones</label>
                                <div class="col-sm-8">
                                  <textarea class="form-control" name="obs" required="true" rows="9">Ninguno</textarea>
                                </div>
                            </div><!--/form-group-->

                            <input type="submit" name="" value="Cambiar Estado" class="btn btn-primary">

                          </form>
                      </div>
                      <div class="col-sm-6">

                        <table class="table table-bordered">
                          <thead>
                            <th>Observaciones</th>
                            <th>Fecha</th>
                          </thead>
                          <tbody>
                            @foreach($estado as $value)
                              <tr>
                                <td>{{$value->obs}}</td>
                                <td>{{$value->created_at}}</td>
                              </tr>
                            @endforeach
                            
                          </tbody>
                        </table>

                      </div>

                    </div>
                  </div><!-- INFORME-->




                  <!-- DIALOGO-->
                  <div class="tab-pane" id="about">
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
        $.ajax({
          url: $(formDialogo).attr('action'),
          type: $(formDialogo).attr('method'),
          data: $(formDialogo).serialize(),
          dataType: 'html',
          success: function(result){
            alert("Dialogo y Atencion Guardado Correctamente ");
          }
        });  

        
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

      });

    });


    function recarga() { window.location.reload(); }
</script>
@endsection